<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Prisoner;
use App\Models\Cell;
use App\Models\Incident;
use App\Models\PrisonerLog;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Dashboard statistics endpoint
Route::get('/dashboard-stats', function () {
    $currentDate = now();
    
    // Count all prisoners (including released)
    $totalPrisoners = Prisoner::count();
    
    // Count current prisoners (not released)
    $currentPrisoners = Prisoner::where(function($query) use ($currentDate) {
        $query->whereNull('date_of_leaving')
              ->orWhere('date_of_leaving', '>=', $currentDate);
    })->count();
    
    // Count released prisoners
    $releasedPrisoners = Prisoner::where('date_of_leaving', '<', $currentDate)
                                ->whereNotNull('date_of_leaving')
                                ->count();
    
    // Cell statistics
    $totalCells = Cell::count();
    $occupiedCells = Prisoner::whereNotNull('cell_id')
                            ->where(function($query) use ($currentDate) {
                                $query->whereNull('date_of_leaving')
                                    ->orWhere('date_of_leaving', '>=', $currentDate);
                            })->count();
    $emptyCells = $totalCells - $occupiedCells;
    
    // Recent activities
    $recentIncidentsCount = Incident::whereDate('created_at', '>=', $currentDate->subDays(7))->count();
    $recentLogsCount = PrisonerLog::whereDate('created_at', '>=', $currentDate->subDays(7))->count();
    
    // Cell occupancy by wing
    $wingOccupancy = Cell::selectRaw('wing_code, COUNT(*) as total')
                        ->groupBy('wing_code')
                        ->get()
                        ->mapWithKeys(function ($item) {
                            return [$item->wing_code => [
                                'total' => $item->total,
                                'occupied' => 0
                            ]];
                        })->toArray();
    
    // Count occupied cells per wing
    $occupiedByWing = Prisoner::whereNotNull('cell_id')
                            ->where(function($query) use ($currentDate) {
                                $query->whereNull('date_of_leaving')
                                    ->orWhere('date_of_leaving', '>=', $currentDate);
                            })
                            ->join('cells', 'prisoners.cell_id', '=', 'cells.id')
                            ->selectRaw('cells.wing_code, COUNT(*) as count')
                            ->groupBy('cells.wing_code')
                            ->get();
    
    foreach ($occupiedByWing as $wing) {
        if (isset($wingOccupancy[$wing->wing_code])) {
            $wingOccupancy[$wing->wing_code]['occupied'] = $wing->count;
        }
    }
    
    return response()->json([
        'totalPrisoners' => $totalPrisoners,
        'currentPrisoners' => $currentPrisoners,
        'releasedPrisoners' => $releasedPrisoners,
        'occupiedCells' => $occupiedCells,
        'emptyCells' => $emptyCells,
        'totalCells' => $totalCells,
        'recentIncidentsCount' => $recentIncidentsCount,
        'recentLogsCount' => $recentLogsCount,
        'wingOccupancy' => $wingOccupancy
    ]);
});

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Cell;
use App\Models\Prisoner;

class CellController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) {
            return view("cells.index");
        }
    
        $actionType = $request->input('action', 'viewCell');
        $occupation = filter_var($request->input('occupation', true), FILTER_VALIDATE_BOOLEAN);

        // Start a query for cells
        $query = Cell::query();
    
        // If occupation is false, filter out cells that have a prisoner assigned in the prisoners table
        if ($occupation === false) {
            $occupiedCellIds = Prisoner::whereNotNull('cell_id')->pluck('cell_id')->toArray();
            $query->whereNotIn('id', $occupiedCellIds);
        }

        $cells = $query->get();
    
        return DataTables::of($cells)
            ->addColumn('status', function ($cell) {
                // Check if a prisoner is assigned to this cell via the prisoners table
                $prisoner = Prisoner::where('cell_id', $cell->id)->first();
                return $prisoner === null
                    ? 'Leeg'
                    : 'Bezet door ' . $prisoner->firstname . ' ' . $prisoner->lastname;
            })
            ->addColumn('action', function ($cell) use ($actionType) {
                if ($actionType === 'viewCell') {
                    return '<a href="' . route('cells.show', $cell->id) . '" class="btn btn-info btn-sm">Bekijken of Bewerken</a>';
                } elseif ($actionType === 'prisonerAssign') {
                    return '<a onclick="assignCell(' . $cell->id . ')" class="btn btn-success btn-sm">Toewijzen</a>';
                }
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function show($id, Request $request)
    {
        $prisoner = Cell::findOrFail($id);
        if (!$request->ajax()) {
            return view("cells.show", ["cell" => $prisoner]);
        }

        return response()->json($prisoner);
    }

    public function update(Request $request, $id)
    {
        $cell = Cell::findOrFail($id);
        $cell->update($request->all());
        return response()->json($cell);
    }
}

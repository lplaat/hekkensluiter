<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CellHistory;
use Yajra\DataTables\Facades\DataTables;

class CellHistoryController extends Controller
{
    public function index(Request $request)
    {
        $query = CellHistory::query()->orderBy('created_at', 'desc');

        $prisonerId = $request->input('prisonerId', null);
        if( $prisonerId !== null) {
            $query->where('prisoner_id', $prisonerId);
        }

        $cellId = $request->input('cellId', null);
        if( $cellId !== null) {
            $query->where('cell_id', operator: $cellId);
            $query->orWhere('old_cell_id', operator: $cellId);
        }

        $userID = $request->input('userId', null);
        if( $userID !== null) {
            $query->where('user_id', operator: $userID);
        }

        return DataTables::of($query)
            ->addColumn('actie', function ($log) {
                if($log->type == 'assigned') {
                    return $log->Prisoner->firstname . ' ' . $log->Prisoner->lastname . ' is gekoppeld aan #' . $log->Cell->code;
                } else if ($log->type == 'unassigned') {
                    return $log->Prisoner->firstname . ' ' . $log->Prisoner->lastname . ' is losgekoppeld van #' . $log->Cell->code;
                } else if ($log->type == 'transferred') {
                    return $log->Prisoner->firstname . ' ' . $log->Prisoner->lastname . ' is doorgestuurd van #' . $log->OldCell->code .' naar #' . $log->Cell->code;
                }
            })
            ->addColumn('gebruiker', function ($log) {
                return $log->User->name;
            })
            ->addColumn('hoelaat', function ($log) {
                return $log->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('notitie', function ($log) {
                return '<span data-bs-toggle="tooltip" data-bs-placement="top" title="' . $log->note . '" style="cursor: help;"><i class="fa-solid fa-circle-question"></i></a>';
            })
            ->rawColumns(['notitie'])
            ->make(true);
    }
}

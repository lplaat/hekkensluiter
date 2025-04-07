<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use App\Models\PrisonerLog;
use App\Models\Prisoner;

class PrisonerLogController extends Controller
{
    public function index(Request $request) {
        if (!$request->ajax()) {
            return view("prisonerLogs.index");
        }

        $query = PrisonerLog::query()->orderBy('created_at', 'desc');

        $prisonerId = $request->input('prisonerId', null);
        if( $prisonerId !== null) {
            $query->where('prisoner_id', $prisonerId);
        }

        $userID = $request->input('userId', null);
        if( $userID !== null) {
            $query->where('user_id', operator: $userID);
        }
    
        return DataTables::of($query)
            ->addColumn('gevangene', function ($log) {
                return $log->Prisoner->firstname . ' ' . $log->Prisoner->lastname;
            })
            ->addColumn('title', function ($log) {
                return $log->title;
            })
            ->addColumn('waneer', function ($log) {
                return $log->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('actie', function ($log) {
                return '<a href="' . route('prisonerLogs.show', $log->id) . '" class="btn btn-info btn-sm">Bekijken of Bewerken</a>';
            })
            ->rawColumns(['actie'])
            ->make(true);
    }

    public function show($id, Request $request)
    {
        $log = PrisonerLog::findOrFail($id);
        if (!$request->ajax()) {
            return view("prisonerLogs.show", ["log" => $log]);
        }

        return response()->json($log);
    }

    public function update(Request $request, $id)
    {
        $log = PrisonerLog::findOrFail($id);
        $log->update($request->all());
        return response()->json($log);
    }

    public function create(Request $request)
    {
        $prisoner = Prisoner::findOrFail($request['prisonerId']);
        if (!$request->ajax()) {
            return view("prisonerLogs.create", ["prisoner" => $prisoner]);
        }

        return response()->json([]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'prisoner_id' => 'required|integer|exists:prisoners,id',
            'user_id'     => 'required|integer|exists:users,id',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $log = PrisonerLog::create($validatedData);
        return response()->json([
            'success' => true,
            'redirect' => route('prisonerLogs.show', [$log->id])
        ]);
    }
}
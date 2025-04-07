<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Incident;
use App\Models\Prisoner;

class IncidentController extends Controller
{
    public function index(Request $request) {
        if (!$request->ajax()) {
            return view("incidents.index");
        }

        $query = Incident::query()->orderBy('created_at', 'desc');

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
                return '<a href="' . route('incidents.show', $log->id) . '" class="btn btn-info btn-sm">Bekijken of Bewerken</a>';
            })
            ->rawColumns(['actie'])
            ->make(true);
    }

    public function show($id, Request $request)
    {
        $incident = Incident::findOrFail($id);
        if (!$request->ajax()) {
            return view("incidents.show", ["incident" => $incident]);
        }

        return response()->json($incident);
    }

    public function update(Request $request, $id)
    {
        $incident = Incident::findOrFail($id);
        $incident->update($request->all());
        return response()->json($incident);
    }

    public function create(Request $request)
    {
        $prisoner = Prisoner::findOrFail($request['prisonerId']);
        if (!$request->ajax()) {
            return view("incidents.create", ["prisoner" => $prisoner]);
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

        $incident = Incident::create($validatedData);
        return response()->json([
            'success' => true,
            'redirect' => route('incidents.show', [$incident->id])
        ]);
    }
}

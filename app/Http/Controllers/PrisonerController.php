<?php

namespace App\Http\Controllers;

use App\Models\Prisoner;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PrisonerController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) {
            return view("prisoners.index");
        }

        $prisoners = Prisoner::all();

        return DataTables::of($prisoners)
            ->addColumn('date-of-arrival', function ($prisoner) {
                return $prisoner->date_of_arrival;
            })
            ->addColumn('cel', function ($prisoner) {
                return $prisoner->cel_id ? "Cell #{$prisoner->cel_id}" : 'No Cell Assigned';
            })
            ->addColumn('action', function ($prisoner) {
                return '<a href="'.route('prisoners.show', $prisoner->id).'" class="btn btn-info btn-sm">View</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    // Store a new prisoner
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'profile_picture' => 'nullable|string',
            'date_of_arrival' => 'required|date',
            'date_of_leaving' => 'nullable|date',
            'cel_id' => 'nullable|integer',
        ]);

        $prisoner = Prisoner::create($validatedData);
        return response()->json($prisoner, 201);
    }

    public function show($id, Request $request)
    {
        $prisoner = Prisoner::findOrFail($id);
        if (!$request->ajax()) {
            return view("prisoners.show", ["prisoner" => $prisoner]);
        }

        return response()->json($prisoner);
    }

    public function update(Request $request, $id)
    {
        $prisoner = Prisoner::findOrFail($id);
        $prisoner->update($request->all());
        return response()->json($prisoner);
    }

    public function destroy($id)
    {
        $prisoner = Prisoner::findOrFail($id);
        $prisoner->delete();
        return response()->json(['message' => 'Prisoner deleted successfully']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Prisoner;
use App\Models\CellHistory;
use App\Models\Cell;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

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
                return $prisoner->cell_id ? "{$prisoner->Cell->code}" : 'Geen cel toegewezen';
            })
            ->addColumn('action', function ($prisoner) {
                return '<a href="'.route('prisoners.show', $prisoner->id).'" class="btn btn-info btn-sm">Bekijken</a>';
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
        ]);

        if(Prisoner::where('firstname', $validatedData['firstname'])->where('lastname', $validatedData['lastname'])->where('birthdate', $validatedData['birthdate'])->count() !== 0) {
            return response()->json([
                'success' => false,
                'message' => 'Prisoner bestaat al!'
            ]);
        }

        $prisoner = Prisoner::create($validatedData);
        return response()->json([
            'success' => true,
            'redirect' => route('prisoners.show', [$prisoner->id])
        ]);
    }

    public function show($id, Request $request)
    {
        $prisoner = Prisoner::findOrFail($id);
        if (!$request->ajax()) {
            return view("prisoners.show", ["prisoner" => $prisoner]);
        }

        return response()->json($prisoner);
    }


    public function create(Request $request)
    {
        if (!$request->ajax()) {
            return view("prisoners.create");
        }

        return response()->json([]);
    }

    public function update(Request $request, $id)
    {
        $prisoner = Prisoner::findOrFail($id);
        
        if($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            
            $filename = 'prisoner_' . $prisoner->id . '_' . time() . '.' . $file->getClientOriginalExtension();
            
            $path = $file->storeAs('prisoners', $filename, 'public');
            
            $url = Storage::url($path);
            
            $prisoner->profile_picture = '/public' . $url;
            $prisoner->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Saved profile picture'
            ]);
        }

        if($request['profile_picture'] == 'DELETE') {
            $prisoner->profile_picture = null;
            $prisoner->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Saved profile picture'
            ]);
        }

        if(!empty($request['cell_id'])) {
            $newCell = Cell::findOrFail($request['cell_id']);
        }
        
        if($prisoner->cell_id !== null && empty($request['cell_id'])) {
            $log = new CellHistory();
            $log->type = 'unassigned';
        } else if($prisoner->cell_id == null && !empty($request['cell_id'])) {
            $log = new CellHistory();
            $log->type = 'assigned';
        } else if($prisoner->cell_id !== null && !empty($request['cell_id']) && intval($request['cell_id']) !== $prisoner->cell_id) {
            $log = new CellHistory();
            $log->type = 'transferred';
            $log->old_cell_id = $prisoner->cell_id;
        }
        
        if(isset($log)) {
            $log->prisoner_id = $prisoner->id;
            $log->user_id = Auth::id();
            $log->cell_id = $request['cell_id'] !== null ? $request['cell_id'] : $prisoner->cell_id;
            $log->note = $request['note'];
            $log->save();
        }
        
        $prisoner->update($request->all());
        return response()->json($prisoner);
    }

    public function destroy($id)
    {
        $prisoner = Prisoner::findOrFail($id);
        $prisoner->delete();
        return response()->json(['message' => 'Gevangene succesvol verwijderd']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Cell;

class CellController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) {
            return view("cells.index");
        }

        $cells = Cell::all();
        return DataTables::of($cells)
            ->addColumn('status', function ($cell) {
                return $cell->currentPrisoner == null ? 'Empty' : 'Occupied By ' . $cell->currentPrisoner->firstname . ' ' . $cell->currentPrisoner->lastname;
            })
            ->addColumn('action', function ($cell) {
                return '<a href="'.route('cells.show', $cell->id).'" class="btn btn-info btn-sm">View</a>';
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

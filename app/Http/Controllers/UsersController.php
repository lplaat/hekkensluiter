<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use App\Models\User;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) {
            return view("users.index");
        }
    
        return DataTables::of(User::query())
            ->addColumn('gebruikersnaam', function ($user) {
                return $user->name;
            })
            ->addColumn('e-mail', function ($user) {
                return $user->email;
            })
            ->addColumn('rol', function ($user) {
                return $user->RoleText;
            })
            ->addColumn('actie', function ($user) {
                return '<a href="' . route('users.show', $user->id) . '" class="btn btn-info btn-sm">Bekijken of Bewerken</a>';
            })
            ->rawColumns(['actie'])
            ->make(true);
    }

    public function show($id, Request $request)
    {
        $user = User::findOrFail($id);
        if (!$request->ajax()) {
            return view("users.show", ["user" => $user]);
        }

        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json($user);
    }

    public function create(Request $request)
    {
        if (!$request->ajax()) {
            return view(view: "users.create");
        }

        return response()->json([]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|string|email|max:255|unique:users',
            'password'              => 'required|string|confirmed',
            'role'                  => 'required|integer|in:0,1,2',
        ]);

        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->role = $validatedData['role'];
        $user->save();

        return response()->json([
            'success' => true,
            'redirect' => route('users.show', [$user->id])
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use App\Models\PaymentType;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'asc')->paginate(15);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string|unique:users',
            'email'                 => 'required|email|unique:users',
            'username'              => 'required',
            'phone_number'          => 'required',
            'identification_number' => 'required',
            'password'              => 'required|string',
        ]);

        $user                        = new User();
        $user->name                  = $request->name;
        $user->email                 = $request->email;
        $user->password              = Hash::make($request->password);
        $user->phone_number          = $request->phone_number;
        $user->username              = $request->username;
        $user->identification_number = $request->identification_number;
        $user->save();

        Auth::login($user);

        $user = Auth::user();

        return Inertia::render('payments/create', [
            'users'      => User::all(),
            'user'       => $user ?? null,
            'userPayment' => $userPaymet ?? null,
            'forwarding' => 0,
            'paymentData' => [
                'projects'       => Project::all(),
                'paymentTypes'   => PaymentType::all(),
                'paymentMethods' => PaymentMethod::all(),
            ],
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user     = User::findOrFail($id);
        $payments = $user->payments()->orderBy('created_at', 'desc')->paginate(2);
        return view('users.show', compact('user', 'payments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user           = User::findOrFail($id);
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = $request->password;
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}

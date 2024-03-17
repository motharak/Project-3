<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('admin.auth');
    }
    public function index()
    {
        $users = User::all();
        return view('usersview.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usersview.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required',
            'role'=>'required'
        ]);
        User::create($request->all());
        return redirect('user')->with('msg','Add User susses');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('usersview.detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('usersview.edit', compact('user'));
    }

    /**
     * Update the specfind($id);
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required',
            'role'=>'required'
        ]);
        User::find($id)->update($request->all());
        return redirect('user')->with('msg','Update User susses');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        user::find($id)->delete();
        return redirect('user')->with('msg','Delete Complete');
    }
}

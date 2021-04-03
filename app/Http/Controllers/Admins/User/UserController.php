<?php

namespace App\Http\Controllers\Admins\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Sentinel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        $UserCount = User::count();

		return view('admins.user.index', compact('users', 'UserCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $user = Sentinel::registerAndActivate(array_merge($request->all(), ['password' => 'password']));

        $result = $request->role;

        $user = Sentinel::findById($user->id);

        $role = Sentinel::findRoleBySlug($result);
        $role->users()->attach($user);

        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Sentinel::findById($id);

        $roles = $user->roles;

        return view('admins.user.show', compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Sentinel::findById($id);

        $roles = $user->roles;

        return view('admins.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Sentinel::findById($id);

        $roleU = $user->roles()->get();

        $role = Sentinel::findRoleByName($roleU);
        $user->roles()->detach($role);

        Sentinel::update($user, $request->all());

        $role = $request->role;

        $role = Sentinel::findRoleByName($role);

        $user->roles()->attach($role);

        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Sentinel::findById($id);
        $user->delete();

        return redirect('/admin/users');
    }
}

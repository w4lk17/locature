<?php

namespace App\Http\Controllers\Admins\User;

use App\User;
use Sentinel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admins.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'email'       => 'required',
            'role'        => 'required',
            'last_name'   => 'required',
            'first_name'  => 'required'
        ];

        $messages = [
            'required'  => 'ce champ ne peut être vide.',
        ];

        $this->validate($request, $rules, $messages);

        try {

            $user = Sentinel::registerAndActivate(array_merge($request->all(), ['password' => 'password']));

            $result = $request->role;

            $user = Sentinel::findById($user->id);

            $role = Sentinel::findRoleBySlug($result);
            $role->users()->attach($user);

            Toastr::success('Utilisateur créer avec succès ! :)', 'Success');
            return redirect('/admin/users');
        } catch (\Exception $e) {
            //throw $e;
            Toastr::error('Echec enregistrement ! :)', 'Erreur');
            return redirect()->back();
        }
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
        $rules = [
            'email'       => 'required',
            'role'        => 'required',
            'last_name'   => 'required',
            'first_name'  => 'required'
        ];

        $messages = [
            'required'  => 'ce champ ne peut être vide.',
        ];

        $this->validate($request, $rules, $messages);

        try {
            $user = Sentinel::findById($id);

            $roleU = $user->roles()->get();

            $role = Sentinel::findRoleByName($roleU);
            $user->roles()->detach($role);

            Sentinel::update($user, $request->all());

            $role = $request->role;

            $role = Sentinel::findRoleByName($role);
            $user->roles()->attach($role);

            Toastr::success('Modification éffectuée !', 'Success');
            return redirect('/admin/users');
        } catch (\Exception $e) {
            //throw $e;
            Toastr::error('Echec modification ! :)', 'Erreur');
            return redirect()->back();
        }
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

        Toastr::success('Utilisateur supprimé avec succès ! :)', 'Success');
        return redirect('/admin/users');
    }
}

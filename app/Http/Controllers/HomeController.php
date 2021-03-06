<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Permission;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::get();
    }

    public function attachUserRole($userId,$role){
        $user = User::find($userId);

        $roleId= Role::where('name', $role)->first();

        $user->roles()->attach($roleId);
    }

    public function getUserRole($userId){
        return User::find($userId)->roles;
    }

    public function attachPermissions(Request $request){
        $parameters = $request->only('permission','role');

        $permissionparam = $parameters['permission'];
        $roleparam = $parameters['role'];

        $role= Role::where('name', $roleparam)->first();
        $permission = Permission::where('name', $permissionparam)->first();

        $role->attachPermission($permission);

        return $this->response->created();
    }

    public function getPermissions($roleparam){
        $role= Role::where('name',$roleparam)->first();
        return $this->response->array($role->perms);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

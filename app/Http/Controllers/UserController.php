<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\EnterPrise;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the User
        $users = User::all()->sortBy('id');
        $enterprises = EnterPrise::all()->sortBy('id');
        $detail_user = DB::table('detail_users')
        ->join('enterprises', 'detail_users.enterprise_id', '=', 'enterprises.id')
        ->select('detail_users.*', 'enterprises.name AS enterprises_name', 'enterprises.id AS enterprises_id')
        ->get();
        /*$users = DB::table('users')
            ->join('detail_user', 'users.id', '=', 'detail_user.id')
            ->join('enterprises', 'enterprises.id', '=', 'detail_user.enterprise_id')
            ->select('users.*', 'enterprises.name AS enterprises_name', 'enterprises.id AS enterprises_id')
            ->get();*/
        //$users = User::all()->sortByDesc('created_at');

        // load the view and pass the user
        return View('users.index')
            ->with('users', $users)
            ->with('enterprises', $enterprises)
            ->with('detail_user', $detail_user);
        //
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
        $users = User::all()->where('id',$id);
        return View('users.edit_user')->with('users',$users);
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

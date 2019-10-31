<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resident;
use App\EnterPrise;
use DB;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enterprises = EnterPrise::all()->sortByDesc('created_at');
        return View('resident.select_enterprise')
        ->with('enterprises', $enterprises);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $enterprises = DB::table('enterprises')->where('id', $id)->first();
        return view('resident.add_resident')
        ->with('id',$id)
        ->with('enterprises',$enterprises);
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
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'home_number' => 'required|string',
            'telephone' => 'required|string|max:10',
            'status' => 'required|string',
            'car_type' => 'required|string',
            'license_plate' => 'required'
        ]);

        $success = DB::table('resident')
            ->insert(['name' => $request->input('name'),'telephone' => $request->input('telephone'),
            'address' => $request->input('address'),'picture' => $request->input('picture')]);


        // redirect
        if($success){
            return redirect('/enterprise')->with('Confirm', 'เพิ่มข้อมูลโครงการใหม่เรียบร้อย');
        }else{
            return redirect('/enterprise')->with('Error', 'เพิ่มข้อมูลโครงการใหม่ไม่สำเร็จ');
        }
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
        // get all the blogs
        $residents = Resident::all()->where('enterprise_id',$id)->sortByDesc('created_at');

        // load the view and pass the resident
        return View('resident.index')
            ->with('residents', $residents)
            ->with('id', $id);
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

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
            'gender' => 'required|string',
            'home_number' => 'required|string',
            'telephone' => 'required|string|max:10',
            'status' => 'required|string',
            'car_type' => 'required|string',
            'license_plate' => 'required',
            'province' => 'required',
            'color' => 'required',
            'enterprise_id' => 'required'
        ]);

        $success = DB::table('resident')
            ->insert([
                'name' => $request->input('name'),
                'gender' => $request->input('gender'),
                'home_number' => $request->input('home_number'),
                'telephone' => $request->input('telephone'),
                'status' => $request->input('status'),
                'car_type' => $request->input('car_type'),
                'license_plate' => $request->input('license_plate'),
                'province' => $request->input('province'),
                'color' => $request->input('color'),
                'enterprise_id' => $request->input('enterprise_id')
            ]);

        // redirect
        if($success){
            return redirect('/resident/'.$request->input('enterprise_id'))->with('Confirm', 'เพิ่มข้อมูลลูกบ้านใหม่เรียบร้อย');
        }else{
            return redirect('/resident/'.$request->input('enterprise_id'))->with('Error', 'เพิ่มข้อมูลลูกบ้านใหม่ไม่สำเร็จ');
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
        $residents = DB::table('resident')->where('id', $id)->first();
        $enterprises = DB::table('enterprises')->where('id', $residents->enterprise_id)->first();
        return view('resident.edit_resident')
        ->with('residents',$residents)
        ->with('enterprises',$enterprises);
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
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'gender' => 'required|string',
            'home_number' => 'required|string',
            'telephone' => 'required|string|max:10',
            'status' => 'required|string',
            'car_type' => 'required|string',
            'license_plate' => 'required',
            'province' => 'required',
            'color' => 'required',
            'enterprise_id' => 'required'
        ]);

        $success = DB::table('resident')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
                'gender' => $request->input('gender'),
                'home_number' => $request->input('home_number'),
                'telephone' => $request->input('telephone'),
                'status' => $request->input('status'),
                'car_type' => $request->input('car_type'),
                'license_plate' => $request->input('license_plate'),
                'province' => $request->input('province'),
                'color' => $request->input('color'),
                'enterprise_id' => $request->input('enterprise_id')
            ]);

        // redirect
        if($success){
            return redirect('/resident/'.$request->input('enterprise_id'))->with('Confirm', 'แก้ไขข้อมูลลูกบ้านเรียบร้อย');
        }else{
            return redirect('/resident/'.$request->input('enterprise_id'))->with('Error', 'แก้ไขข้อมูลลูกบ้านไม่สำเร็จ');
        }
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
        $residents = DB::table('resident')->where('id', $id)->first();
        DB::table('resident')->where('id', '=', $id)->delete();
        return redirect('/resident/'.$residents->enterprise_id)->with('Confirm', 'ลบข้อมูลผู้ใช้งานเรียบร้อย');
        //
    }
}

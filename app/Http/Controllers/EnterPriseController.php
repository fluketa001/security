<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EnterPrise;
use DB;

class EnterPriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the blogs
        $enterprises = EnterPrise::all()->sortByDesc('created_at');

        // load the view and pass the user
        return View('enterprises.index')
            ->with('enterprises', $enterprises);

        //$enterprises = App\EnterPrise::all();

        // get all the blogs
        //$blogs = Blog::all()->sortByDesc('created_at');

        /*foreach ($enterprises as $enterprise) {
            echo $enterprise->name;
        }*/
        //
            /*
                $flights = App\Flight::where('active', 1)
                    ->orderBy('name', 'desc')
                    ->take(10)
                    ->get();

            *** การดึงข้อมูลทั้งหมดของตารางที่ระบุ แล้วคุณยังอาจเรียกดูเรคคอร์ดเดียว โดยใช้ find หรือ  first ก็ได้
                $flight = App\Flight::find(1);

            // Retrieve the first model matching the query constraints...
                $flight = App\Flight::where('active', 1)->first();
            */
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
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'telephone' => 'required|string',
            'address' => 'required|string',
            'picture' => 'required'
        ]);

        $success = DB::table('enterprises')
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
        //$enterprises = DB::query('select * from enterprises');
        //return View('select-project')->with('enterprises', $enterprises);
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
        $enterprises = EnterPrise::all()->where('id',$id);
        return View('enterprises.edit_enterprise')->with('enterprises',$enterprises);
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
    }
    public function update_post(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'telephone' => 'required|string',
            'address' => 'required|string'
        ]);

            if ($request->hasFile('picture')) {
                $file = $request->file('picture');
                $picture_name = DB::table('enterprises')->where('picture',$file->getClientOriginalName())->count();
                //dd($picture_name);

                if($picture_name > 0){
                    return redirect('/enterprise')->with('Error', 'แก้ไขข้อมูลไม่สำเร็จ! กรุณาเปลี่ยนชื่อไฟล์รูปภาพ');
                }else{
                    $success = DB::table('enterprises')
                        ->where('id', $id)
                        ->update(['name' => $request->input('name'),'telephone' => $request->input('telephone'),
                        'address' => $request->input('address'),'picture' => $file->getClientOriginalName()]);
                        //เอาไฟล์ที่อัพโหลด ไปเก็บไว้ที่ public/uploads/ชื่อไฟล์เดิม
                        $file->move('img', $file->getClientOriginalName());

                    if($success){
                        return redirect('/enterprise')->with('Confirm', 'อัพเดตข้อมูลโครงการใหม่เรียบร้อย');
                    }else{
                        return redirect('/enterprise')->with('Error', 'อัพเดตข้อมูลโครงการใหม่ไม่สำเร็จ');
                    }
                }
            } else {
                $success = DB::table('enterprises')
                    ->where('id', $id)
                    ->update(['name' => $request->input('name'),'telephone' => $request->input('telephone'),
                    'address' => $request->input('address')]);

                if($success){
                    return redirect('/enterprise')->with('Confirm', 'อัพเดตข้อมูลโครงการใหม่เรียบร้อย');
                }else{
                    return redirect('/enterprise')->with('Error', 'อัพเดตข้อมูลโครงการใหม่ไม่สำเร็จ');
                }
                dd('Request Has No File');
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
        DB::table('enterprises')->where('id', '=', $id)->delete();
        return redirect('/enterprise')->with('Confirm', 'ลบข้อมูลโครงการเรียบร้อย');
        //
    }
}

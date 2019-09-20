<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EnterPrise;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($data)
    {
        //if($data){
            //Session::set('datas', $data);
            $id = EnterPrise::where('id', '=', $data)->firstOrFail();
            return view('/home')->with('id',$id);

        //}else{
          //  return redirect('/select-project');
        //}
        //return Redirect::route('home')->with( ['data' => $data] );
        /* ลบข้อมูล และ รีไปยังหน้าอื่น
        $remove->delete();
        return Redirect::route('admin.manage');
        */
    }
}

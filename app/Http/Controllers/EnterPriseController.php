<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EnterPrise;

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

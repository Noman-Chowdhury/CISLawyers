<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AdminSetting;
use App\Models\Image;
use App\Models\Law;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $setting = AdminSetting::get()->first();   //get admin_Setting table row

        if ($setting == null) {
            $setting = new AdminSetting();
            $setting->slogan = 'NULL';
            $setting->save();
        }
        $sliderImages = Image::where('type','slider')->get();
        $laws = Law::all();
       return view('frontend.home.home', compact('sliderImages','setting','laws'));
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
    public function serviceRequest(){
        return view('frontend.service_request');
    }
}

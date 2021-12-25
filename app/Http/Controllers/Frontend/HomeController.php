<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AdminSetting;
use App\Models\Home;
use App\Models\Image;
use App\Models\Law;
use App\Models\Service;
use App\Models\ServiceRequest;
use Brian2694\Toastr\Facades\Toastr;
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
        $home = Home::first();
       return view('frontend.home.home', compact('sliderImages','setting','laws','home'));
    }
    public function abouts(){
        return view('frontend.about.index');
    }
    public function lawyersList(){
        return view('frontend.lawyers.index');
    }
    public function consultantsList(){
        return view('frontend.consultants.index');
    }
    public function financialAssociatesList(){
        return view('frontend.financial_associates.index');
    }
    public function contact(){
        return view('frontend.contact.index');
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
    public function storeServiceRequest(Request $request){

        $date =  date('dmy');
        if (isset(ServiceRequest::latest()->first()->id)){
           $number  = '000' . (ServiceRequest::latest()->first()->id + 1);
        }else{
            $number='0001';
        }
        $case_id= $date.$number; ;

        $case = new ServiceRequest();
        $case->case_id = $case_id;
        $case->user_id = auth()->user()->id;
        $case->service_id = Service::where('slug',$request->service)->first()->id;
        $case->details = $request->message;
        $case->save();
        Toastr::success('Case Submitted Successfully', 'Success.');
        return redirect()->route('home');
    }
}

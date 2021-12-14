<?php

namespace App\Http\Controllers\Partner\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegistrationRequest;
use App\Models\Admin\Admin;
use App\Models\Admin\Organizations;
use App\Models\Division;
use App\Models\Seller\About;
use App\Models\Seller\Seller;
use App\Notifications\Seller\OrganizationNotification;
use App\Providers\RouteServiceProvider;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    protected $redirectTo = RouteServiceProvider::SELLERHOME;

    public function __construct()
    {
        $this->middleware('guest:seller');
    }

    public function showRegistrationForm()
    {
        $divisions = Division::orderBy('name','asc')->get();
        return view('seller.auth.registration', compact( 'divisions'));
    }

    public function register(StoreRegistrationRequest $request): \Illuminate\Http\JsonResponse
    {
        $date = Carbon::now();
        $expire_at =$date->addYears(1);
        $code = date('Ym') . substr(hexdec(uniqid()), -5);
        DB::beginTransaction();

        try {
            $organizations = Organizations::create([
                'code' => $code,
                'name' => strip_tags($request->name),
                'slug' => Str::slug(strip_tags($request->name), '-'),
                'email' => strip_tags(strtolower($request->email)),
                'phone_number' => strip_tags($request->phone_number),
                'country_id' => 20,
                'division_id' => strip_tags($request->division),
                'district_id' => strip_tags($request->district),
                'upazila_id' => strip_tags($request->upazila),
                'address' => strip_tags($request->address),
                'sector' => strip_tags($request->sector),
                'type' => strip_tags($request->type),
                'expire_at' =>$expire_at ,
            ]);
            $seller = Seller::create([
                'organization_id' => $organizations->id,
                'name' => $organizations->name,
                'phone_number' => $organizations->phone_number,
                'email' => strtolower($organizations->email),
                'password' => bcrypt($request->password),
            ])->assignRole(1);



            $about= new About();
            $about->organization_id =  $organizations->id;
            $about->description="Design your website About page";
            $about->save();
            $admin = Admin::all();

            event(new Registered($seller));
            Notification::send($admin, new OrganizationNotification($organizations,$seller,'created new account'));
            DB::commit();
            // all good
        } catch (\Exception $e) {
            // return $e;
            DB::rollback();
            return response()->json(['success'=>false,'message'=> $e->getMessage()]);
        }
//        $organizationWebUrl = url('')
        $sp = $organizations->slug;
        $organizationWebUrl = url('sp/'.$sp);
        $msg = "New Organization created. Name: $organizations->name ( $organizationWebUrl )";
        info($msg);
        Auth::guard('seller')->login($seller);
        Toastr::success("Registered Successfully", "Success");
        return response()->json(['success'=>true,'route'=>url($this->redirectTo)]);
    }
}
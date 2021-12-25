<?php

namespace App\Http\Controllers\Partner\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\MemberRegistrationRequest;
use App\Models\Admin\Admin;
use App\Models\Division;
use App\Models\Member\Member;
use App\Providers\RouteServiceProvider;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    protected $redirectTo = RouteServiceProvider::MEMBERHOME;

    public function __construct()
    {
        $this->middleware('guest:member');
    }

    public function showRegistrationForm()
    {
        $divisions = Division::orderBy('name','asc')->get();
        return view('member.auth.registration', compact( 'divisions'));
    }

    public function register(MemberRegistrationRequest $request)
    {
        $date = Carbon::now();
        $expire_at =$date->addYears(1);
        $code = date('Ym') . substr(hexdec(uniqid()), -5);
        DB::beginTransaction();

        try {
            $member = Member::create([
//                'uid' => $code,
                'name' => strip_tags($request->name),
                'email' => strip_tags(strtolower($request->email)),
                'phone_number' => strip_tags($request->phone_number),
                'partner_type' => strip_tags($request->type),
                'password' => bcrypt($request->password),
            ]);
            event(new Registered($member));
            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['success'=>false,'message'=> $e->getMessage()]);
        }
        Auth::guard('member')->login($member);
        Toastr::success("Registered Successfully", "Success");
        return response()->json(['success'=>true,'route'=>url($this->redirectTo)]);
    }
}

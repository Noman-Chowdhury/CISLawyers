<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Member\Member;
use App\UploadAble;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    use UploadAble;
    public function index()
    {
        return view('member.home.home');
    }
    public function showProfile()
    {
        $data = Member::findOrFail(Auth::user()->id);
        return view('member.home.profile', compact('data'));
    }
    public function update_general_info(Request $request)
    {
        $member = Member::find(Auth::user()->id);
        if ($request->phone == $member->phone_number) {
            $request->validate([
                'name' => 'required|min:4|max:32|regex:/^[a-zA-Z\s]+$/',
                'image' => 'image|mimes:jpg,png,jpeg|max:512',
//                'phone' => 'bail|numeric|digits:11|regex:/^(?:\+?88)?01[3-9]\d{8}$/|Unique:Sellers,phone_number'
            ]);
            $member->update([
                'name' => $request->name,
                'phone_number' => $request->phone,
            ]);
        } else {
            $request->validate([
                'name' => 'required|min:4|max:32|regex:/^[a-zA-Z\s]+$/',
//                'image' => 'mimes:jpg,png',
                'image' => 'image|mimes:jpg,png,jpeg|max:512',
                'phone' => 'bail|numeric|digits:11|regex:/^(?:\+?88)?01[3-9]\d{8}$/|Unique:Sellers,phone_number'
            ]);
            $member->update([
                'name' => $request->name,
                'phone_number' => $request->phone,
            ]);

        }
        if ($request->hasFile('image')) {
            $filename = $this->uploadOne($request->image, 300, 300, config('imagepath.member-profile'));
            $this->deleteOne(config('imagepath.member-profile'), $member->image); //delete old photo from directory
            $member->update(['profile_image' => $filename]);    //update new filename
        }
        $member->update([
            'name' => $request->name,
            'phone_number' => $request->phone,
        ]);
        $member->save();
        Toastr::success('changed Successfully!', 'Success');
        return back();
    }

    public function update_password_info(Request $request){
        $request->validate([
            'password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_new_password' => 'required|same:new_password'
        ]);
        $member = Member::find(Auth::user()->id);
        if (!\Hash::check($request->password, $member->password)) {
            Toastr::error('Old Password not matched!', 'Success');
            return redirect()->back();
        } else {
            $member->password = bcrypt($request->new_password);
            $member->save();
            Toastr::success('Password changed Successfully!', 'Success');
            return redirect()->back();
        }
    }

}

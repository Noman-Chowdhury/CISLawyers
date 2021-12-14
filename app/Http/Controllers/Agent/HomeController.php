<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Agent\Agent;
use App\Traits\UploadAble;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    use UploadAble;

    public function index()
    {
        return view('agent.home.home');
    }
    public function login()
    {
        return view('agent.auth.login');
    }

    //agent profile show
    public function view_profile()
    {
        $data = Auth::user();
        return view('agent.profile.edit', compact('data'));
    }

    public function update_general(Request $request,$id)
    {
        $agent = Agent::find($id);
        if ($request->hasFile('image')) {
            $filename = $this->uploadOne($request->image,300,300, config('imagepath.profile'));
            $this->deleteOne(config('imagepath.profile'),$agent->image); //delete old photo from directory
            $agent->update(['image' => $filename]);    //update new filename
        }
//        $admin->dob = Carbon::parse($request->dob)->format('d-m-Y');
        $agent->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'dob'=>$request->dob,
        ]);
        Toastr::success('Information changed Successfully!','Success');
        return redirect()->back();
    }
    public function update_password(Request $request,$id)
    {
        $request->validate([
            'password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_new_password' => 'required|same:new_password',
        ]);
        $agent = Agent::find($id);
        if (!\Hash::check($request->password, $agent->password)) {
            Toastr::error('Fill password filed correctly!','Error');
            return back();
        } else {

            $agent = Agent::find($id);
            $agent->password = bcrypt($request->new_password);
            $agent->save();
            Toastr::success('Password changed Successfully!','Success');
            return redirect()->back();
        }
    }
}

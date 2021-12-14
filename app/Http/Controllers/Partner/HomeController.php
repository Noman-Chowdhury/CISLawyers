<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Seller\Product;
use App\Models\Seller\Seller;
use App\Models\Seller\Service;
use App\Traits\getProductList;
use App\Traits\ProductServiceList;
use App\Traits\UploadAble;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    use UploadAble, ProductServiceList;

    public function index()
    {
        if(\auth('seller')->user()->organization->sector == 'product'){
            return $this->getProductList('seller.home.home');
        }else{
            return $this->getServiceList('seller.home.home');
        }

    }

    public function view_seller_profile()
    {
        $data = Auth::user();
        return view('seller.profile.personal', compact('data'));
    }

    public function update_general_info(Request $request, $id)
    {
        $seller = Seller::find($id);
        if ($request->phone == $seller->phone_number) {
            $request->validate([
                'name' => 'required|min:4|max:32|regex:/^[a-zA-Z\s]+$/',
                'image' => 'image|mimes:jpg,png,jpeg|max:512',
//                'phone' => 'bail|numeric|digits:11|regex:/^(?:\+?88)?01[3-9]\d{8}$/|Unique:Sellers,phone_number'
            ]);
            $seller->update([
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
            $seller->update([
                'name' => $request->name,
                'phone_number' => $request->phone,
            ]);

        }
        if ($request->hasFile('image')) {
            $filename = $this->uploadOne($request->image, 300, 300, config('imagepath.profile'));
            $this->deleteOne(config('imagepath.profile'), $seller->image); //delete old photo from directory
            $seller->update(['image' => $filename]);    //update new filename
        }
        $seller->update([
            'name' => $request->name,
            'phone_number' => $request->phone,
        ]);
        $seller->save();
        Toastr::success('changed Successfully!', 'Success');
        return back();
    }

    public function update_password_info(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_new_password' => 'required|same:new_password'
        ]);
        $seller = Seller::find($id);
        if (!\Hash::check($request->password, $seller->password)) {
            Toastr::error('Old Password not matched!', 'Success');
            return redirect()->back();
        } else {
            $seller = Seller::find($id);
            $seller->password = bcrypt($request->new_password);
            $seller->save();
            Toastr::success('Password changed Successfully!', 'Success');
            return redirect()->back();
        }
    }
}
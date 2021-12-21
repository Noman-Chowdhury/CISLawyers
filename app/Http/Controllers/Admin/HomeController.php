<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Admin\Organizations;
use App\Models\Invoice;
use App\Models\Partner\BusinessPartner;
use App\Models\Seller\Seller;
use App\Models\Seller\Service;
use App\Models\Seller\Product;
use App\Models\User;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home.home');
    }

    public function login()
    {
        return view('admin.auth.login');
    }
    public function add_partner(Request $request)
    {
        $partner = new BusinessPartner();
        $partner->name = $request->full_name;
        $partner->email = $request->user_email;
        $partner->password = bcrypt(12345678);
        $partner->partner_type = $request->type;
        $partner->father_name = $request->father_name;
        $partner->mother_name = $request->mother_name;
//        $partner->dob = $request->date_of_birth;
        $partner->nid_number = $request->nid_num;
        $partner->passport_number = $request->passport_num;
        $partner->bank_name = $request->bank_name;
        $partner->bank_account_number = $request->bank_acc_number;
        $partner->save();
        if ($partner->save()){
            return response()->json(['success' => true, 'message' => 'Partner added']);
        }
        return response()->json(['success' => false, 'message' => 'Partner unable to add']);
    }
    public function partner_list(Request $request)
    {
        if (\request()->ajax()) {
            $partners = BusinessPartner::all();
            return DataTables::of($partners)->addIndexColumn()
                ->addIndexColumn()
                ->addColumn('name', function ($partner) {
                    return  $partner->name;
                })
                ->addColumn('email', function ($partner) {
                    return  $partner->email;
                })
                ->addColumn('partner_type', function ($partner) {
                    return  $partner->partner_type;
                })
                ->addColumn('nid_number', function ($partner) {
                    return  $partner->nid_number;
                })
                ->addColumn('passport_number', function ($partner) {
                    return  $partner->passport_number;
                })

                ->addColumn('action', function ($partner) {
                    return view('admin.partner.action_button', compact('partner'));
                })
                ->rawColumns(['name', 'email', 'partner_type', 'nid_number', 'passport_number', 'action'])
                ->tojson();
        }
        return view('admin.partner.index');
    }
}

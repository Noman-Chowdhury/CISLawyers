<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Admin\Organizations;
use App\Models\Invoice;
use App\Models\Seller\Seller;
use App\Models\Seller\Service;
use App\Models\Seller\Product;
use App\Models\User;
use App\Traits\UploadAble;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

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
}

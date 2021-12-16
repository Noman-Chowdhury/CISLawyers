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

    public function index()
    {
        return view('partner.home.home');

    }

}

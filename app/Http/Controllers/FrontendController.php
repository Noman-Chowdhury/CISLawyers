<?php

namespace App\Http\Controllers;

use App\Models\Admin\Carousel;
use App\Models\AdminSetting;
use App\Models\Home;
use App\Models\Image;
use App\Models\Law;
use App\Uploadable;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Stmt\Return_;
use Yajra\DataTables\Facades\DataTables;

class FrontendController extends Controller
{
    use Uploadable;

    public function getHomeSetting()
    {
        $setting = AdminSetting::get()->first();   //get admin_Setting table row

        if ($setting == null) {
            $setting = new AdminSetting();
            $setting->slogan = 'NULL';
            $setting->save();
        }

        $home = Home::first();
        $sliderImages = Image::where('type', 'slider')->get();
        return view('admin.pages.home', compact('sliderImages', 'setting','home'));
    }

    public function storeCarousel(Request $request)
    {
        $admin_setting = AdminSetting::get()->first();   //get admin_Setting table row
        //create admin setting id with slogan if null

        $setting = new AdminSetting();

        if ($admin_setting == null) {
            $setting->slogan = 'NULL';
            $setting->save();
        }
        if ($request->image != null) {
            //upload carousel images
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $filename = $this->uploadOne($image, 1230, 425, config('imagepath.slider'));
                    $img = new Image();
                    $img->filename = $filename;
                    $img->imageable_id = $setting->id;
                    $img->imageable_type = AdminSetting::class;
                    $img->type = 'slider';
                    $img->save();
                }
                Toastr::success("You successfully uploaded carousel images");
            }
        }
        return back();
    }

    public function sliderImageDelete($id)
    {
        $image = Image::findOrFail($id);
        $this->deleteOne(config('imagepath.slider'), $image->filename);
        $image->delete();
        Toastr::success('Slider Image Deleted Successfully', 'Deleted.');
        return back();
    }

    public function storeSliderText(Request $request)
    {
        $texts = $request->image;
        foreach ($texts as $key => $text) {
            $image = Image::findOrFail($key);
            $image->title = $text['title'];
            $image->text = $text['text'];
            $image->save();
        }
        Toastr::success('Slider Text Updated Successfully', 'Updated.');
        return back();
    }

    public function storeFeature(Request $request)
    {
        $homeData = Home::get()->first();   //get admin_Setting table row

        if ($homeData == null) {
            $homeData = new Home();
            $homeData->feature = json_encode($request->only('feature'), true);
        }else{
            $homeData->feature = json_encode($request->only('feature'), true);
        }
        $homeData->save();

        Toastr::success('Feature Text Updated Successfully', 'Updated.');
        return back();
    }

    public function storeLaw(Request $request)
    {

        $filename = $this->uploadOne($request->image, 870, 720, config('imagepath.law'));
        $law = new Law();
        $law->name = $request->name;
        $law->image = $filename;
        $law->content = $request->details;
        $law->save();
        Toastr::success('Law Added Successfully', 'Success.');
        return back();
    }

    public function laws()
    {
        if (\request()->ajax()) {
            $laws = Law::latest();
            return DataTables::of($laws)
                ->addIndexColumn()
                ->addColumn('action', function ($law) {
                    return view('admin.pages.action');
                })
                ->rawColumns(['action'])
                ->tojson();
        }
    }

    public function lawHeader(Request $request)
    {
        $homeData = Home::get()->first();   //get admin_Setting table row

        if ($homeData == null) {
            $homeData = new Home();
            $homeData->law = json_encode($request->only('law'), true);
        }else{
            $homeData->law = json_encode($request->only('law'), true);
        }
        $homeData->save();

        Toastr::success('Law Header Updated Successfully', 'Success.');
        return back();
    }

    public function basic(){
        if (AdminSetting::first() == null) {
            $setting = new AdminSetting();
            $setting->save();
        }
        $data = AdminSetting::first();
        return view('admin.pages.basic',compact('data'));
    }

    public function storeBasic(Request $request){
        $admin_setting = AdminSetting::get()->first();   //get admin_Setting table row
        //create admin setting id with slogan if null

        $setting = new AdminSetting();

        if ($admin_setting == null) {
            $setting->slogan = 'NULL';
            $setting->save();
        }

        //update logo
        if ($request->hasFile('logo')) {
            if ($admin_setting->logo == !null) {
                File::delete(public_path('/images' . $admin_setting->logo));
            }
            $logo = $request->logo;
            $filename = $this->uploadOne($logo, 312, 64, config('imagepath.default'), true);
            $admin_setting->update(['logo' => $filename]);
            Toastr::success("You successfully updated logo");
        }

        $input = $request->except(['image', 'logo']);
        $input = array_filter($input, 'strlen');
        $admin_setting->fill($input)->update();
        Toastr::success("You updated only modified input fields.");
        return back();
    }

    public function storeClientContent(Request $request){
        $homeData = Home::get()->first();   //get admin_Setting table row

        if ($homeData == null) {
            $homeData = new Home();
            $homeData->client = json_encode($request->only('client'), true);
        }else{
            $homeData->client = json_encode($request->only('client'), true);
        }
        $homeData->save();
        Toastr::success("Client Section Content updated Successfully.", 'Success');
        return back();
    }
}

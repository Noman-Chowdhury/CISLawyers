<?php

namespace App\Http\Controllers;

use App\Models\AdminSetting;
use App\Models\Image;
use App\Models\Law;
use App\Uploadable;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
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
        $sliderImages = Image::where('type', 'slider')->get();
        return view('admin.pages.home', compact('sliderImages', 'setting'));
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
        $admin_setting = AdminSetting::get()->first();   //get admin_Setting table row

        if ($admin_setting == null) {
            $admin_setting = new AdminSetting();
            $admin_setting->slogan = 'NULL';
            $admin_setting->save();
        }
//        if (json_decode($admin_setting->rules, true)['feature']){
//            $update = json_decode($admin_setting->rules, true)['feature'];
//        }
        $admin_setting->rules = json_encode($request->only('feature'), true);
        $admin_setting->save();
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
        $setting = AdminSetting::get()->first();   //get admin_Setting table row
        if ($setting == null) {
            $setting = new AdminSetting();
            $setting->slogan = 'NULL';
            $setting->save();
        }
        $existing = json_decode(($setting->rules));
        $existing->law = $request->law;
        $setting->rules = json_encode($existing);
        $setting->save();
        Toastr::success('Law Header Updated Successfully', 'Success.');
        return back();
    }
}

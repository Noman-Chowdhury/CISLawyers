<?php

namespace App\Http\Controllers;

use App\Models\AdminSetting;
use App\Models\Image;
use App\Uploadable;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    use Uploadable;

    public function getHomeSetting()
    {
        $sliderImages = Image::where('type','slider')->get();
        return view('admin.pages.home', compact('sliderImages'));
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
                        $img->type='slider';
                        $img->save();
                    }
                    Toastr::success("You successfully uploaded carousel images");
                }
        }
        return back();
    }

    public function sliderImageDelete($id){
        $image = Image::findOrFail($id);
        $this->deleteOne(config('imagepath.slider'),$image->filename);
        $image->delete();
        Toastr::success('Slider Image Deleted Successfully', 'Deleted.');
        return back();
    }
    
    public function storeSliderText(Request $request){
        $texts = $request->image;
        foreach($texts as $key=>$text){
            $image = Image::findOrFail($key);
            $image->title = $text['title'];
            $image->text = $text['text'];
            $image->save();
       }
        return back();
    }
}
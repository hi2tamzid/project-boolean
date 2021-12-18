<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Image;
class Supervisor extends Model
{
    use HasFactory, SoftDeletes;

    protected $attributes = [
        'is_acc_open' => TRUE,
    ];

    public function imageUpload($request)
    {
        $image = $request->file('image');
        $originalImage = $image;
        $name_with_ext = $originalImage->getClientOriginalName();
        $name_with_ext_arr = explode(".", $name_with_ext);
        $extension = end($name_with_ext_arr);
        $name_only = time();
        $image_name = $name_only . '.' . $extension;
        // dd($image_name);
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath = public_path() . '/image/';
        $thumbnailImage->save($thumbnailPath . $image_name);

        return $image_name;
    }
}

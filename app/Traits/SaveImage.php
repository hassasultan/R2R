<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait SaveImage
{
    /**
     * Set slug attribute.
     *
     * @param string $value
     * @return void
     */
    public function catImage($image)
    {
        // $this->attributes['slug'] = Str::slug($image, config('roles.separator'));
        $img = $image;
        $number = rand(1,999);
        $numb = $number / 7 ;
        $extension      = $img->extension();
        $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
        $filenamepath   = 'category/image'.'/'.'img/'.$filenamenew;
        $filename       = $img->move(public_path('storage/category/image'.'/'.'img'),$filenamenew);
        return $filenamepath;
    }
    public function subcatImage($image)
    {
        // $this->attributes['slug'] = Str::slug($image, config('roles.separator'));
        $img = $image;
        $number = rand(1,999);
        $numb = $number / 7 ;
        $extension      = $img->extension();
        $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
        $filenamepath   = 'subcategory/image'.'/'.'img/'.$filenamenew;
        $filename       = $img->move(public_path('storage/subcategory/image'.'/'.'img'),$filenamenew);
        return $filenamepath;
    }
    public function brandImage($image)
    {
        $img = $image;
        $number = rand(1,999);
        $numb = $number / 7 ;
        $extension      = $img->extension();
        $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
        $filenamepath   = 'brand'.'/'.'img/'.$filenamenew;
        $filename       = $img->move(public_path('storage/brand/'.'/'.'img'),$filenamenew);
        return $filenamepath;

    }
    public function feaImage($image)
    {
        $img = $image;
        $number = rand(1,999);
        $numb = $number / 7 ;
        $extension      = $img->extension();
        $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
        $filenamepath   = 'product/Feature'.'/'.'img/'.$filenamenew;
        $filename       = $img->move(public_path('storage/product/Feature'.'/'.'img'),$filenamenew);
        return $filenamepath;

    }
    public function productImage($image)
    {
        $img = $image;
        $number = rand(1,999);
        $numb = $number / 7 ;
        $extension      = $img->extension();
        $filenamenew    = date('Y-m-d')."_.".$numb."_.".$extension;
        $filenamepath   = 'product/image'.'/'.'img/'.$filenamenew;
        $filename       = $img->move(public_path('storage/product/image'.'/'.'img'),$filenamenew);
        return $filenamepath;

    }
}

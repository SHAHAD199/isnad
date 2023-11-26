<?php 

namespace App\Helpers;

class ImgStore 
{
    public static function img_mod($request)
    {
        if($request->img){
            $path = time() . '.' . $request->img->getClientOriginalExtension();
            $request->img->move('uploads/blocks', $path);
            $insert_img = $path;
        }
        else{
            $insert_img = null;
        }

        return $insert_img;
    }
}
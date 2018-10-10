<?php

function saveImage($img, $id, $path_img, $table, $field) 
{
    if(!empty($img)) {
        $image = explode(',', $img);   

        $decoded = base64_decode($image[1]);

        if(str_contains($image[0], ['jpeg','jpg']))
            $extension = 'jpg';
        else 
            $extension = 'png';

        $filename = $id . '.'. $extension;

        $path = public_path().$path_img;

        if (file_exists($path.$id.'.jpg')) unlink($path.$id.'.jpg');
        if (file_exists($path.$id.'.png')) unlink($path.$id.'.png');

        file_put_contents($path.$filename, $decoded);

        
        $path_image = $path_img. $id. '.'.$extension;
        $table->update([$field => $path_image]);
   }
}

function fileExists($path_image) 
{
    $path = public_path().$path_image;

    if (file_exists($path)) {
        return true;
    } else {
        return false;
    }
}
?>
<?php


namespace App\Traits;


use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait UploadFile
{

    public function uploadImage($data)
    {

        $destinationPath = public_path('upload/images');
        $imagename = time() . '-' . $data->file('photo')->getClientOriginalName();
        $img = Image::make($data->file('photo')->getRealPath());
        $img->save($destinationPath . '/' . $imagename,70);
        return $imagename;

    }

    public  function uploadPdf($data)
    {

            $file_name=time() . '-' . $data->getClientOriginalName();
            $data->storeAs('files',$file_name,'images');
            return $file_name;


    }

    public function deleteFile($id)
    {
        $avatar= User::find($id)->avatar;
        $file = public_path() . '/upload/' . $avatar;

        if (File::exists($file)) {
            File::delete($file);

        }

    }
}

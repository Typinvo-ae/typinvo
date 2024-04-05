<?php


namespace Modules\Common\Helper;


use Intervention\Image\Facades\Image;

trait UploaderHelper
{

    function upload($imageFromRequest, $imageFolder, $resize = false)
    {

        $fileName = time() . $imageFromRequest->getClientOriginalName();
        $location = public_path('uploads/' . $imageFolder . '/' . $fileName);
        $image = Image::make($imageFromRequest);
        $image->resize(500,500);
        $image->save($location, 50);
        return $fileName;
    }

    function getImageName($folderName,$imagePath)
    {
        $needle = $folderName.'/';
        return substr($imagePath, strpos($imagePath, $needle) + strlen($needle));
    }

}

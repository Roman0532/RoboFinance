<?php

namespace app\Services;

class ImageService
{
    public function uploadImageOnServer($file)
    {
        $format = pathinfo($file, PATHINFO_EXTENSION);
        $success = false;

        foreach (["jpg", "jpeg", "png", "svg"] as $value) {
            if (strtolower($format) == $value) {
                $success = true;
            }
        }

        if (!$success) {
            return false;
        }

        $filename = md5($file . time()) . '.' . $format;
        $uploadDir = 'storage/';
        $uploadFile = $uploadDir . $filename;
        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
            return $filename;
        }
        return false;
    }

    public function deleteImageFromServer($file)
    {
        unlink('storage/' . $file);
    }
}
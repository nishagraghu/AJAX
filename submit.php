<?php

if (!empty($_FILES['file']['name'])) {
    $uploadedFile = '';
    $uploadedfile1 = $_FILES['file']['name'];

    if (!empty($_FILES["file"]["type"])) {
        $fileName = time() . '_' . $_FILES['file']['name'];
        $valid_extensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["file"]["name"]);
        $file_extension = end($temporary);
        if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)) {
            $sourcePath = $_FILES['file']['tmp_name'];
            $targetPath = "uploads/" . $fileName;
            if ($_FILES["file"]["type"] == "image/jpg" || $_FILES["file"]["type"] == "image/jpeg") {
                $uploadedfile = $_FILES['file']['tmp_name'];
                $src = imagecreatefromjpeg($uploadedfile);
            } else if ($_FILES["file"]["type"] == "image/png") {
                $uploadedfile = $_FILES['file']['tmp_name'];
                $src = imagecreatefrompng($uploadedfile);
            } else {
                $src = imagecreatefromgif($uploadedfile);
            }
            if (move_uploaded_file($sourcePath, $targetPath)) {
                $uploadedFile = $fileName;
             
                list($width, $height) = getimagesize('uploads/' . $fileName);
                $newwidth = 60;
                $newheight = ($height / $width) * $newwidth;
                $tmp = imagecreatetruecolor($newwidth, $newheight);
                $newwidth1 = 25;
                $newheight1 = ($height / $width) * $newwidth1;
                $tmp1 = imagecreatetruecolor($newwidth1, $newheight1);

                imagecopyresampled(
                    $tmp,
                    $src,
                    0,
                    0,
                    0,
                    0,
                    $newwidth,
                    $newheight,
                    $width,
                    $height
                );

                imagecopyresampled(
                    $tmp1,
                    $src,
                    0,
                    0,
                    0,
                    0,
                    $newwidth1,
                    $newheight1,
                    $width,
                    $height
                );

                $filename = "images/" . $_FILES['file']['name'];
                $filename1 = "images/small" . $_FILES['file']['name'];

                imagejpeg($tmp, $filename, 100);
                imagejpeg($tmp1, $filename1, 100);

                imagedestroy($src);
                imagedestroy($tmp);
                imagedestroy($tmp1);
            }
        }
    }

    echo "images/small" . $_FILES['file']['name'];
    // echo $insert?'ok':'err';
}

<?php
use App\Core\Request;
class ImageRequest extends Request
{
    public function __construct($request)
    {
        $this->input = $request->input();
    }

    public function imageAuth($dir, $album)
    {
        session_start();
        $test = 0;
        $target_dir = "app/content/" . $dir . "/" . $album->name . "/";
        if (isset($_FILES['fileToUpload'])) {
            $fileCount = count($_FILES['fileToUpload']["name"]);
          
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


            // Check if image file is a actual image or fake image
            if (!isset($_FILES["fileToUpload"]["name"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check == false) {
                    $_SESSION['error'] = "{$_FILES["fileToUpload"]["name"]} is not an image." ;
                }
            }
      
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                $_SESSION['error'] ="Sorry, {$_FILES["fileToUpload"]["name"]} is not a JPG, JPEG, PNG & GIF file";
            }

            // Check if $_SESSION['error'] is set to 0 by an error
            if (empty($_SESSION['error'])) {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $_SESSION['path'] =$target_dir.basename($_FILES["fileToUpload"]["name"]);
                }
            }
        }
    }
}



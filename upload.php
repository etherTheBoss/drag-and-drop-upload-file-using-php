<?php

/**
 * DRAG AND DROP FILE UPLOAD
 * Created by
 * Habibur Rahman
 * Sr. Software Engineer
 * Date: 07/03/2018
 * Time : 13:17:21
 */
include 'database/config.php';
include 'database/database.php';
$db= new Database();



$name=$_FILES['myFiles']['name'];


$tempName = $_FILES['myFiles']['tmp_name'];
$type = $_FILES['myFiles']['type'];
$size = $_FILES['myFiles']['size'];
$fileExtension = strtolower(substr($name, strpos($name, '.')+1));
$max = 200000;




if(isset($name ))
{
    if (!empty($name))
    {
//        foreach ($names as $name)
//        {

//            if(($fileExtension =='jpg' || $fileExtension == 'jpeg') && $type == 'image/jpeg' && $size<=$max)
//            {
                $location = 'upload/'; //the upload folder;

                if(move_uploaded_file($tempName , $location.$name ))
                {
                    $sql = "INSERT INTO file(file_name, file_type) Values('$name', '$type')";

                     $db->insert($sql);
                    header("Location: index.php");
                }
                else
                {
                    echo 'Error!! could not be uploaded';
                }
//            }
//            else
//            {
//                echo 'Error!! format or file size..';
//            }
//        }die;
    }
}
?>
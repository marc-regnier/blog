<?php

namespace App\config;

class Upload
{
    private $upload;

    private $supportedFormats = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];


    public function __construct($upload)
    {
        $this->upload = $upload;
    }

    public function uploadFile($file)
    {
        $supportedFormats = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif'];
        if (is_array($file)) 
        {
            if (in_array($file['type'], $supportedFormats)) 
            {

                move_uploaded_file($file['tmp_name'], '../uploads/'. $file['name']);
                echo 'File has been uploaded';
            }
            else
            {
                die('file format is not supported!');
            }
        } 
        else
        {
            die('No file was uploaded!');
        }
    }
}

<?php

namespace App\Controllers;

use App\Core\App;
use ImageRequest;

class ImagesController 
{
    private $imageRequest;
    
    public function __construct($request)
    {
        $this->imageRequest = new ImageRequest($request);
    }

    public function home()
    {
        session_start();
        if(isset($_SESSION['email']) )
        {   
            $images = App::get('imageQuery')->selectAllOneCon('images','id_album',$this->imageRequest->reqData('a_id'));
            return viewImage('image', compact('images'),$this->imageRequest->reqData('a_id'));
        }
        else 
        return redirect('login');
    }
    public function save()
    {
        session_start();
        $this->imageRequest->imageAuth(App::get('userQuery')->selectAllOneCon('users','email', $_SESSION['email'])[0]->dir,App::get('userQuery')->selectAllOneCon('albums','id',$this->imageRequest->reqData('a_id'))[0]);
        if (empty($_SESSION['error'])) {
            App::get('imageQuery')->insertImage(
                $_SESSION['path'],
                $this->imageRequest->reqData('a_id'),
            );
        }
        else
        return redirect('images?a_id='.$_SESSION['a_id']);
    }

    public function delete(){
        session_start();
        App::get('imageQuery')->deleteImg($_SESSION['email'],$this->imageRequest->reqData('imageId'));
    }
}
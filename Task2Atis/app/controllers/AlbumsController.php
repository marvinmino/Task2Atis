<?php

namespace App\Controllers;

use App\Core\App;
use AlbumRequest;

class AlbumsController 
{
    private $albumRequest;
    
    public function __construct($request)
    {
        $this->albumRequest = new AlbumRequest($request);
    }

    public function home()
    {
        session_start();
        if(isset($_SESSION['email']) )
        {  
            $albums = App::get('albumQuery')->selectAllOneCon('albums','user_email', $_SESSION['email']);
            return view('home', compact('albums'));
        }
        else 
        return redirect('login');
    }
    public function save()
    {
        session_start();
        $this->albumRequest->albumAuth();
        if(empty($_SESSION['error']))
            App::get('albumQuery')->insertAlbum(
                    $this->albumRequest->reqData('albumName'),
                    $_SESSION['email'] );
        else
        return redirect('home');
    }
    public function thumbnail()
    {   
        App::get('albumQuery')->thumbnail($this->albumRequest->reqData('thumb'),$this->albumRequest->reqData('album'));
            
    }
    public function delete(){
        session_start();
        App::get('albumQuery')->deleteAlbum($_SESSION['email'],$this->albumRequest->reqData('a_id'));
        return redirect('home');
    }
}
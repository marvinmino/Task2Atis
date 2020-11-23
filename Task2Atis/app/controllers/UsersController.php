<?php

namespace App\Controllers;

use App\Core\App;
use UserRequest;

class UsersController 
{

    private $userRequest;
   
    public function __construct($request){
        $this->userRequest = new UserRequest($request);
    }
    public function home()
    {   session_start();
        if(isset($_SESSION['email']))
        return redirect('home');
        return view('register');
    }

    /**
     * Store a new user in the database.
     */
    public function store()
    {   $direc = md5(uniqid(rand(), true));
        session_start();
        $this->userRequest->regAuth();
        if (empty($_SESSION['error'])) {
            App::get('userQuery')->register(
            $this->userRequest->reqData('name'),
            $this->userRequest->reqData('surname'),
            $this->userRequest->reqData('email'),
            $this->userRequest->reqData('password1'),
            $direc
        );
        
        }     
     }
    public function indexLog()
    {   session_start();
        if(isset($_SESSION['email']))
        header('location:home');
        else
        return view('login');
    }
    public function log()
    {   
        session_start();
        $this->userRequest->logAuth();
         if (empty($_SESSION['error'])) 
            App::get('userQuery')->login(
                $this->userRequest->reqData('email'),
                $this->userRequest->reqData('password1'));
    }
    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        header("location:login");
        exit();
    }
}

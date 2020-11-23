<?php
use App\Core\Request;
class UserRequest extends Request{
    public function __construct($request)
    {
        $this->input = $request->input();
    }

    public function logAuth(){  
        if (empty($this->reqData('email'))) {
            session_start();
            $_SESSION['error'] = "email not set";
            return redirect('login');
            return true;
        }
        if (empty($this->reqData('password1'))) {
            session_start();
            $_SESSION['error'] = "password not set";
            return redirect('login');
            return true;
        }

    }
    public function regAuth(){
        
        if (empty($this->reqData('name'))) {
            session_start();
            $_SESSION['error'] = "Name not set";
            return redirect('register');
            return true;
        }
        if (empty($this->reqData('surname'))) {
            session_start();
            $_SESSION['error'] = "Surname not set";
            return redirect('register');
            return true;
        }
        if (empty($this->reqData('email'))) {
            session_start();
            $_SESSION['error'] = "Email not set";
            return redirect('register');
            return true;
        }


        if ($this->reqData('password1')) {
            if (strlen($_POST['password1']) < 6) {
                session_start();
                $_SESSION['error'] = "Password is too short";
                header("Location: register");
                return true;
            }
            if ($this->reqData('password1') != $this->reqData('password2')) {
                session_start();
                $_SESSION['error'] = "Passwords don't match";
                return redirect('register');
                return true;
            }
        } else {
            session_start();
            $_SESSION['error'] = "Password not set";
            return redirect('register');
            return true;
        }

    }

}
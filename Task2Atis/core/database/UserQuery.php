<?php 

namespace App\Core\Database;

use PDO;
class UserQuery extends QueryBuilder{
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function register($name,$surname,$email,$password,$dir)
    {
        if(empty($this->selectAllOneCon('users','email',$email)))
        {
            $this->insert('users', [
            'name'      =>     $name,
            'surname'   =>     $surname,
            'email'     =>     $email,
            'password'  => md5($password),
            'dir'       =>     $dir,
        ]);
        mkdir('app/content/' . $dir);
        session_start();
        $_SESSION['email']=$email;
        return redirect('home');
        }
        else 
        {
            session_start();
            $_SESSION['error']="User with the same email already exists";
            return redirect('register');
        }
    }
    public function login($email,$password)
    {    
        if(empty($this->selectAllTwoCon('users','email',$email,'password',md5($password))))
        {
            session_start();
            $_SESSION['error']="No email/password combination exists";
            return redirect('login');
        }
        else
        {
            session_start();
            $_SESSION['email']=$email;
            return redirect('home');
        }
    }
}
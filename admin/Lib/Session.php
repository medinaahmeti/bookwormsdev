<?php
 
namespace Admin\Lib;
// session_start();
class Session{
    private $signed_in=false;
    public $user_id;
    public $message;
    public $fullname;
    public $roli;
    public $password;

    public function __construct(){
       session_start();
        $this->check_the_login();
        $this->check_message();
    }
    public function is_signed_in(){
        return $this->signed_in;
    }
    public function login($user){
        if($user){
            $this->user_id=$_SESSION['user_id']=$user->id;
            $this->fullname=$_SESSION['fullname']=$user->emri . " " . $user->mbiemri;
            $this->roli=$_SESSION['roli']=$user->roli;
            $this->password=$_SESSION['password']=$_POST['password'];
            $this->signed_in=true;
        }
    }

    public function logout(){
        unset($this->user_id);
        unset($_SESSION['user_id']);
        unset($_SESSION['fullname']);
        $this->signed_in=false;
    }
    public function remove_message(){
        unset($_SESSION['message']);
        $this->message="";
    }
    public function message($msg){
        if(!empty($msg)){
            $_SESSION['message']=$msg;
            $this->message = $_SESSION['message']; 
        }else{
            return $this->message;
        }
    }
    public function check_message(){
        if(isset($_SESSION['message'])){
            $this->message=$_SESSION['message'];
            unset($_SESSION[$this->message]);
        }else{
            $this->message="";
        }
    }
    private function check_the_login(){
        if(isset($_SESSION['user_id'])){
            $this->user_id=$_SESSION['user_id'];
            $this->fullname=$_SESSION['fullname'];
            $this->signed_in=true;
        }else{
            unset($this->user_id);
            $this->signed_in=false;
        }
    }
}
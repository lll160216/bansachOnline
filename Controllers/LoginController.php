<?php
    class LoginController extends BaseController
    {
        private $username;
        private $pwd;
        private $userModel;
        public function __construct()
        {

            $this->loadModel('UserModel');//Gọi trang Model
            $this->userModel = new UserModel; // 
        }
        public function index()
        {   

            $tenKh =  $this->userModel->displayName('admin');
            $this->username = $_POST['username'];
            $this->pwd = $_POST['password'];
            $check = $this->userModel->isAdmin($this->username);
            $verify = $this->userModel->findUser($this->username,$this->pwd);
            if($verify==1){
                if($check==1){
                    $_SESSION["admin"]="admin";
                    header("location: index.php?controller=bill") ;
                    unset($_SESSION["user"]);
                }
                else{
                    $_SESSION["user"]=$this->username;
                    header("location: index.php") ;
                    unset($_SESSION["admin"]);
                }
            }
            else{
                $_SESSION["wrong"]="wrong";
            }
            echo "<script>history.back()</script>";
        }


        public function logout()
        {
            session_destroy();
            header("location: login.php");
        }
}

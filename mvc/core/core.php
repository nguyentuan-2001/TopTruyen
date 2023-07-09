<?php
    require_once "./mvc/core/libs.php";
    require_once "./mvc/core/route.php";
    class core{
        public function view($view, $data=[]){
            require_once "./mvc/views/".$view.".php";
        }

        public function model($model){
            require_once "./mvc/models/".$model.".php";
            return new $model;
        }

        public function loginSession($session){
            $_SESSION['toptruyen_id'] = $session['id_account'];
            $_SESSION['toptruyen_user'] = $session['username'];
            $_SESSION['toptruyen_auth'] = $session['auth'];
        }
        public function logoutSession(){
            unset($_SESSION['toptruyen_id']);
            unset($_SESSION['toptruyen_user']);
            unset($_SESSION['toptruyen_auth']);
        }
    }
?>
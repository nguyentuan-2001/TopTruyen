<?php
    require_once "./mvc/core/libs.php";
    class account_model extends dbCon{
        private $Account;

        function __construct(){
            $this->Account = new dbCon();
            $this->Account = $this->Account->connect();
        }

        public function add($username, $password){
            try{
                $query = "INSERT INTO account(username, password) VALUES(:username,:password)";
                $cmd = $this->Account->prepare($query);
                $cmd->bindValue(":username",$username);
                $cmd->bindValue(":password",sha1(SALT.$password));
                $cmd->execute();
                return $cmd->rowCount() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function get($username){
            try{
                $query = "SELECT * FROM account WHERE username = :username";
                $cmd = $this->Account->prepare($query);
                $cmd->bindValue(":username",$username);
                $cmd->execute();
                return $cmd->fetch() ;
                
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function login($username, $password){
            try{
                $query = "SELECT * FROM account WHERE username = :username AND password = :password";
                $cmd = $this->Account->prepare($query);
                $cmd->bindValue(":username",$username);
                $cmd->bindValue(":password",sha1(SALT.$password));
                $cmd->execute();

                if($cmd->rowCount() >0){
                    return true ;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
    }
?>
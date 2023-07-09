<?php
    require_once "./mvc/core/libs.php";
    class story_category_model extends dbCon{
        private $Story_Category;

        function __construct(){
            $this->Story_Category = new dbCon();
            $this->Story_Category = $this->Story_Category->connect();
        }

        public function add($id_story,$name){
            try{
                $query = "INSERT INTO story_category(id_story, name,name_unsigned) VALUES (:id_story, :name, :name_unsigned)";
                $cmd = $this->Story_Category->prepare($query);
                $cmd->bindValue(":id_story",$id_story);
                $cmd->bindValue(":name",$name);
                $cmd->bindValue(":name_unsigned", Slug($name));
                $cmd->execute();
                return $cmd->rowCount() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function get($id_story){
            try{
                $query = "SELECT name FROM story_category WHERE id_story = :id_story";
                $cmd = $this->Story_Category->prepare($query);
                $cmd->bindValue(":id_story",$id_story);
                $cmd->execute();
                return $cmd->fetchAll() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function detete($id_story){
            try{
                $query = "DELETE FROM story_category WHERE id_story= :id_story";
                $cmd = $this->Story_Category->prepare($query);
                $cmd->bindValue(":id_story",$id_story);
                $cmd->execute();
                return $cmd->rowCount() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
    }
?>
<?php
    require_once "./mvc/core/libs.php";
    class category_model extends dbCon{
        private $Category;

        function __construct(){
            $this->Category = new dbCon();
            $this->Category = $this->Category->connect();
        }

        public function add($name_category){
            try{
                $query = "INSERT INTO category(name_category, name_unsigned) VALUES (:name_category, :name_unsigned)";
                $cmd = $this->Category->prepare($query);
                $cmd->bindValue(":name_category",$name_category);
                $cmd->bindValue(":name_unsigned", Slug($name_category));
                $cmd->execute();
                return $cmd->rowCount() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function getAll(){
            try{
                $query = "SELECT * FROM category ORDER BY id_category ASC";
                $cmd = $this->Category->prepare($query);
                $cmd->execute();
                return $cmd->fetchAll() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function edit($id_category,$name_category){
            try{
                $query = "UPDATE category SET name_category= :name_category, name_unsigned= :name_unsigned WHERE id_category= :id_category";
                $cmd = $this->Category->prepare($query);
                $cmd->bindValue(":name_category",$name_category);
                $cmd->bindValue(":name_unsigned", Slug($name_category));
                $cmd->bindValue(":id_category",$id_category);
                $cmd->execute();
                return $cmd->rowCount() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function detete($id_category){
            try{
                $query = "DELETE FROM category WHERE id_category= :id_category";
                $cmd = $this->Category->prepare($query);
                $cmd->bindValue(":id_category",$id_category);
                $cmd->execute();
                return $cmd->rowCount() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
    }
?>
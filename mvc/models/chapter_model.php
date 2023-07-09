<?php
    require_once "./mvc/core/libs.php";
    class chapter_model extends dbCon{
        private $Chapter;

        function __construct(){
            $this->Chapter = new dbCon();
            $this->Chapter = $this->Chapter->connect();
        }

        public function add($id_story,$number_chapter, $name, $content){
            try{
                $query = "INSERT INTO chapter(id_story,number_chapter, name, name_unsigned, content) VALUES(:id_story,:number_chapter, :name, :name_unsigned, :content)";
                $cmd = $this->Chapter->prepare($query);
                $cmd->bindValue(":id_story",$id_story);
                $cmd->bindValue(":number_chapter",$number_chapter);
                $cmd->bindValue(":name",$name);
                $cmd->bindValue(":name_unsigned", Slug($name));
                $cmd->bindValue(":content",$content);
                $cmd->execute();
                return $cmd->rowCount() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function get($id_story){
            try{
                $query = "SELECT * FROM chapter WHERE id_story=:id_story";
                $cmd = $this->Chapter->prepare($query);
                $cmd->bindValue(":id_story",$id_story);
                $cmd->execute();
                return $cmd->fetchAll() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function getHome($id_story,$number_chapter){
            try{
                $query = "SELECT * FROM chapter WHERE id_story=:id_story AND number_chapter=:number_chapter";
                $cmd = $this->Chapter->prepare($query);
                $cmd->bindValue(":id_story",$id_story);
                $cmd->bindValue(":number_chapter",$number_chapter);
                $cmd->execute();
                return $cmd->fetch() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function getNew($id_story){
            try{
                $query = "SELECT * FROM chapter WHERE id_story=:id_story ORDER BY updated_at DESC LIMIT 5";
                $cmd = $this->Chapter->prepare($query);
                $cmd->bindValue(":id_story",$id_story);
                $cmd->execute();
                return $cmd->fetchAll() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function getall($name_unsigned){
            try{
                $query = "SELECT * FROM chapter WHERE name_unsigned = :name_unsigned";
                $cmd = $this->Chapter->prepare($query);
                $cmd->bindValue(":name_unsigned",$name_unsigned);
                $cmd->execute();
                return $cmd->fetch();
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function getByID($id_chapter){
            try{
                $query = "SELECT * FROM chapter WHERE id_chapter=:id_chapter";
                $cmd = $this->Chapter->prepare($query);
                $cmd->bindValue(":id_chapter",$id_chapter);
                $cmd->execute();
                return $cmd->fetch();
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function getAllChap(){
            try{
                $query = "SELECT * FROM chapter";
                $cmd = $this->Chapter->prepare($query);
                $cmd->execute();
                return $cmd->fetchAll() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function edit($id_chapter, $name, $content){
            try{
                $query = "UPDATE chapter SET name=:name,name_unsigned=:name_unsigned,content=:content WHERE id_chapter=:id_chapter";
                $cmd = $this->Chapter->prepare($query);
                $cmd->bindValue(":name",$name);
                $cmd->bindValue(":name_unsigned", Slug($name));
                $cmd->bindValue(":content",$content);
                $cmd->bindValue(":id_chapter",$id_chapter);
                $cmd->execute();
                return $cmd->rowCount() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function delete($id_chapter){
            try{
                $query = "DELETE FROM chapter WHERE id_chapter=:id_chapter";
                $cmd = $this->Chapter->prepare($query);
                $cmd->bindValue(":id_chapter",$id_chapter);
                $cmd->execute();
                return $cmd->rowCount() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function deleteAll($id_story){
            try{
                $query = "DELETE FROM chapter WHERE id_story= :id_story";
                $cmd = $this->Chapter->prepare($query);
                $cmd->bindValue(":id_story",$id_story);
                $cmd->execute();
                return $cmd->rowCount() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
    }
?>
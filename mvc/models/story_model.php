<?php
    require_once "./mvc/core/libs.php";
    class story_model extends dbCon{
        private $Story;

        function __construct(){
            $this->Story = new dbCon();
            $this->Story = $this->Story->connect();
        }

        public function add($image, $name_story, $author, $source, $status, $introduce){
            try{
                $query = "INSERT INTO story(image, name_story, name_story_unsigned, author, source, status, introduce) VALUES(:image, :name_story, :name_story_unsigned, :author, :source, :status, :introduce)";
                $cmd = $this->Story->prepare($query);
                $cmd->bindValue(":image",$image);
                $cmd->bindValue(":name_story",$name_story);
                $cmd->bindValue(":name_story_unsigned", Slug($name_story));
                $cmd->bindValue(":author",$author);
                $cmd->bindValue(":source",$source);
                $cmd->bindValue(":status",$status);
                $cmd->bindValue(":introduce",$introduce);
                $cmd->execute();
                return $cmd->rowCount() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function getAll(){
            try{
                $query = "SELECT * FROM story ORDER BY updated_at DESC";
                $cmd = $this->Story->prepare($query);
                $cmd->execute();
                return $cmd->fetchAll() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function getID($name_story_unsigned){
            try{
                $query = "SELECT id_story FROM story WHERE name_story_unsigned = :name_story_unsigned";
                $cmd = $this->Story->prepare($query);
                $cmd->bindValue(":name_story_unsigned",$name_story_unsigned);
                $cmd->execute();
                return $cmd->fetch()['id_story'];
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function get($name_story_unsigned){
            try{
                $query = "SELECT * FROM story WHERE name_story_unsigned = :name_story_unsigned";
                $cmd = $this->Story->prepare($query);
                $cmd->bindValue(":name_story_unsigned",$name_story_unsigned);
                $cmd->execute();
                return $cmd->fetch() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function getByID($id_story){
            try{
                $query = "SELECT * FROM story WHERE id_story = :id_story";
                $cmd = $this->Story->prepare($query);
                $cmd->bindValue(":id_story",$id_story);
                $cmd->execute();
                return $cmd->fetch() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function edit($image, $name_story, $author, $source, $status, $introduce,$id_story){
            try{
                $query = "UPDATE story SET image=:image, name_story=:name_story, name_story_unsigned=:name_story_unsigned, author=:author, source=:source, status=:status, introduce=:introduce  WHERE id_story=:id_story";
                $cmd = $this->Story->prepare($query);
                $cmd->bindValue(":image",$image);
                $cmd->bindValue(":name_story",$name_story);
                $cmd->bindValue(":name_story_unsigned", Slug($name_story));
                $cmd->bindValue(":author",$author);
                $cmd->bindValue(":source",$source);
                $cmd->bindValue(":status",$status);
                $cmd->bindValue(":introduce",$introduce);
                $cmd->bindValue(":id_story",$id_story);
                $cmd->execute();
                return $cmd->rowCount() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function updateChapter($id_story){
            try{
                $query = "UPDATE story SET chapter = chapter+1 WHERE id_story=:id_story";
                $cmd = $this->Story->prepare($query);
                $cmd->bindValue(":id_story",$id_story);
                $cmd->execute();
                return $cmd->rowCount() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function updateChapterDelete($id_story){
            try{
                $query = "UPDATE story SET chapter = chapter-1 WHERE id_story=:id_story";
                $cmd = $this->Story->prepare($query);
                $cmd->bindValue(":id_story",$id_story);
                $cmd->execute();
                return $cmd->rowCount() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function delete($id_story){
            try{
                $query = "DELETE FROM story WHERE id_story=:id_story";
                $cmd = $this->Story->prepare($query);
                $cmd->bindValue(":id_story",$id_story);
                $cmd->execute();
                return $cmd->rowCount() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        //trang chủ
        public function getStoryHot(){
            try{
                $query = "SELECT * FROM story ORDER BY evaluate DESC LIMIT 16";
                $cmd = $this->Story->prepare($query);
                $cmd->execute();
                return $cmd->fetchALL() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function getStoryNewUpdate(){
            try{
                $query = "SELECT * FROM story ORDER BY updated_at DESC LIMIT 30";
                $cmd = $this->Story->prepare($query);
                $cmd->execute();
                return $cmd->fetchALL() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function getStoryFinish(){
            try{
                $query = "SELECT * FROM story WHERE status = '3' ORDER BY updated_at DESC LIMIT 12";
                $cmd = $this->Story->prepare($query);
                $cmd->execute();
                return $cmd->fetchALL() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function storyAuthor($author){
            try{
                $query = "SELECT * FROM story WHERE author=:author";
                $cmd = $this->Story->prepare($query);
                $cmd->bindValue(":author",$author);
                $cmd->execute();
                return $cmd->fetchAll() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function getStoryByCategory($name_unsigned){
            try{
                $query = "SELECT tr.* FROM story tr, story_category tl WHERE tl.name_unsigned =:name_unsigned AND tl.id_story = tr.id_story";
                $cmd = $this->Story->prepare($query);
                $cmd->bindValue(":name_unsigned",$name_unsigned);
                $cmd->execute();
                return $cmd->fetchAll() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function storyFull(){
            try{
                $query = "SELECT * FROM story WHERE status = '3' ORDER BY updated_at";
                $cmd = $this->Story->prepare($query);
                $cmd->execute();
                return $cmd->fetchAll() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function storyMax100(){
            try{
                $query = "SELECT * FROM story WHERE chapter < '101' ORDER BY updated_at";
                $cmd = $this->Story->prepare($query);
                $cmd->execute();
                return $cmd->fetchAll() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function from100to500(){
            try{
                $query = "SELECT * FROM story WHERE chapter > '100' AND chapter < '500' ORDER BY updated_at";
                $cmd = $this->Story->prepare($query);
                $cmd->execute();
                return $cmd->fetchAll() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function from500to1000(){
            try{
                $query = "SELECT * FROM story WHERE chapter > '500' AND chapter < '1000' ORDER BY updated_at";
                $cmd = $this->Story->prepare($query);
                $cmd->execute();
                return $cmd->fetchAll() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
        public function storyMin1000(){
            try{
                $query = "SELECT * FROM story WHERE chapter > '1000' ORDER BY updated_at";
                $cmd = $this->Story->prepare($query);
                $cmd->execute();
                return $cmd->fetchAll() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }

        public function storySearch(){
            try{
                if(isset($_POST['search'])){
                    $search_query = $_POST['search'];
                }    
                $query = "SELECT * FROM story WHERE name_story LIKE :search_query";
                $cmd = $this->Story->prepare($query);
                $cmd->bindValue(':search_query', '%' . $search_query . '%');
                $cmd->execute();
                return $cmd->fetchAll() ;
            }catch(PDOException $e){
                return $e->getMessage();
            }
        }
    }
?>
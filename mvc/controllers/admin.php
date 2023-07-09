<?php
    class admin extends core{
        function dashboard(){
            $this->view('admin',[
                'title' => 'Trang quản lý',
                'page' =>'admin/dashboard'
            ]);
        }

        function register(){
            $this->view('register');
        }
        
        function add_customer(){
            if($this->model("account_model")->add($_POST['username'], $_POST['password']) == 1){

                $this->loginSession($this->model("account_model")->get($_POST['username']));
                return redirect(dashboard);
            }else{
                setcookie('message', 'Tên đăng nhập bị trùng!', time()+2, '/');
                header('Location: register');
            }
        }

        function login(){
            $this->view('login');
        }
        function logout(){
            $this->logoutSession();
            return redirect(login);
        }

        function login_customer(){
            $account = $this->model("account_model")->login($_POST['username'], $_POST['password']);

            if($account == true){
                $this->loginSession($this->model("account_model")->get($_POST['username']));
                return redirect(dashboard);
            }else{
                return redirect(login, 'Tên đăng nhập hoặc mật khẩu không đúng!');
            }
        }

        //danh mục
        function category(){
            $this->view('admin',[
                'title' => 'Thể loại truyện',
                'page' =>'admin/category',
                'category' => $this->model("category_model")->getAll()
            ]);
        }
        function add_category(){
            if($this->model("category_model")->add($_POST['name_category']) == 1){
				return redirect(category);
			}else{
				return redirect(category, 'Thể loại bị trùng!');
			}
        }

        function edit_category(){
            if($this->model("category_model")->edit($_POST['id_category'],$_POST['name_category']) == 1){
				return redirect(category);
			}else{
				return redirect(category, 'Thể loại bị trùng!');
			}
        }

        function detete_category($id_category){
            if($this->model("category_model")->detete($id_category)){
				return redirect(category);
			}else{
				return redirect(category, 'Lỗi không xác định!');
			}
        }

        //truyện
        function story(){
            $this->view('admin',[
                'title'   => 'Danh sách truyện',
                'page'    => 'admin/story',
                'story'   => $this->model("story_model")->getAll() 
            ]);
        }
        function add_story(){
            $this->view('admin',[
                'title' => 'Đăng truyện',
                'page' =>'admin/add_story',
                'category'=>$this->model("category_model")->getAll() 
            ]);
        }
        function handle_story(){
            if(isset($_FILES['image'])){
                $img_name = Slug($_POST['name_story']).'-'.Slug($_POST['author']).'.jpg';
                $img_tmp = $_FILES['image']['tmp_name'];
                $patch = "./storage/";

                if(move_uploaded_file($img_tmp, $patch . $img_name)){
                    $image = $img_name;
                }else{
                    $image = "default.jpg";
                }
            }else{
                $image = "default.jpg";
            }

            $story = $this->model("story_model")->add($image, $_POST['name_story'], $_POST['author'], $_POST['source'], $_POST['status'], $_POST['introduce']);
            
            if($story == 1){
                $id_story = $this->model("story_model")->getID(Slug($_POST['name_story']));
                foreach($_POST['category'] as $val){
                    $this->model("story_category_model")->add($id_story, $val,Slug($val));
                }
                return redirect(story);
			}else{
				return redirect(add_story, 'Truyện đã tồn tại!');
			}
        }
        function edit_story($name_story_unsigned){
            $story = $this->model("story_model")->get($name_story_unsigned);
            $this->view('admin',[
                'title' => 'Sửa truyện',
                'page' =>'admin/edit_story',
                'story'   => $story,
                'category'=>$this->model("category_model")->getAll(),  
                'story_category'=>$this->model("story_category_model")->get($story['id_story'])
            ]);
        }

        function handle_edit_story(){
            if(isset($_FILES['image'])){
                $img_name = Slug($_POST['name_story']).'-'.Slug($_POST['author']).'.jpg';
                $img_tmp = $_FILES['image']['tmp_name'];
                $patch = "./storage/";

                if(move_uploaded_file($img_tmp, $patch . $img_name)){
                    $image = $img_name;
                }else{
                    $image = $_POST['image'];
                }
            }else{
                $image = "default.jpg";
            }

            $story = $this->model("story_model")->edit($image, $_POST['name_story'], $_POST['author'], $_POST['source'], $_POST['status'], $_POST['introduce'], $_POST['id_story']);
            
            if($story >= 0){
                $id_story = $this->model("story_model")->getID(Slug($_POST['name_story']));
                $this->model("story_category_model")->detete($id_story);
                foreach($_POST['category'] as $val){
                    $this->model("story_category_model")->add($id_story, $val, Slug($val));
                }

                return redirect(story);
			}else{
				return redirect(add_story, 'Truyện đã tồn tại!');
			}
        }
        function delete_story($id_story){
            $this->model("story_category_model")->detete($id_story);
            $this->model("chapter_model")->deleteAll($id_story);
            $this->model("story_model")->delete($id_story);
			return redirect(story);
        }

        //chương
        function list_chapter($name_story_unsigned){
            $story1 = $this->model("story_model")->get($name_story_unsigned);
            $this->view('admin',[
                'title' => 'Danh sách chương truyện',
                'page' =>'admin/list_chapter',
                'story'   => $story1,
                'chapter'=>$this->model("chapter_model")->get($story1['id_story'])
            ]);
        }
        function add_chapter(){
            $this->model("chapter_model")->add($_POST['id_story'],$_POST['number_chapter'], $_POST['name'], $_POST['content']);
            $this->model("story_model")->updateChapter($_POST['id_story']);

            return redirect(list_chapter.'/'.$_POST['name_story_unsigned']);
        }
        function edit_chapter($name_story_unsigned,$id_chapter){
            $story = $this->model("story_model")->get($name_story_unsigned);
            $this->view('admin',[
                'title' => 'Sửa truyện',
                'page' =>'admin/edit_chapter',
                'story'   => $story,
                'chapter'   => $this->model("chapter_model")->getByID($id_chapter)
            ]);
        }

        function handle_edit_chapter(){
            $this->model("chapter_model")->edit($_POST['id_chapter'], $_POST['name'], $_POST['content']);
            //return redirect($_SERVER['HTTP_REFERER'], 'Cập nhật dữ liệu thành công!');
            return redirect(list_chapter.'/'.$_POST['name_story_unsigned']);
        }

        function handle_delete_chapter($id_story,$id_chapter){
            $this->model("story_model")->updateChapterDelete($id_story);
            $this->model("chapter_model")->delete($id_chapter);
            
            return header('Location: '.$_SERVER['HTTP_REFERER']);
        }
    }
?>
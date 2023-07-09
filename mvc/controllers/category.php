<?php
    class category extends core{
        function category($name_unsigned){
            $story = $this->model("story_model")->getStoryByCategory($name_unsigned);
            $category = $this->model("category_model")->getAll();
            $this->view('home',[
                'title' => 'Thể loại truyện',
                'page' =>'category',
                'story'  => $story,
                'category'  => $category
            ]);
        }
        function full_story(){
            $story = $this->model("story_model")->storyFull();
            $category = $this->model("category_model")->getAll();
            $this->view('home',[
                'title' => 'Truyện đã hoàn thành',
                'page' =>'full_story',
                'story'  => $story,
                'category'  => $category
            ]);
        }
        function storyMax100(){
            $story = $this->model("story_model")->storyMax100();
            $category = $this->model("category_model")->getAll();
            $this->view('home',[
                'title' => 'Truyện dưới 100 chương',
                'page' =>'max_100',
                'story'  => $story,
                'category'  => $category
            ]);
        }
        function from_100_to_500(){
            $story = $this->model("story_model")->from100to500();
            $category = $this->model("category_model")->getAll();
            $this->view('home',[
                'title' => 'Truyện từ 100 chương đến 500 chương',
                'page' =>'from_100_to_500',
                'story'  => $story,
                'category'  => $category
            ]);
        }
        function from_500_to_1000(){
            $story = $this->model("story_model")->from500to1000();
            $category = $this->model("category_model")->getAll();
            $this->view('home',[
                'title' => 'Truyện từ 500 chương đến 1000 chương',
                'page' =>'from_500_to_1000',
                'story'  => $story,
                'category'  => $category
            ]);
        }
        function storyMin1000(){
            $story = $this->model("story_model")->storyMin1000();
            $category = $this->model("category_model")->getAll();
            $this->view('home',[
                'title' => 'Truyện từ 1000 chương',
                'page' =>'min_1000',
                'story'  => $story,
                'category'  => $category
            ]);
        }
    }
?>
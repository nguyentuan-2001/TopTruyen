<?php
    class home extends core{
        function index(){
            $this->view('home',[
                'title' => 'Trang chủ',
                'page' =>'index',
                'storyHot'  => $this->model("story_model")->getStoryHot(),
                'storyNewUpdate'  => $this->model("story_model")->getStoryNewUpdate(),
                'storyFinish'  => $this->model("story_model")->getStoryFinish(),
                'category'  => $this->model("category_model")->getAll()
            ]);
        }
        function story($name_story_unsigned){
            $story = $this->model("story_model")->get($name_story_unsigned);
            $scheme = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
            $host = $_SERVER['HTTP_HOST'];
            $uri = $_SERVER['REQUEST_URI'];
            $full_url = $scheme . "://" . $host .$uri;
            $this->view('home',[
                'title' => 'Truyện '.$story['name_story'],
                'page' =>'story',
                'story' => $story,
                'storyAuthor'  => $this->model("story_model")->storyAuthor($story['author']),
                'chapter'  => $this->model("chapter_model")->get($story['id_story']),
                'category'  => $this->model("category_model")->getAll(),
                'chapterNew'  => $this->model("chapter_model")->getNew($story['id_story']),
                'current_url' => $full_url
            ]);
        }
        function read_story($name_story_unsigned, $number_chapter){
            $story = $this->model("story_model")->get($name_story_unsigned);
            $chapter = $this->model("chapter_model")->getHome($story['id_story'],$number_chapter);
            $this->view('home',[
                'title' => 'Truyện '.$story['name_story'],
                'page' =>'view_story',
                'story' => $story,
                'chapter'  => $chapter,
                'allChapter'  => $this->model("chapter_model")->get($story['id_story']),
                'storyHot'  => $this->model("story_model")->getStoryHot(),
                'category'  => $this->model("category_model")->getAll()
            ]);
        }
        function search(){
            $story = $this->model("story_model")->storySearch();
            $category = $this->model("category_model")->getAll();
            $this->view('home',[
                'title' => 'Tìm kiếm',
                'page' =>'search',
                'story'  => $story,
                'category'  => $category
            ]);
        }
    }
?>
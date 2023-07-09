<?php
    define('APP_URL', 'http://localhost/toptruyen/');
    //define('APP_URL', 'http://kenta.com/toptruyen/');
    //define('APP_URL', 'https://kenta.azdigi.blog/toptruyen');

    //đăng nhập || đăng kí || đăng xuất
    define('register', APP_URL.'/admin/register');
    define('add_customer', APP_URL.'/admin/add_customer');
    define('login', APP_URL.'/admin/login');
    define('login_customer', APP_URL.'/admin/login_customer');
    define('logout', APP_URL.'/admin/logout');

    //dashboard
    define('dashboard', APP_URL.'/admin/dashboard');

    //thể loại
    define('category', APP_URL.'/admin/category');
    define('add_category', APP_URL.'/admin/add_category');
    define('edit_category', APP_URL.'/admin/edit_category');
    define('detete_category', APP_URL.'/admin/detete_category');

    //truyện
    define('story', APP_URL.'/admin/story');
    define('add_story', APP_URL.'/admin/add_story');
    define('handle_story', APP_URL.'/admin/handle_story');
    define('edit_story', APP_URL.'/admin/edit_story');
    define('handle_edit_story', APP_URL.'/admin/handle_edit_story');
    define('delete_story', APP_URL.'/admin/delete_story');

    //chương
    define('list_chapter', APP_URL.'/admin/list_chapter');
    define('add_chapter', APP_URL.'/admin/add_chapter');
    define('edit_chapter', APP_URL.'/admin/edit_chapter');
    define('handle_edit_chapter', APP_URL.'/admin/handle_edit_chapter');
    define('handle_delete_chapter', APP_URL.'/admin/handle_delete_chapter');
?>
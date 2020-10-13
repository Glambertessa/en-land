<?php
use core\App;

App::$collector->filter('auth', function(){
    if(!isset($_SESSION['username'])) {
        header('Location: /sign-in');
        die();
    }
});

App::$collector->filter('some', function ($response, $param){
    //echo $param;
});

App::$collector->filter('next', function (){
    //echo 'next';
});

App::$collector->filter('main_group', function ($response, $param){
    //echo $param;
});
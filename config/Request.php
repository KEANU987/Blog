<?php

namespace App\config;

class Request{
    private $get;
    private $post;
    private $session;
    
    public function __construct(){
        $this->get = new Parameter($_GET);
        $this->post = new Parameter($_POST);
        $this->session = new Session($_SESSION);
    }

    /**
    * @return mixed
    */
    public function getGet(){
        return $this->get;
    }

    /**
     * @return mixed
     */
    public function getPost(){
        return $this->post;
    }

    /**
    * @return mixed
    */
    public function getSession(){
        return $this->session;
    }
}
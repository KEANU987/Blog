<?php
namespace App\src\controller;

use App\config\Request; //rajout
use App\src\constraint\Validation;
use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
use App\src\model\View;
use App\src\DAO\UserDAO;
use App\src\DAO\UserValidation;

abstract class Controller{
    protected $articleDAO;
    protected $commentDAO;
    protected $userDAO;
    protected $userValidation;
    protected $view;
    private $request; //rajout
    protected $get; //rajout
    protected $post; //rajout
    protected $session; //rajout
    protected $validation; // rajout

    
    public function __construct(){
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
        $this->userDAO = new UserDAO();
        $this->view = new View();
        $this->validation = new Validation();
        // rajouts ci dessous
        $this->request = new Request();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
    }
}



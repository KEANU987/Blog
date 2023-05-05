<?php

namespace App\src\controller;

use App\config\Parameter;

class BackController extends Controller
{
    public function admin()
    {
        $articles = $this->articleDAO->getArticles();
        $comments = $this->commentDAO->getFlagComments();
        $users = $this->userDAO->getUsers();
        return $this->view->render('admin', [
            'articles' => $articles,
            'comments' => $comments,
            'users' => $users
        ]);
    }
    public function addArticle(Parameter $post)
    {
        if ($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Article');
            if (!$errors) {
                $this->articleDAO->addArticle($post, $this->session->get('id'));
                $this->session->set('add_article', 'Le nouvel article a bien été ajouté');
                header('Location: ../public/index.php?route=admin');
            }
            return $this->view->render('add_article', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('add_article');
    }
    public function editArticle(Parameter $post, $articleId)
    {
        $article = $this->articleDAO->getArticle($articleId);
        if ($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Article');
            if (!$errors) {
                $this->articleDAO->editArticle($post, $articleId, $this->session->get('id'));
                $this->session->set('edit_article', 'L\' article a bien été modifié');
                header('Location: ../public/index.php?route=admin');
            }
            return $this->view->render('edit_article', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        $post->set('id', $article->getId());
        $post->set('title', $article->getTitle());
        $post->set('content', $article->getContent());
        $post->set('author', $article->getAuthor());
        return $this->view->render('edit_article', [
            'post' => $post
        ]);
    }
    public function deleteArticle($articleId)
    {
        $this->articleDAO->deleteArticle($articleId);
        $this->session->set('delete_article', 'L\' article a bien été supprimé');
        header('Location: ../public/index.php?route=admin');
    }
    public function unflagComment($commentId)
    {
        $this->commentDAO->unflagComment($commentId);
        $this->session->set('unflag_comment', 'Le commentaire a bien été désignalé');
        header('Location: ../public/index.php?route=admin');
    }
    public function deleteComment($commentId)
    {
        $this->commentDAO->deleteComment($commentId);
        $this->session->set('delete_comment', 'Le commentaire a bien été supprimé');
        header('Location: ../public/index.php?route=admin');
    }
    public function profile()
    {
        return $this->view->render('profile');
    }
    public function updatePassword(Parameter $post)
    {
        if ($post->get('submit')) {
            $this->userDAO->updatePassword($post, $this->session->get('pseudo'));
            $this->session->set('update_password', 'Le mot de passe a été mis à jour');
            header('Location: ../public/index.php?route=profile');
        }
        return $this->view->render('update_password');
    }
    public function logout()
    {
        $this->logoutOrDelete('logout');
    }
    public function deleteAccount()
    {
        $this->userDAO->deleteAccount($this->session->get('pseudo'));
        $this->logoutOrDelete('delete_account');
    }
    public function addUser(Parameter $post){
        $roles = $this->userDAO->getRoles();
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'User');
            if(!$errors) {
                $this->userDAO->addAccount($post);
                $this->session->set('addUser', 'L\'ajout de votre utilisateur a bien été effectué');
                header('Location: ../public/index.php?route=addUser');
            }
            return $this->view->render('addUser', [
                'post' => $post,
                'errors' => $errors,
                'roles' => $roles
            ]);
        }
        return $this->view->render('addUser');
    }
    public function deleteUser($userId)
    {
        $this->userDAO->deleteUser($userId);
        $this->session->set('delete_user', 'L\'utilisateur a bien été supprimé');
        header('Location: ../public/index.php?route=admin');
    }
    private function logoutOrDelete($param)
    {
        $this->session->stop();
        $this->session->start();
        if ($param === 'logout') {
            $this->session->set($param, 'À bientôt');
        } else {
            $this->session->set($param, 'Votre compte a bien été supprimé');
        }
        header('Location: ../public/index.php');
    }
}

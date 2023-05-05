<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\User;

class UserDAO extends DAO
{
   private function buildObject($row)
   {
      $user = new User();
      $user->setId($row['id']);
      $user->setPseudo($row['pseudo']);
      $user->setCreatedAt($row['createdAt']);
      $user->setRole($row['role']);
      return $user;
   }
   private function buildObjectRole($row)
   {
      $user = new User();
      $user->setRole($row['role']);
      return $user;
   }
   public function getUsers()
   {
      $sql = 'SELECT id, pseudo, createdAt, role FROM user ORDER BY id asc';
      $result = $this->createQuery($sql);
      $users = [];
      foreach ($result as $row) {
         $userId = $row['id'];
         $users[$userId] = $this->buildObject($row);
      }
      $result->closeCursor();
      return $users;
   }
   public function getRoles()
   {
      $sql = "SELECT DISTINCT role FROM user ORDER BY role asc";
      $result = $this->createQuery($sql);
      $roles = [];
      foreach ($result as $row) {
         $rolesId = $row['role'];
         $roles[$rolesId] = $this->buildObjectRole($row);
      }
      $result->closeCursor();
      return $roles;
   }
   public function addAccount(Parameter $post)
   {
      $sql = 'INSERT INTO user (pseudo, password, createdAt, role) VALUES (?, ?, NOW(), ?)';
      $this->createQuery($sql, [$post->get('pseudo'), password_hash($post->get('password'),PASSWORD_BCRYPT), $post->get('role')]);
   }
   public function register(Parameter $post)
   {
      $this->checkUser($post);
      $sql = 'INSERT INTO user (pseudo, password, createdAt, role) VALUES (?, ?, NOW(), "Redacteur")';
      $this->createQuery($sql, [$post->get('pseudo'), password_hash(
         $post->get('password'),
         PASSWORD_BCRYPT
      )]);
   }
   public function checkUser(Parameter $post)
   {
      $sql = 'SELECT COUNT(pseudo) FROM user WHERE pseudo = ?';
      $result = $this->createQuery($sql, [$post->get('pseudo')]);
      $isUnique = $result->fetchColumn();
      if ($isUnique) {
         return '<p>Le pseudo existe déjà</p>';
      }
   }
   public function login(Parameter $post)
   {
      $sql = 'SELECT id, password, createdAt, role FROM user WHERE pseudo = ?';
      $data = $this->createQuery($sql, [$post->get('pseudo')]);
      $result = $data->fetch();
      $isPasswordValid = password_verify($post->get('password'), $result['password']);
      return [
         'result' => $result,
         'isPasswordValid' => $isPasswordValid
      ];
   }
   public function updatePassword(Parameter $post, $pseudo)
   {
      $sql = 'UPDATE user SET password = ? WHERE pseudo = ?';
      $this->createQuery($sql, [
         password_hash($post->get('password'), PASSWORD_BCRYPT),
         $pseudo
      ]);
   }
   public function deleteAccount($pseudo)
   {
      $sql = 'DELETE FROM user WHERE pseudo = ?';
      $this->createQuery($sql, [$pseudo]);
   }

   public function deleteUser($userId)
   {
      $sql = 'DELETE FROM user WHERE id = ?';
      $this->createQuery($sql, [$userId]);
   }
}

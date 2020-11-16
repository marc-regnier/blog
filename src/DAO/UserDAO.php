<?php

namespace App\src\DAO;

use App\config\Parameter;

class UserDAO extends DAO
{
    public function register(Parameter $post)
    {
        $this->checkUser($post);

        $sql = 'INSERT INTO users (pseudo, email, password, roles, createdAt) VALUES (?, ?, ?, "user", NOW())';

        $this->createQuery($sql, [$post->get('pseudo'), $post->get('email'), password_hash($post->get('password'), PASSWORD_BCRYPT)]);
    }

    public function checkUser(Parameter $post)
    {
        $sql = 'SELECT COUNT(pseudo), COUNT(email) FROM users WHERE pseudo = ? OR email = ?';

        $result = $this->createQuery($sql, [$post->get('pseudo'), $post->get('email')]);

        $isUnique = $result->fetchColumn();

        if($isUnique) 
        {
            return '<p>Le pseudo ou l\'email existe déjà</p>';
        }
    }

    

}
<?php

namespace Blog\Model;
require_once('model/Manager.php');

class PostManager extends Manager {

    public function getPost(int $where) {
        $db = $this->dbConnect();
        $sql = "SELECT id, author, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS creation_date_fr FROM posts WHERE id=?";
        $statement = $db->prepare($sql);
        $statement->execute([$where]);
        $result = $statement->fetch();
        
        return $result;
    }

    public function getPosts() {
        $db = $this->dbConnect();
        $sql = "SELECT id, author, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5";
        $statement = $db->query($sql);
        
        return $statement;
    }
    
    public function addPost(string $author, string $title, string $content) {
        $db = $this->dbConnect();
        $sql = "INSERT INTO posts(author, title, content, creation_date) VALUES(?, ?, ?, NOW())";
        $statement = $db->prepare($sql)->execute([$author, $title, $content]);
        
        return $result;
    }

    public function updatePost(int $id, string $author, string $title, string $content) {
        $db = $this->dbConnect();
        $commentData = [
            'id' => $id,
            'author' => $author,
            'title' => $title,
            'content' => $content
        ];
        $sql = 'UPDATE posts SET author=:author, title=:title, content=:content WHERE id=:id';
        $updatePost = $db->prepare($sql)->execute($commentData);
        return $updatePost;
    }
    
    public function deletePost(int $id) {
        $db = $this->dbConnect();
        $stmt = "DELETE FROM posts WHERE id=$id";
        $deletePost = $db->prepare($stmt)->execute();
        return $deletePost;
    }
}
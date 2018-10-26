<?php

namespace Blog\Model;
require_once('model/Manager.php');

class CommentManager extends Manager {

    public function getComment(int $where) {
        $db = $this->dbConnect();
        $sql = "SELECT id, post_id, author, comment, comment_date, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS comment_date_fr FROM comments WHERE id=?";
        $statement = $db->prepare($sql);
        $statement->execute([$where]);
        $result = $statement->fetch();
        
        return $result;
    }

    public function getComments(int $where) {
        $db = $this->dbConnect();
        $sql = "SELECT id, post_id, author, comment, comment_date, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS comment_date_fr FROM comments WHERE post_id=? ORDER BY comment_date DESC LIMIT 0, 5";
        $statement = $db->prepare($sql);
        $statement->execute([$where]);
        // $statement = $db->query($sql);

        return $statement;
    }

    public function addComment(int $post_id, string $author, string $comment) {
        $db = $this->dbConnect();
        $sql = "INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())";
        $statement = $db->prepare($sql)->execute([$post_id, $author, $comment]);
        
        return $result;
    }

    public function updateComment(int $id, int $post_id, string $author, string $content) {
        $db = $this->dbConnect();
        $commentData = [
            'id' => $id,
            'post_id' => $post_id,
            'author' => $author,
            'content' => $content
        ];
        $sql = 'UPDATE comments SET author=:author, comment=:content WHERE id=:id AND post_id=:post_id';
        $updatePost = $db->prepare($sql)->execute($commentData);
        return $updatePost;
    }

    public function deleteComment(int $id) {
        $db = $this->dbConnect();
        $stmt = "DELETE FROM comments WHERE id=$id";
        $deleteComment = $db->prepare($stmt)->execute();
        return $deleteComment;
    }
    
    public function deleteComments(int $post_id) {
        $db = $this->dbConnect();
        $stmt = "DELETE FROM comments WHERE post_id=$post_id";
        $deleteComment = $db->prepare($stmt)->execute();
        return $deleteComment;
    }
}
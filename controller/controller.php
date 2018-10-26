<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts() {
    $postManager = new \Blog\Model\PostManager();
    $getPosts = $postManager->getPosts();
    require('view/listPosts.php');
}

function addPost(string $author, string $title, string $content) {
    $postManager = new \Blog\Model\PostManager();
    $postManager->addPost($author, $title, $content);
    header('Location: index.php');
}

function updatePost(int $id, string $author = null, string $title = null, string $content = null) {
    $postManager = new \Blog\Model\PostManager();
    if($author == null && $title == null && $content == null) {
        $post = $postManager->getPost($id);
        require('view/updatePost.php');
    }
    elseif(isset($author) && isset($title) && isset($content)) {
        $postManager->updatePost($id, $author, $title, $content);
        header('Location: index.php');
    }
}

function viewPost(int $id) {
    $postManager = new \Blog\Model\PostManager();
    $commentManager = new \Blog\Model\CommentManager();
    $post = $postManager->getPost($id);
    $comments = $commentManager->getComments($id);
    require('view/viewPost.php');
}

function addComment(int $post_id, string $author = null, string $comment = null) {
    $postManager = new \Blog\Model\PostManager();
    $post = $postManager->getPost($post_id);
    if($author == null && $comment == null) {
        require('view/addComment.php');
    }
    else {
        $commentManager = new \Blog\Model\CommentManager();
        $addComment = $commentManager->addComment($post_id, $author, $comment);
        header("Location: index.php?action=viewPost&id=$post->id");
    }
}

function updateComment(int $id, int $post_id, string $author = null, string $content = null) {
    $commentManager = new \Blog\Model\CommentManager();
    $comment = $commentManager->getComment($id);
    if($author == null && $content == null) {
        require('view/updateComment.php');
    }
    elseif(isset($author) && isset($content)) {
        $commentManager->updateComment($id, $post_id, $author, $content);
        header('Location: index.php?action=viewPost&id='.$comment->post_id);
    }
}

function deletePost(int $id) {
    $postManager = new \Blog\Model\PostManager();
    $commentManager = new \Blog\Model\CommentManager();
    $commentManager->deleteComments($id);
    $postManager->deletePost($id);
    header('Location: index.php');
}

function deleteComment(int $id) {
    $commentManager = new \Blog\Model\CommentManager();
    $commentManager->deleteComment($id);
    header("Location: index.php?action=viewPost&id=".$_GET['postId']);
}
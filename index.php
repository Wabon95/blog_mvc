<?php

require('controller/controller.php');

try {
    switch ($_GET['action']) {

        case 'addPost':
            if(isset($_POST) && !empty($_POST)) {
                addPost($_POST['inputAuthor'], $_POST['inputTitle'], $_POST['textareaContent']);
            }
            else {
                require('view/addPost.php');
            }
        break;

        case 'viewPost':
            viewPost($_GET['id']); 
        break;

        case 'updatePost':
            if(isset($_GET['id'])) {
                if(!$_POST) {
                    updatePost($_GET['id']);
                }
                else if($_POST) {
                    updatePost($_GET['id'], $_POST['inputAuthor'], $_POST['inputTitle'], $_POST['textareaContent']);
                }
            }
            else {
                throw new Exception('Aucun identifiant envoyé.');
            }
        break;

        case 'addComment':
            if(isset($_GET['id'])) {
                if(!$_POST) {
                    addComment($_GET['id']);
                }
                else if($_POST) {
                    addComment($_GET['id'], $_POST['inputAuthor'], $_POST['textareaContent']);
                }
            }
            else {
                throw new Exception('Aucun identifiant envoyé.');
            }
        break;

        case 'updateComment':
            if(isset($_GET['id']) && isset($_GET['postId'])) {
                if(!$_POST) {
                    updateComment($_GET['id'], $_GET['postId']);
                }
                else if($_POST) {
                    updateComment($_GET['id'], $_GET['postId'], $_POST['inputAuthor'], $_POST['textareaContent']);
                }
            }
            else {
                throw new Exception('Aucun identifiant envoyé.');
            }
        break;

        case 'deletePost':
            if(isset($_GET['id'])) {
                deletePost($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant envoyé.');
            }
        break;

        case 'deleteComment':
            if(isset($_GET['id'])) {
                deleteComment($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant envoyé.');
            }
        break;
        
        default:
            listPosts();
        break;
    }
}
catch(Exception $e) {
    echo 'Erreur : '. $e->getMessage();
}
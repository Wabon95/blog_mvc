<?php
    $title = 'Ajouter un post';
    ob_start();
?>
<a href="index.php" class="btn btn-primary" style="margin: 20px 0;">Retour à la liste des posts</a>
<h1>Ajouter un post</h1>
<form action="index.php?action=addPost" method="post">

    <div class="form-group">
        <label for="inputAuthor">Auteur</label>
        <input type="text" class="form-control" id="inputAuthor" name="inputAuthor">
    </div>

    <div class="form-group">
        <label for="inputTitle">Titre</label>
        <input type="text" class="form-control" id="inputTitle" name="inputTitle">
    </div>

    <div class="form-group">
        <label for="textareaContent">Contenu</label>
        <textarea class="form-control" id="textareaContent" name="textareaContent" rows="4"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

<?php
    $content = ob_get_clean();
    require('template.php');
?>
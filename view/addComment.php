<?php
    $title = 'Ajouter un commentaire';
    ob_start();
?>
<a href="index.php?action=viewPost&id=<?= htmlspecialchars($post->id) ?>" class="btn btn-primary" style="margin: 20px 0;">Retour à la vue du post</a>
<h1>Ajouter un commentaire</h1>
<form action="index.php?action=addComment&id=<?= htmlspecialchars($post->id) ?>" method="post">

    <div class="form-group">
        <label for="inputAuthor">Auteur</label>
        <input type="text" class="form-control" id="inputAuthor" name="inputAuthor">
    </div>

    <div class="form-group">
        <label for="textareaContent">Contenu</label>
        <textarea class="form-control" id="textareaContent" name="textareaContent" rows="2"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

<?php
    $content = ob_get_clean();
    require('template.php');
?>
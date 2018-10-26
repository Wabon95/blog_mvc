<?php
    $title = 'Modifier un commentaire';
    ob_start();
?>
<a href="index.php?action=viewPost&id=<?= htmlspecialchars($comment->post_id) ?>" class="btn btn-primary" style="margin: 20px 0;">Retour à la vue du post</a>
<h1>Modifier un commentaire</h1>
<form action="index.php?action=updateComment&id=<?= htmlspecialchars($comment->id) ?>&postId=<?= htmlspecialchars($comment->post_id) ?>" method="post">

    <div class="form-group">
        <label for="inputAuthor">Auteur</label>
        <input type="text" class="form-control" id="inputAuthor" name="inputAuthor" value="<?= htmlspecialchars($comment->author) ?>">
    </div>

    <div class="form-group">
        <label for="textareaContent">Contenu</label>
        <textarea class="form-control" id="textareaContent" name="textareaContent" rows="2"><?= htmlspecialchars($comment->comment) ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

<?php
    $content = ob_get_clean();
    require('template.php');
?>
<?php
    $title = 'Modifier un post';
    ob_start();
?>
<h1>Modifier un post</h1>
<form action="index.php?action=updatePost&id=<?= htmlspecialchars($post->id) ?>" method="post">

    <div class="form-group">
        <label for="inputAuthor">Auteur</label>
        <input type="text" class="form-control" id="inputAuthor" name="inputAuthor" value="<?= htmlspecialchars($post->author) ?>">
    </div>

    <div class="form-group">
        <label for="inputTitle">Titre</label>
        <input type="text" class="form-control" id="inputTitle" name="inputTitle" value="<?= htmlspecialchars($post->title) ?>">
    </div>

    <div class="form-group">
        <label for="textareaContent">Contenu</label>
        <textarea class="form-control" id="textareaContent" name="textareaContent" rows="4"><?= htmlspecialchars($post->content) ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

<?php
    $content = ob_get_clean();
    require('template.php');
?>
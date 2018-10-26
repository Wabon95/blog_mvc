<?php
    $title = 'Mon blog';
    ob_start();

    echo "<h1>Derniers posts du blog</h1>";

    while($post = $getPosts->fetch()) { ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($post->title) ?></h5>
                <p class="card-text"><?= htmlspecialchars($post->content) ?></p>
            </div>
            <div class="card-footer">
                <div class="row justify-content-between">
                    <div class="col-6">
                        <small class="text-muted">Écrit par <?= htmlspecialchars($post->author) ?> le <?= htmlspecialchars($post->creation_date_fr) ?></small>
                    </div>
                    <div class="col-6 text-right">
                        <a href="index.php?action=viewPost&id=<?= htmlspecialchars($post->id) ?>" class="btn btn-sm btn-primary">Voir le post</a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">Supprimer</button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer un post</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Etes-vous sûr de vouloir supprimer ce post ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Annuler</button>
                                        <a href="index.php?action=deletePost&id=<?= htmlspecialchars($post->id) ?>" class="btn btn-sm btn-danger">Supprimer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

        <a href="index.php?action=addPost"><button type="button" class="btn btn-primary">Rédiger un post</button></a>

    <?php

    $content = ob_get_clean();
    require('template.php');
?>
<?php
    $title = 'Post';
    ob_start();
    ?>
    <a href="index.php" class="btn btn-primary" style="margin: 20px 0;">Retour à la liste des posts</a>
    <h1>Détails du post</h1>
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
                        <a href="index.php?action=updatePost&id=<?= htmlspecialchars($post->id) ?>" class="btn btn-sm btn-primary">Editer</a>
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
    <?php if($comments->rowcount() > 0) {
        echo "<h4>Commentaires</h4>";
    }
    else {
        echo "<h4>Ce post ne possède pas encore de commentaires.</h4><br/>";
    }

        while($comment = $comments->fetch()) { ?>
            <div class="card">
                <div class="card-body">
                    <p class="card-text"><?= htmlspecialchars($comment->comment) ?></p>
                </div>
                <div class="card-footer">
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <small class="text-muted">Écrit par <?= htmlspecialchars($comment->author) ?> le <?= htmlspecialchars($comment->comment_date_fr) ?></small>
                        </div>
                        <div class="col-6 text-right">
                            <a href="index.php?action=updateComment&id=<?= htmlspecialchars($comment->id) ?>&postId=<?= htmlspecialchars($comment->post_id) ?>" class="btn btn-sm btn-primary">Editer</a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal2">Supprimer</button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Supprimer un commentaire</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Etes-vous sûr de vouloir supprimer ce commentaire ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Annuler</button>
                                            <a href="index.php?action=deleteComment&id=<?= htmlspecialchars($comment->id) ?>&postId=<?= htmlspecialchars($comment->post_id) ?>" class="btn btn-sm btn-danger">Supprimer</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
        echo '<a href="index.php?action=addComment&id='.$post->id.'"><button type="button" class="btn btn-sm btn-primary" style="margin: 10px 0;">Ajouter un commentaire</button></a>';

    $content = ob_get_clean();
    require('template.php');
?>
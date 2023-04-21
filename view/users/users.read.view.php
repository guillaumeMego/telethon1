<?php

$title = "Afficher utilisateurs";

$num_id = 0;
ob_start(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3 style="font-family: PT Serif; font-weight: bold; font-style: italic; font-size: 22px;">
                Gestion des utilisateur</h3>
                <div class="d-grid gap-2 col-2 ">
            <a href="index.php?controller=users&action=create" class="btn px-5 btn-sm btn-info my-3 text-white">Ajouter</a>
                </div>

            <table class="table table-striped">
                <thead class="text-center">
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Admin</th>
                    <th>Actions</th>
                    <!-- <th>Modal</th> -->
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr class="text-center">


                            <td><?= htmlspecialchars($user['first_name']) ?></td>
                            <td><?= htmlspecialchars($user['name']) ?></td>
                            <td><?= htmlspecialchars($user['is_admin']) ?></td>
                            <td>
                                <a href="index.php?controller=users&action=update&id=<?= $user['id_user'] ?>" class="me-2"><i class="bi bi-pencil text-info"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="index.php?controller=users&action=delete&id=<?= $user['id_user'] ?>"><i class="bi bi-trash text-info"></i></a>
                            </td>
                            <!-- <td>
                                <a data-bs-toggle="modal" data-id="<?= $user['id_user'] ?>" data-bs-target="#exampleModal" href="index.php?controller=users&action=read&id=<?= $user['id_user'] ?>"><i class="bi bi-trash text-info"></i></a>
                                 --><?php /* $num_id = $user['id_user'] */ ?>
                                <?php /* echo $num_id  */?>
                                <!-- <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Ouvrir modal <?php /* $num_id = $_GET['id'] */ ?>
                                </button> -->
                           <!--  </td> -->

                        </tr>
                    <?php endforeach ?>
                    <?php /* echo'id' . $num_id */ ?>
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Voulez-vous supprimer l'id utilisateur:  <?= $num_id ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                            <!-- <button type="button" class="btn btn-primary">Oui</button> -->
                            <a href="index.php?controller=users&action=delete&id=<?= $num_id ?>">Oui</a>
                        </div>
                    </div>
                </div>
            </div>


            <?php
            $content = ob_get_clean();
            require ROOT . '/view/template/template.view.php';

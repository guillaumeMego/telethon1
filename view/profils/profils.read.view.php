<?php

$title = "Afficher un profil";

ob_start(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3
                style="font-family: PT Serif; font-weight: bold; font-style: italic; font-size: 22px; margin-left: 28px;margin-bottom: 109px;">
                Gestion des profils</h3>
                <div class="d-grid gap-2 col-2 mx-auto">
                        <a href="index.php?controller=profils&action=updtade" class="btn btn-info">Modifier</a>>
            </div>
            <table class="table table-striped">
                <tbody>
                    <thead>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>mail</th>
                    </thead>
                    <tr class="text-center">
                        <?php foreach ($users as $user): ?>
                            <td>
                                <?= htmlspecialchars($user['name']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($user['first_name']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($user['is_admin']) ?>
                            </td>
                            <td>
                                <a href="index.php?controller=profils&action=update&id<?= $user['id_user'] ?>"
                                    class="mx-5"><i class="bi bi-pencil text-info"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean();
require ROOT . '/view/template/template.view.php';
<?php

$title = "Afficher un partenaire";

ob_start(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3 style="font-family: PT Serif; font-weight: bold; font-style: italic; font-size: 22px;">Gestion des partenaires</h3>
                <div class="d-grid gap-2 col-2 ">
                    <a href="index.php?controller=partners&action=create" class="btn btn-info my-3 text-white">Ajouter</a>
                </div>
            <table class="table table-striped">
                <tbody>
                    <thead>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>mail</th>
                        <th>Téléphonne</th>
                        <th>Raison sociale</th>
                        <th>Logo</th>
                        <th>Catégorie</th>
                        <th>Actions</th>
                    </thead>
                        <?php foreach ($partners as $partner): ?>
                            <tr class="text-center">
                            <td>
                                <?= htmlspecialchars($partner['responsible_name']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($partner['responsible_first_name']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($partner['mail']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($partner['phone']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($partner['social_reason']) ?>
                            </td>
                            <td>
                                <?= $partner['logo'] ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($partner['partnership_user']) ?>
                            </td>
                            <td>
                                <a href="index.php?controller=partners&action=update&id=<?= $partner['id_partner'] ?>"><i class="bi bi-pencil text-info"></i></a>
                                <a href="index.php?controller=partners&action=delete&id=<?= $partner['id_partner'] ?>"><i class="bi bi-trash text-info"></i></a>
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
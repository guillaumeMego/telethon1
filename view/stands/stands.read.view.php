<?php

$title = "Afficher un stand";

ob_start(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3
                style="font-family: PT Serif; font-weight: bold; font-style: italic; font-size: 22px;">
                Gestion des stands</h3>

                        <a href="index.php?controller=stands&action=create" class="btn btn-info my-3 text-white">Ajouter</a>

            <table class="table table-striped">
                
                <tbody>
                <thead class="text-center">
                        <th>Nom</th>
                        <th>Lieu</th>
                        <th>Date</th>
                    </thead>
                   
                        <?php foreach ($stands as $stand): ?>
                            <tr class="text-center">
                            <td>
                                <?= htmlspecialchars($stand['name']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($stand['place']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($stand['update_at']) ?>
                            </td>
                            <td>
                                <a href="index.php?controller=stands&action=update&id=<?= $stand['id_stand'] ?>"class="me-2"><i class="bi bi-pencil text-info"></i></a>
                                <a href="index.php?controller=stands&action=delete&id=<?= $stand['id_stand'] ?>"class="bi bi-trash text-info"></i></a>
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
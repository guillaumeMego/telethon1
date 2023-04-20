<?php

$title = "Afficher une collecte";

ob_start(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3
                style="font-family: PT Serif; font-weight: bold; font-style: italic; font-size: 22px;">
                Collectes</h3>

                <div class="d-grid gap-2 col-2 ">
                        <a href="index.php?controller=collects&action=create" class="btn btn-info my-3 text-white">Ajouter</a>
            </div>

            <table class="table table-striped">
                <tbody>
                    <thead class="text-center">
                        <th>Argent collecté</th>
                        <th>Date</th>
                        <th>Stand</th>
                        <th>Actions</th>
                    </thead>
                        <?php foreach ($collects as $collect): ?>
                            <tr class="text-center">
                            <td>
                                <?= htmlspecialchars($collect['collect_money']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($collect['date_collect']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($collect['name']) ?>
                            </td>
                            <td>
                                <a href="index.php?controller=collects&action=update&id=<?= $collect['id_collect'] ?>"><i class="bi bi-pencil text-info"></i></a>
                                <a href="index.php?controller=collects&action=delete&id=<?= $collect['id_collect'] ?>"><i class="bi bi-trash text-info"></i></a>
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
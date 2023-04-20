<?php

$title = "Modifier une collecte";

ob_start(); ?>

<div class="container h-100">
    <div class="row col-md-10 h-100 mx-auto ">
        <p class="col-md-10 fst-italic fw-bold mb-5 pb-5">Modifier une collecte</p>

        
        <form action="index.php?controller=collects&action=update&id=<?= $_GET['id'] ?>" method="post">
           
        <div class="lb_inp 1">
                    <label for="collect_money"> Somme ajouté </label><br>
                    <input type="number" name="collect_money" id="collect_money" class="rounded w-100"value="<?=$collect['collect_money'] ?>">
                </div><br>
                <div class="lb_inp 1">
                    <label for="date_collect"> date </label><br>
                    <?php $date_formattee = date('Y-m-d', strtotime($collect['date_collect'])); ?>
                    <input type="date" name="date_collect" id="date_collect" class="rounded w-100"value="<?=$date_formattee ?>">
                </div><br>
                <label for="id_stand">Stand</label><br>
                <select name="id_stand" id="id_stand">
                <?php foreach ($stands as $stand): ?>
                    <?php $selected = ($stand['id_stand'] == $standId['id_stand']) ? 'selected' : ''; ?>
                    <option value="<?= $stand['id_stand']?>" <?= $selected ?> ><?= $stand['name'] ?></option><br>
                <?php endforeach ?>
            </select>
            <label for="id_partner">Partenaires</label><br>
                <select name="id_partner" id="id_partner">
                <?php foreach ($partners as $partner): ?>
                    <?php $selectedOne = ($partner['id_partner'] == $partnerId['id_partner']) ? 'selected' : ''; ?>
                    <option value="<?= $partner['id_partner']?>" <?= $selectedOne ?> ><?= $partner['responsible_name'] ?></option>
                <?php endforeach ?>
            </select>

                <div class="d-grid gap-2 col-5 mx-auto">
        <input class="btn btn-info" type="submit" value="Modifier">
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require ROOT . '/view/template/template.view.php';
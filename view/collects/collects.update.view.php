<?php

$title = "Modifier une collecte";

ob_start(); ?>

<div class="container h-100">
    <div class="row col-md-10 h-100 mx-auto ">
    <h3 style="font-family: PT Serif; font-weight: bold; font-style: italic; font-size: 22px;">
    Modifier une collecte</h3>


        <form action="index.php?controller=collects&action=update&id=<?= $_GET['id'] ?>" method="post" class="form-control border-0 m-0">

            <div class="lb_inp 1">
                <label for="collect_money" class="form-label"> Somme ajouté </label><br>
                <input type="decimal" name="collect_money" id="collect_money" class="form-control" value="<?= $collect['collect_money'] ?>">
            </div><br>
            <div class="lb_inp 1">
                <label for="date_collect" class="form-label"> date </label><br>
                <?php $date_formattee = date('Y-m-d', strtotime($collect['date_collect'])); ?>
                <input type="date" name="date_collect" id="date_collect" class="form-control" value="<?= $date_formattee ?>">
            </div><br>
            <label for="id_stand" class="form-label">Stand</label><br>
            <select name="id_stand" id="id_stand" class="form-select">
                <?php foreach ($stands as $stand) : ?>
                    <?php $selected = ($stand['id_stand'] == $standId['id_stand']) ? 'selected' : ''; ?>
                    <option value="<?= $stand['id_stand'] ?>" <?= $selected ?>><?= $stand['name'] ?></option><br>
                <?php endforeach ?>
            </select><br>
            <label for="id_partner" class="form-label">Partenaires</label><br>
            <select name="id_partner" id="id_partner" class="form-select">
                <?php foreach ($partners as $partner) : ?>
                    <?php $selectedOne = ($partner['id_partner'] == $partnerId['id_partner']) ? 'selected' : ''; ?>
                    <option value="<?= $partner['id_partner'] ?>" <?= $selectedOne ?>><?= $partner['responsible_name'] ?></option>
                <?php endforeach ?>
            </select><br>

            <div class="d-grid gap-2 col-5 mx-auto">
                <input class="btn btn-sm btn-info text-white my-4" type="submit" value="Modifier">
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require ROOT . '/view/template/template.view.php';

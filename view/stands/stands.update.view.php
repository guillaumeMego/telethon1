<?php

$title = "Modifier un stand";

ob_start(); ?>

<div class="container h-100">
    <div class="row col-md-10 h-100 mx-auto ">
    <h3 style="font-family: PT Serif; font-weight: bold; font-style: italic; font-size: 22px;">
    Modifier un stand</h3>

        
        <form action="index.php?controller=stands&action=update&id=<?= $_GET['id'] ?>" method="post" class="form-control border-0">
           
                <div class="lb_inp 1">
                    <label for="name" class="form-label"> Nom </label><br>
                    <input type="text" name="name" id="name" class="form-control" value="<?=htmlspecialchars($stands['name'] )?>">
                </div><br>
                <div class="lb_inp 2">
                    <label for="place" class="form-label"> Lieu </label><br>
                    <input type="text" name="place" id="first_name" class="form-control" value="<?=htmlspecialchars($stands['place']) ?>">
                </div><br>
                <div class="lb_inp 3">
                    <label for="various" class="form-label"> Divers </label><br>
                    <input type="text" name="various" id="various" class="form-control" value="<?=htmlspecialchars($stands['various']) ?>">
                </div><br>

                <div class="d-grid gap-2 col-5 mx-auto">
                <input class="btn btn-sm btn-info text-white my-4" type="submit" value="Modifier">
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require ROOT . '/view/template/template.view.php';
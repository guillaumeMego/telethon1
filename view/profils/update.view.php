<?php

$title = "Modifier un profil";

ob_start(); ?>

<section>
    <h3>Modifier un profil</h3>
</section>

<?php
$content = ob_get_clean();
require __DIR__ . '/view/template/template.view.php';
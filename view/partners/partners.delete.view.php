<?php

$title = "Supprimer un partenaire";

ob_start(); ?>

<section>
    <h3>Supprimer un partenaire</h3>
</section>

<?php
$content = ob_get_clean();
require __DIR__ . '/view/template/template.view.php';
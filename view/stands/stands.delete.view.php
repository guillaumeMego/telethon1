<?php

$title = "Supprimer un stand";

ob_start(); ?>

<section>
    <h3>Supprimer un stand</h3>
</section>

<?php
$content = ob_get_clean();
require __DIR__ . '/view/template/template.view.php';
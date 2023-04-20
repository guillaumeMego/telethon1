<?php 
$title = 'Page introuvable';
ob_start();
?>
<div class="404 text-center">
    

<img src="../../public/asset/img/logo-flunchy-fixed.png" alt="300">
<br>
<p>Cette page n'existe pas</p>

</div>

<?php
$content = ob_get_clean();
require ROOT . '/view/template/template.view.php';
?>

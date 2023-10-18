<?php
$titre = "Demande de ".$demandeur['username'];
ob_start();
?>
<form method="POST">
    <button type="button" name="annuler">annuler</button>
    <button type="submit" name="accepter">Accepter</button>
</form>
<?php
$content = ob_get_clean();
require "layout.php";
?>
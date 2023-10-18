<?php
$titre = "Demande";
?>
<?php ob_start(); ?>
<div class="card">
</div>
<?php if ($GLOBALS['isConnected']) { ?>
    <form method="POST">
        <p><?php echo $friend['username'] ?></p>
        <input type="submit" value="demander" name="submitDemand">
    </form>
<?php } ?>
<?php
$content = ob_get_clean();
require "layout.php";
?>
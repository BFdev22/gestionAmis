<?php
$titre = "Register";
ob_start();
?>
<form method="POST">
    <input type="text" name="username" placeholder="username">
    <input type="password" name="password" placeholder="password">
    <input type="submit" value="Register">
</form>
<?php
$content = ob_get_clean();
require "layout.php";
?>
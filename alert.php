<?php
if (isset($_SESSION["errorMessage"])) {
?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION["errorMessage"]; ?>
    </div>
<?php
    unset($_SESSION["errorMessage"]);
}
?>
<?php
if (isset($_SESSION["successMessage"])) {
?>
    <div class="alert alert-success" role="alert">
        <?= $_SESSION["successMessage"]; ?>
    </div>
<?php
    unset($_SESSION["successMessage"]);
}
?>
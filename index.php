<?php
session_start();
if (!isset($_SESSION['user_id']))
{
    $msg = "Je moet eerst inloggen!";
    
}
?>
<!doctype html>
<html lang="nl">

<head>
    <title>Home Pagina</title>
    <?php require_once 'head.php'; ?>
</head>


<?php require_once 'header.php'; ?>

<body>
    <div class="container">
        <h1>Taak Verdeling Pagina Developer Land</h1>
        <img src="img/logo-big-fill-only.png" alt="Logo van Developerland">
    </div>
</body>

</html>

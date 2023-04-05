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

<header>
<div class="container">
    <div class="container1">
        <a href="tasks/index.php">Taken Lijst</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="<?php echo $base_url; ?>/login/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Uitloggen</a>
        <?php else: ?>
            <a href="<?php echo $base_url; ?>/login/login.php"><i class="fa-solid fa-right-to-bracket"></i> Inloggen</a>
        <?php endif; ?>
    </div>
</div>
</header>

<body>
    <div class="container">
        <h1>Taak Verdeling Pagina Developer Land</h1>
    </div>
</body>

</html>

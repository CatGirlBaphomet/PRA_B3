<?php require_once 'backend/config.php'; ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo $base_url; ?>/css/normalize.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>/css/main.css">
<script src="https://kit.fontawesome.com/90971cfe75.js" crossorigin="anonymous"></script>

<div class="container">
    <div class="container1">
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="<?php echo $base_url; ?>/login/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Uitloggen</a>
        <?php else: ?>
            <a href="<?php echo $base_url; ?>/login/login.php"><i class="fa-solid fa-right-to-bracket"></i> Inloggen</a>
        <?php endif; ?>
    </div>
</div>
<link
    rel="stylesheet"
    href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css"
>


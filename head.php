<?php require_once 'backend/config.php'; ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo $base_url; ?>/css/normalize.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>/css/main.css">
<script src="https://kit.fontawesome.com/90971cfe75.js" crossorigin="anonymous"></script>
<div class="container">
    <div class="container1">
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="<?php echo $base_url; ?>/login/logout.php">Uitloggen</a>
        <?php else: ?>
            <a href="<?php echo $base_url; ?>/login/login.php">Inloggen</a>
        <?php endif; ?>
    </div>
</div>
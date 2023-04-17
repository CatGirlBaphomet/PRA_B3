<?php require_once 'backend/config.php'; ?>

<header>
    <div class="container1">
        <img src="<?php echo $base_url; ?>/img/logo-big-v4.png" alt="Logo van DeveloperLand">
        <a href="<?php echo $base_url; ?>/index.php"><i class="fa-solid fa-house"></i> Home pagina</a>
        <a href="<?php echo $base_url; ?>/tasks/index.php"><i class="fa-solid fa-list-check"></i> Taken Lijst</a>
        <a href="<?php echo $base_url; ?>/tasks/usertask.php"><i class="fa-solid fa-person"></i> Jouw Taken</a>
        <a href="<?php echo $base_url; ?>/tasks/done.php"><i class="fa-solid fa-check"></i> Voltooide Taken</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="<?php echo $base_url; ?>/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Uitloggen</a>
        <?php else: ?>
            <a href="<?php echo $base_url; ?>/login.php"><i class="fa-solid fa-right-to-bracket"></i> Inloggen</a>
        <?php endif; ?>
    </div>
</header>
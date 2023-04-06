<header>
    <div class="container1">
        <img src="img/logo-big-v4.png" alt="Logo van DeveloperLand">
        <a href="index.php"><i class="fa-solid fa-house"></i> Home pagina</a>
        <a href="tasks/index.php"><i class="fa-solid fa-list-check"></i> Taken Lijst</a>
        <a href="tasks/done.php"><i class="fa-solid fa-check"></i> Voltooide Taken</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="<?php echo $base_url; ?>/login/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Uitloggen</a>
        <?php else: ?>
            <a href="<?php echo $base_url; ?>/login/login.php"><i class="fa-solid fa-right-to-bracket"></i> Inloggen</a>
        <?php endif; ?>
    </div>
</header>

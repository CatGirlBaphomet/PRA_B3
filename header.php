<header>
    <div class="container1">
        <a href="../index.php"><i class="fa-solid fa-house"></i> Home pagina</a>
        <a href="../tasks/index.php"><i class="fa-solid fa-list-check"></i> Taken Lijst</a>
        <a href="done.php"><i class="fa-solid fa-check"></i> Klaar Pagina</a>
        <a href="create.php"><i class="fa-solid fa-circle-plus"></i> Nieuwe Taak</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="<?php echo $base_url; ?>/login/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Uitloggen</a>
        <?php else: ?>
            <a href="<?php echo $base_url; ?>/login/login.php"><i class="fa-solid fa-right-to-bracket"></i> Inloggen</a>
        <?php endif; ?>
    </div>
</header>

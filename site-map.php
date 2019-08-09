<?php
    include "start-up.php";
    include "header.php";

    $pageTitle = "Site Haritası";
?>

<main>
    <div class="local-nav">
        <div class="local-nav-content container">
            <h2>Site Haritası</h2>
        </div>
    </div>
    <div class="container content">
        <div class="three-column content">
            <a href="about.php" class="link">Hakkında</a>
            <a href="help-center.php" class="link">Yardım Merkezi</a>
            <a href="likes.php" class="link">Beğendiklerin</a>
        </div>
        <hr>
        <h3><a href="category.php?category=movies" class="link">Filmler</a></h3>
        <div class="three-column content">
            <?php
                $countdowns = $db->prepare("SELECT * FROM countdowns WHERE category='Filmler' ORDER BY date");
                $countdowns->execute();
                $countdowns = $countdowns->fetchAll();

                foreach ($countdowns as $countdown) {
            ?>
            <a href="countdown.php?id=<?=$countdown["ID"]?>" class="link"><?=$countdown["name"]?></a>
            <?php } ?>
        </div>
        <hr>
        <h3><a href="category.php?category=movies" class="link">Oyunlar</a></h3>
        <div class="three-column content">
            <?php
                $countdowns = $db->prepare("SELECT * FROM countdowns WHERE category='Oyunlar' ORDER BY date");
                $countdowns->execute();
                $countdowns = $countdowns->fetchAll();

                foreach ($countdowns as $countdown) {
            ?>
            <a href="countdown.php?id=<?=$countdown["ID"]?>" class="link"><?=$countdown["name"]?></a>
            <?php } ?>
        </div>
        <hr>
        <h3><a href="category.php?category=exams" class="link">Sınavlar</a></h3>
        <div class="three-column content">
            <?php
                $countdowns = $db->prepare("SELECT * FROM countdowns WHERE category='Sınavlar' ORDER BY date");
                $countdowns->execute();
                $countdowns = $countdowns->fetchAll();

                foreach ($countdowns as $countdown) {
            ?>
            <a href="countdown.php?id=<?=$countdown["ID"]?>" class="link"><?=$countdown["name"]?></a>
            <?php } ?>
        </div>
        <hr>
        <h3><a href="category.php?category=holidays" class="link">Tatiller/Bayramlar</a></h3>
        <div class="three-column content">
            <?php
                $countdowns = $db->prepare("SELECT * FROM countdowns WHERE category='Tatiller/Bayramlar' ORDER BY date");
                $countdowns->execute();
                $countdowns = $countdowns->fetchAll();

                foreach ($countdowns as $countdown) {
            ?>
            <a href="countdown.php?id=<?=$countdown["ID"]?>" class="link"><?=$countdown["name"]?></a>
            <?php } ?>
        </div>
        <hr>
        <h3><a href="category.php?category=misc" class="link">Diğer</a></h3>
        <div class="three-column content">
            <?php
                $countdowns = $db->prepare("SELECT * FROM countdowns WHERE category='Diğer' ORDER BY date");
                $countdowns->execute();
                $countdowns = $countdowns->fetchAll();

                foreach ($countdowns as $countdown) {
            ?>
            <a href="countdown.php?id=<?=$countdown["ID"]?>" class="link"><?=$countdown["name"]?></a>
            <?php } ?>
        </div>
        <hr>
        <div class="three-column content">
            <a href="legal.php?page=privacy-policy" class="link">Gizlilik Politikası</a>
            <a href="legal.php?page=terms-of-use" class="link">Kullanım Şartları</a>
        </div>
    </div>
</main>

<?php
    include "footer.php";
    
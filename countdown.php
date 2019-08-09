<?php
    include "start-up.php";
    include "header.php";

    $id = $_GET["id"] ? setSafer($_GET["id"]) : 0;

    $countdown = $db->prepare("SELECT * FROM countdowns WHERE ID=:id");
    $countdown->execute(array(
        "id" => $id
    ));
    $countdown = $countdown->fetch();

    if (!$countdown) {
        header("Location: index.php");
    }

    $query = $db->prepare('UPDATE countdowns SET views=views+1 WHERE ID=:id');
    $query->execute(array(
        'id' => $countdown["ID"]
    ));

    $pageTitle = $countdown["name"];
    $pageTags = strtolower($countdown["name"]);
    $pageDesc = strip_tags($countdown["description"]);
?>

<main class="countdown" style="background-image: url('<?=$countdown["background"]?>');">
    <div>
        <div class="local-nav <?=$countdown["black"] ? 'black' : ''?>">
            <div class="local-nav-content container">
                <h2><?=$countdown["name"]?></h2>
                <ul>
                    <!--<li><a href="" class="small-button">Paylaş</a></li>-->
                </ul>
            </div>
        </div>
        <div class="countdown-content container">
            <div class="countdown-counter" data-date="<?=$countdown["date"]?>">
                <?php
                    if (strtotime($countdown["date"]) > time()) {
                ?>
                <i class="fas fa-cog fa-spin"></i>
                <h2 class="countdown-counter-text">
                    <span class="countdown-days">0</span> gün 
                    <span class="countdown-hours">0</span> saat 
                    <span class="countdown-minutes">0</span> dakika 
                    <span class="countdown-seconds">0</span> saniye
                    <br> <span class="countdown-counter-type"><small>kaldı</small></span>
                </h2>
                <?php 
                    } else { 
                        $notRunCounter = true;
                ?>
                    <h2>Geri sayım bitti.</h2>
                <?php } ?>
            </div>
            <div class="countdown-stats">
                <div title="Görüntülenme" class="countdown-stat countdown-views <?=$countdown["black"] ? 'black' : ''?>">
                    <i class="far fa-eye"></i> <?=$countdown["views"]?>
                </div>
                <div class="countdown-stat countdown-date <?=$countdown["black"] ? 'black' : ''?>" style="margin-left: 10px">
                    <strong>Gerçekleşme Tarihi:</strong> <?=date("j.n.Y", strtotime($countdown["date"]))?>
                </div>
                <div data-id="<?=$countdown["ID"]?>" title="Beğen" class="countdown-stat countdown-likes float <?=$countdown["black"] ? 'black' : ''?>" style="margin-left: auto;">
                    <i class="fa<?php if (isset($liked[$countdown["ID"]])) { echo "s"; } else { echo "r"; }?> fa-heart"></i> <?=$countdown["likes"]?>
                </div>
            </div>
            <hr style="border-color: rgba(255, 255, 255, .75)">
            <article class="article countdown-desc <?=$countdown["black"] ? 'black' : ''?>">
                <h2><?=$countdown["name"]?></h2>
                <?php if ($countdown["description"]) {
                    echo $countdown["description"];
                } ?>
                <p>
                    <strong>Oluşturulma Tarihi:</strong> <?=date("j.n.Y", strtotime($countdown["time"]))?>
                    <br>
                    <strong>Kategori:</strong> <?=$countdown["category"]?>
                </p>
            </article>
        </div>
    </div>
</main>
<?php if (!$notRunCounter) { ?>
<script src="scripts/countdown.js"></script>
<?php } ?>

<?php
    include "footer.php";
    
<?php
    include "start-up.php";
    include "header.php";

    $pageTitle = "Beğendiklerin";
?>

<main>
    <div class="local-nav">
        <div class="local-nav-content container">
            <h2>Beğendiklerin</h2>
        </div>
    </div>
    <div class="content">
        <section class="block container" style="background: linear-gradient(to right, var(--main), rgb(222, 191, 168)); color: white">
            <h2>Beğen, kaydet, zaman kaybetme.</h2>
            <p>Zaman Makinası'nın bir başka güzel özelliği de, her kullanıcıya kayıt olma şartı vermeden istediği bir geri sayımı beğenip, bu sayfada kaydedebilmesidir.</p>
        </section>
        <hr style="color: black">
        <div class="three-column countdown-list container">  
        <?php
            foreach ($liked as $id => $_) {
                $countdowns = $db->prepare("SELECT * FROM countdowns WHERE ID=:id AND date > NOW() ORDER BY date");
                $countdowns->execute(array(
                    "id" => $id
                ));
                $countdowns = $countdowns->fetchAll();

                foreach ($countdowns as $countdown) {
                    $found = true;
        ?>
        <a href="countdown.php?id=<?=$countdown["ID"]?>" class="countdown-list-item float">
            <div class="countdown-item-header">
                <h3 class="countdown-item-name"><?=$countdown["name"]?></h3>
            </div>
            <div class="countdown-item-content" style="background-image: url('<?=$countdown["background"]?>');">
            </div>
            <div class="countdown-item-footer">
                <div title="Görüntülenme" class="countdown-item-views">
                    <i class="far fa-eye"></i> <?=$countdown["views"]?>
                </div>
                <div title="Tarih" class="countdown-item-date">
                    <?=date("j.n.Y", strtotime($countdown["date"]))?>
                </div>
                <div data-id="<?=$countdown["ID"]?>" title="Beğen" class="countdown-item-likes">
                    <i class="fa<?php if (isset($liked[$countdown["ID"]])) { echo "s"; } else { echo "r"; }?> fa-heart"></i> <?=$countdown["likes"]?>
                </div>
            </div>
        </a>
        <?php 
                } 
            }   
        ?>
    </div>
    <?php if (!$found) { ?>
        <div class="container" style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: calc(75vh - 180px )">
            <h2>Burası boş.</h2>
            <p>Geri sayımlarını beğenerek, hemen doldurmaya başla!</p>
        </div>
    <?php } ?>
    </div>
</main>

<?php
    include "footer.php";
    
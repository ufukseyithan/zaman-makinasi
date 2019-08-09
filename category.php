<?php
    include "start-up.php";
    include "header.php";

    $categoryCodeNames = array();

    foreach ($categories as $category) {
        $categoryCodeNames[$category["name"]] = $category["codeName"];
    }

    $category = $_GET["category"] ? setSafer($_GET["category"]) : "";

    $exists = array_search($category, $categoryCodeNames);

    if (!$exists) {
        header("Location: index.php");
    }

    $pageTitle = $exists;
?>

<main>
    <div class="local-nav">
        <div class="local-nav-content container">
            <h2><?=$exists?></h2>
        </div>
    </div>
    <div class="content">
        <div class="three-column countdown-list container">  
            <?php
                $countdowns = $db->prepare("SELECT * FROM countdowns WHERE category=:category AND date > NOW() ORDER BY date");
                $countdowns->execute(array(
                    "category" => $exists
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
                        <i class="far fa-eye"></i> <?=shortenNumber($countdown["views"])?>
                    </div>
                    <div title="Tarih" class="countdown-item-date">
                        <?=date("j.n.Y", strtotime($countdown["date"]))?>
                    </div>
                    <div data-id="<?=$countdown["ID"]?>" title="Beğen" class="countdown-item-likes">
                        <i class="fa<?php if (isset($liked[$countdown["ID"]])) { echo "s"; } else { echo "r"; }?> fa-heart"></i> <?=shortenNumber($countdown["likes"])?>
                    </div>
                </div>
            </a>
            <?php } ?>
        </div>
        <?php if (!$found) { ?>
            <div class="container" style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: calc(100vh - 150px )">
                <h2>Burası boş.</h2>
            </div>
        <?php } ?>
    </div>
</main>

<?php
    include "footer.php";
    
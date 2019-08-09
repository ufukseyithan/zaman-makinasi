<?php
    include "start-up.php";
    include "header.php";
?>

<main class="main">
    <div style="position: absolute; width: 100%; color: white; background: linear-gradient(to right, #e6007e, var(--main));">
        <p class="container" style="line-height: 36px; white-space: nowrap; overflow: auto">Zaman Makinası değişti! <a href="intro.php" class="link">Daha fazla bilgi al <i class="fas fa-angle-right"></i></a></p>
    </div>
    <section class="container" style="height: calc(100vh - 50px)">
        <article>
            <h2 style="background: -webkit-linear-gradient(-45deg, var(--background), var(--main)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Zaman Makinası'na hoş geldin.</h2>
            <p style="background: -webkit-linear-gradient(-180deg, var(--main), var(--background)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Estetikten kayıp yaşamadan, sadeliği koruyarak, Türkiye'de yakın zamanda ne olacağana dair haberdar ol.</p>
        </article>
        <div><i style="color: var(--main);" class="fas fa-cog fa-spin fa-9x"></i></div>
    </section>
    <section style="background: var(--background); color: white;">
        <div class="container">
            <article style="width: 100%; text-align: center">
                <h2>Arayarak başla.</h2>
                <p><span style="color: var(--main);">Neyi</span> merak ediyorsun?</p>
                <input id="main-search" type="search" placeholder="Ara">
                <ul id="main-search-list">
                    <?php
                        $countdowns = $db->prepare("SELECT * FROM countdowns WHERE DATE(date) > CURDATE() ORDER BY date LIMIT 5");
                        $countdowns->execute();
                        $countdowns = $countdowns->fetchAll();

                        foreach ($countdowns as $countdown) {
                    ?>
                    <li><a href="countdown.php?id=<?=$countdown["ID"]?>" class="link"><?=$countdown["name"]?></a></li>
                    <?php } ?>
                </ul>
            </article>
        </div> 
    </section>
    <section style="background: var(--main); color: white;">
        <div class="container">
            <article>
                <h2>Yakın zamanda gidilecek bir film var mı?</h2>
                <p>Bir sonraki gideceğin filmi şimdiden kararlaştırabilmek şimdi sana layık oldu.</p>
                <a class="button" href="category.php?category=movies">Filmlere Göz At <i class="fas fa-angle-right"></i></a>
            </article>
            <div><i class="fas fa-film fa-9x"></i></div>
        </div>
    </section>
    <section style="background: var(--main); color: white;">
        <div class="container">
            <div><i class="fas fa-gamepad fa-9x"></i></div>
            <article>
                <h2>Uzun zamandır beklediğin oyunlar ne zaman çıkıyor?</h2>
                <p>Son zamanlarda oyunları daha ucuza ön sipariş vermek artık moda. Belki Makina sana bu konuda yardımcı olabilir.</p>
                <a class="button" href="category.php?category=games">Oyunlara Göz At <i class="fas fa-angle-right"></i></a>
            </article>
        </div>
    </section>
    <section style="background: var(--main); color: white;">
        <div class="container">
            <article>
                <h2>Sabah akşam çalıştığın sınavlara ne kadar kaldı?</h2>
                <p>Merak etme, sınavlara daha çok var, ama sen gene de son hız çalışmaya devam et.</p>
                <a class="button" href="category.php?category=exams">Sınavlara Göz At <i class="fas fa-angle-right"></i></a>
            </article>
            <div><i class="fas fa-book fa-9x"></i></div>
        </div>
    </section>
    <section style="background: var(--main); color: white;">
        <div class="container">
            <div><i class="fas fa-umbrella-beach fa-9x"></i></div>
            <article>
                <h2>Sınavlardan sonra güzel bi' dinlenme çok iyi gitmez mi?</h2>
                <p>Tatiller ve Bayramlar hızla yaklaşırken önceden planlarını gerçekleştir, sonraya kalmasın.</p>
                <a class="button" href="category.php?category=holidays">Tatillere/Bayramlara Göz At <i class="fas fa-angle-right"></i></a>
            </article>
        </div>
    </section>
    <div class="content" style="background: linear-gradient(to bottom, var(--main) 10%, white 60%); display: flex;">
        <div class="container">
            <h2 style="background: -webkit-linear-gradient(var(--background), var(--main)); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Başka ne var?</h2>
            <div class="three-column" style="grid-gap: 20px; text-align: center">
                <a class="card float" style="background-color: tomato; color: rgba(255, 255, 255, .9)" href="about.php">
                    <h3>Hakkında</h3>
                    <p>Makina hakkında daha fazla bilgi edin.</p>
                </a>
                <a class="card float" style="background-color: crimson; color: rgba(255, 255, 255, .9)" href="help-center.php">
                    <h3>Yardım Merkezi</h3>
                    <p>Aklındaki soruların cevabını bul.</p>
                </a>
                <a class="card float" style="background-color: dodgerblue; color: rgba(255, 255, 255, .9)" href="mailto:makina@zamanmakinasi.net">
                    <h3>İletişim</h3>
                    <p>Bize e-posta gönder, hemen cevaplayalım.</p>
                </a>
            </div>
        </div>
    </div>
</main>

<?php
    include "footer.php";
    
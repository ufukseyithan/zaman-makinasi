<?php
    include "start-up.php";
    include "header.php";

    $pageTitle = "Yeni Güncelleme";
?>

<main class="intro">
    <div style="display: flex; flex-direction: column; align-items: center; height: calc(100vh - 50px); color: white; background: linear-gradient(to right, #e6007e, var(--main));">
        <article class="container article">
            <h2>Zaman Makinası değişti. Artık daha sade ve kendine özgü.</h2>
            <p>Makina'yı değiştirmek istedik. Onun, daha iyi olduğunu düşündüğümüz tasarım prensibini, sadeliğini daha da artırdık.</p>
            <p>Böylelikle, kullanıcılar onunla daha iyi etkileşime geçebilecek ve onu daha iyi tanıyabilecek.</p>
            <p>Makina'nın sadece tasarımını değiştirmedik, kullanıcılarımızın beğeneceğini düşündüğümüz birkaç eklenti ekledik ve Makina'ya aslında uymayan özelliklerini de çıkardık.</p>
        </article>
    </div>
    <section>
        <article class="container article">
            <h2>Kartlar. Onlar her yerde.</h2>
            <p>Geliştiriciler olarak, kullanıcıların geri sayımları gördüğü an onları bir geri sayım olarak anlaması gerektiğini düşündük. Ve geri sayımların kimliklerini belirten kartları oluşturduk. Kullanıcılar, kartları gördüğünde, onların artık tıklanabilir bir geri sayım olduğunu anlayabilecekler.</p>
            <p>Kartların üzerinde, geri sayımın; adını, arka plan resmini, ne zaman gerçekleşeceğini, ne kadar görüntülendiğini ve beğenildiğini görebileceksiniz. Üzerlerine tıkladığınızda, kolayca profillerine gidebileceksiniz.</p>
            <p>Birkaç rastgele geri sayım kartı:</p>
        </article>
        <div class="container three-column countdown-list">
            <?php
                $countdowns = $db->prepare("SELECT * FROM countdowns WHERE date > NOW() ORDER BY RAND() LIMIT 3");
                $countdowns->execute();
                $countdowns = $countdowns->fetchAll();

                foreach ($countdowns as $countdown) {
            ?>
            <a href="countdown.php?id=<?=$countdown["ID"]?>" class="countdown-list-item float" style="">
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
    </section>
    <section style="background: var(--background); color: white">
        <article class="container article">
            <h2 style="color: var(--main)">Daha az kategori ama daha sadık.</h2>
            <p>Makina, bünyesinde güncellemedeği birkaç kategori barındırıyordu. Onları kaldırdık. Ve söz verdiğimiz gibi, artık daha doğru ve sürekli çalışacak.</p>
            <h3>Kategoriler:</h3>
            <ul>
                <?php foreach ($categories as $category) { ?>
                <li>
                    <a href="category.php?category=<?=$category["code-name"]?>" class="link"><?=$category["name"]?></a>
                </li>
                <?php } ?>
            </ul>
        </article>
    </section>
    <section>
        <div class="container" style="text-align: center"><img style="width: 300px" src="assets/liking-countdown.gif" alt="Geri sayım beğenme"></div>
        <article class="container article">
            <h2>Beğen. Kaydet. Sakla.</h2>
            <p>Kullanıcılar, artık Makina'da gördüğü geri sayımları beğenip, <a href="likes.php" class="link">Beğendiklerin</a> sayfasında kaydedebilirler. Böylelikle, geriye dönüp önceden buldukları geri sayımları tekrar aramak zorunda kalmazlar.</p>
            <p>Üstüne üstlük, herhangi bir geri sayımın ne kadar beğenildiği de yine kullanıcılar tarafından görülebilir.</p>
            <p><strong>Bu arada, evet. Kayıt zorunluluğu yok!</strong></p>
        </article>
    </section>
    <section style="color: white; background: linear-gradient(to left, #e6007e, var(--main)); text-align: center; font-size: x-large">
        <h2>Beğendin mi?</h2>
        <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fzamanmakinasinet%2F&width=63&layout=button&action=like&size=large&show_faces=true&share=false&height=65&appId" width="63" height="65" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
    </section>
    <div class="content" style="display: flex;">
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
    
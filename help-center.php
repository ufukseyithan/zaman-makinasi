<?php
    include "start-up.php";
    include "header.php";

    $pageTitle = "Yardım Merkezi";
?>

<main>
    <div class="local-nav">
        <div class="local-nav-content container">
            <h2>Yardım Merkezi</h2>
        </div>
    </div>
    <div class="content">
        <section class="block container" style="background: linear-gradient(to right, var(--main), crimson); color: white">
            <h2>Sorularına cevap bul.</h2>
            <p>Sıkça Sorulan Soruları burada derledik. Eğer sorununun cevabını bulamazsan, bizimle <a href="mailto:makina@zamanmakinasi.com" class="link">iletişime</a> geçebilirsin.</p>
        </section>
        <hr style="color: black">
        <div class="container">
            <details>
                <summary>Aradığım geri sayımı bulamadım, ne yapabilirim?</summary>
                <p>Dünya büyük ve her an yeni şeyler gerçekleşebilir. Nadirdir fakat Zaman Makinası dünyanın hızına yetişemediği durumlarla karşılaşabiliriz. Dolayısıyla, öğrenmek istediğiniz geri sayımı bulamazsınız. Bu gibi durumlarda, bizimle <a href="mailto:makina@zamanmakinasi.com" class="link">iletişime</a> geçip; Zaman Makinası'nın geri saymasını istediğiniz filmi, oyunu, sınavı ve tatili bize iletebilirsiniz.</p>
            </details>
            <details>
                <summary>Reklamları nasıl engelleyebilirim?</summary>
                <p>Zaman Makinası (<a href="about.php" class="link">Hakkında</a> sayfasında da belirtildiği gibi) maddi ihtiyaçlarını karşılamak için platformunda reklam barındırmak zorundadır. Üzülerek söylüyoruz ki, reklamları kaldırmanın bir yolu yoktur ve bu, Zaman Makinası'nın hizmetini idame ettirebilmesi için gereklidir.</p>
            </details>
            <details>
                <summary>Bu siteyi kim geliştirdi?</summary>
                <p>Ta kendisi: <a href="https://www.linkedin.com/in/ufukseyithanerdem" class="link">Ufuk Seyithan Erdem</a></p>
            </details>
        </div>
    </div>
</main>

<?php
    include "footer.php";
    
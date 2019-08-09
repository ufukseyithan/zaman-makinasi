<?php
    include "start-up.php";
    include "header.php";

    $page = $_GET["page"] ? setSafer($_GET["page"]) : "";

    $pages = array(
        "Gizlilik Politikası" => "privacy-policy",
        "Kullanım Şartları" => "terms-of-use",
    );

    $exists = array_search($page, $pages);

    if (!$exists) {
        header("Location: index.php");
    }

    $pageTitle = "Yasal: ".$exists;
?>

<main>
    <div class="local-nav">
        <div class="local-nav-content container">
            <h2>Yasal</h2>
            <ul>
                <li><a <?php if ($exists == "Gizlilik Politikası") { echo 'class="active"'; } ?> href="?page=privacy-policy">Gizlilik Politikası</a></li>
                <li><a <?php if ($exists == "Kullanım Şartları") { echo 'class="active"'; } ?> href="?page=terms-of-use">Kullanım Şartları</a></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <article class="article container">
            <h2><?=$exists?></h2>
            <?php if ($exists == "Gizlilik Politikası") { ?>
            <p>Bu metinde, Zaman Makinası'nda zaman geçirirken bize ne gibi bilgiler verip (ya da vermediğinizi) öğrenebilirsiniz. Ama Zaman Makinası olarak sizi temin ederiz ki bu platformda geçirdiğiniz hiçbir an gizliliğinizi ele vermiyorsunuz. Zaman Makinası buna asla izin vermez, zaten ihtiyacı da yoktur.</p>

            <h3>Gizlilik</h3>
            <p>Zaman Makinası size sadece istediğiniz bilgileri verir ve bunun karşılığında sizden hiçbir kişisel bilginizi almaz ve kullanmaz.</p>

            <h3>Çerezler</h3>
            <p>Bir geri sayımı beğendiğinizde, kaydedilebilmesi için ilgili geri sayımın kimliğini taşıyan bir çerez cihazınıza yerleştirilir. Bunun dışında, Zaman Makinası cihazınıza başka bir çerez yerleştirmez.</p>
            <?php } elseif ($exists == "Kullanım Şartları") { ?>
            <p>Zaman Makinası geri sayımları (ve dünyada olup biteni) öğrenmeniz için yeteri kadar özgür bir alandır. Fakat -tabii ki- böyle özgür bir alanda bile yapmanızı yasakladığımız birkaç madde bulunmakta.</p>

            <h3>Kırma ("Hackleme") ve Açık Yakalama</h3>
            <p>Zaman Makinası, <a href="https://www.tbmm.gov.tr/kanunlar/k5237.html" class="link">Türk Ceza Kanunu'na göre, 244. Madde esasen</a> herhangi bir sebeple veya sebepsiz, -eğer varsa ki- bir (güvenlik) açık yakalanarak veya yakalanmayarak "hacklenemez". Zaman Makinası hizmet hayatını idame ettirebilmesi için böyle bir şey mümkün değildir ve kabul edilemez. Aksine, eğer bir açık yakalanırsa, açığın Zaman Makina'sına geri bildirim yoluyla iletilmesini arz ederiz.</p>

            <h3>Feragat</h3>
            <p>Zaman Makinası ismi ve logosu kendine özgüdür ve kimse tarafından -izin alarak veya alınmadan- kullanılamaz. Onun haricinde, öğrenilen geri sayımlar (ve diğer haberler) bilgi paylaşımı için kullanılabilir.</p>

            <h3>Sonuç</h3>
            <p>Kullanıcılar Zaman Makinası'nı ziyaret ederek, bu maddeleri okumuş ve kabul etmiş sayılır.</p>
            <?php } ?>
        </article>
    </div>
</main>

<?php
    include "footer.php";
    
    <footer>
        <div class="container">
            <article>
                <h1 id="logo" style="display: inline-block;"><a href="index.php" style="color: unset"><i class="fas fa-cog"></i> Zaman Makinası</a></h1>
                <p>Zaman Makinası, içinde bulundurduğu kategorilere ayrılmış ve günden güne güncellenen geri sayımlarıyla insanlara (özellikle Türk vatandaşlarına) hizmet eden bir platformdur.</p>
            </article>
            <hr>
            <div id="footer-bottom" style="display: flex; justify-content: space-between">
                <p>Tüm hakları saklıdır © <?=date("Y")?></p>
                <div>
                    <a href="https://www.facebook.com/zamanmakinasinet" class="link"><i class="fab fa-facebook-square"></i></a>
                </div>
                <div>
                    <a href="legal.php?page=privacy-policy" class="link">Gizlilik Politikası</a> |
                    <a href="legal.php?page=terms-of-use" class="link">Kullanım Şartları</a> |
                    <a href="site-map.php" class="link">Site Haritası</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
<?php
    $pageContents = ob_get_contents();
    ob_end_clean();
    
    $pageContents = str_replace('<!--TITLE-->', ($pageTitle ? $pageTitle." - " : "")."Zaman Makinası", $pageContents);
    $pageContents = str_replace('<!--TAGS-->', ($pageTags ? $pageTags.", " : "")."makina, zaman makinası, ne zaman, film, oyun, sınav, tatil", $pageContents);
    $pageContents = str_replace('<!--DESC-->', $pageDesc ? $pageDesc : "Zaman Makinası, içinde bulundurduğu kategorilere ayrılmış ve günden güne güncellenen geri sayımlarıyla insanlara (özellikle Türk vatandaşlarına) hizmet eden bir platformdur.", $pageContents);
    echo $pageContents;
?>
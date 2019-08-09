<?php 
    header('Content-type: application/xml; charset=utf-8') ;

    echo '<?xml version="1.0" encoding="UTF-8"?>';

    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    echo '<url>
 
       <loc>http://localhost/zaman-makinasi/</loc>
 
       <lastmod>2018-10-10</lastmod>
 
       <changefreq>monthly</changefreq>
 
       <priority>1</priority>
 
    </url>';

    echo '<url>
 
       <loc>http://localhost/zaman-makinasi/index.php</loc>
 
       <lastmod>2018-10-10</lastmod>
 
       <changefreq>monthly</changefreq>
 
       <priority>1</priority>
 
    </url>';

    try {
        $db = new PDO("mysql:host=localhost;dbname=zamanmakinasi", "root", "seaways123");
    } catch ( PDOException $e ){
        print $e->getMessage();
    }

    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    date_default_timezone_set('Europe/Istanbul');

    $categories = $db->prepare("SELECT * FROM categories");
    $categories->execute();
    $categories = $categories->fetchAll();

    foreach ($categories as $category) {
        echo '<url>
    
        <loc>http://localhost/zaman-makinasi/category.php?category='.$category["codeName"].'</loc>
    
        <lastmod>2018-10-10</lastmod>
    
        <changefreq>daily</changefreq>
    
        <priority>0.7</priority>
    
        </url>';
    }

    $countdowns = $db->prepare("SELECT * FROM countdowns");
    $countdowns->execute();
    $countdowns = $countdowns->fetchAll();

    foreach ($countdowns as $countdown) {
        echo '<url>
    
        <loc>http://localhost/zaman-makinasi/countdown.php?id='.$countdown["ID"].'</loc>
    
        <lastmod>'.date('Y-m-d', strtotime($countdown["time"])).'</lastmod>
    
        <changefreq>daily</changefreq>
    
        <priority>0.8</priority>
    
        </url>';
    }

    echo '<url>
 
       <loc>http://localhost/zaman-makinasi/about.php</loc>
 
       <lastmod>2018-10-10</lastmod>
 
       <changefreq>monthly</changefreq>
 
       <priority>0.5</priority>
 
    </url>';

    echo '<url>
 
       <loc>http://localhost/zaman-makinasi/help-center.php</loc>
 
       <lastmod>2018-10-10</lastmod>
 
       <changefreq>monthly</changefreq>
 
       <priority>0.5</priority>
 
    </url>';

    echo '<url>
 
       <loc>http://localhost/zaman-makinasi/legal.php?page=privacy-policy</loc>
 
       <lastmod>2018-10-10</lastmod>
 
       <changefreq>monthly</changefreq>
 
       <priority>0.5</priority>
 
    </url>';

    echo '<url>
 
        <loc>http://localhost/zaman-makinasi/legal.php?page=terms-of-use</loc>

        <lastmod>2018-10-10</lastmod>

        <changefreq>monthly</changefreq>

        <priority>0.5</priority>

    </url>';

    echo '</urlset>';
?>


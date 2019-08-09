<?php
    $categories = $db->prepare("SELECT * FROM categories");
    $categories->execute();
    $categories = $categories->fetchAll();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <title><!--TITLE--></title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="<!--TAGS-->">
    <meta name="description" content="<!--DESC-->">

    <link rel="icon" href="assets/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Roboto:700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <script defer src="https://use.fontawesome.com/releases/v5.8.2/js/all.js" integrity="sha384-DJ25uNYET2XCl5ZF++U8eNxPWqcKohUUBUpKGlNLMchM7q4Wjg2CUpjHLaL8yYPH" crossorigin="anonymous"></script>
    <script src="scripts/jquery-3.3.1.min.js"></script>
    <script src="scripts/jquery.cookie-1.4.1.min.js"></script>
    <script src="scripts/main.js"></script>
    
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
         (adsbygoogle = window.adsbygoogle || []).push({
              google_ad_client: "ca-pub-3761444858098861",
              enable_page_level_ads: true
         });
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-128585239-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-128585239-1');
    </script>
</head>
<body>
    <header>
        <nav class="container">
            <ul>
                <li>
                    <a href="index.php"><i class="fas fa-cog"></i></a>
                </li>
                <?php foreach ($categories as $category) { ?>
                <li>
                    <a href="category.php?category=<?=$category["codeName"]?>"><?=$category["name"]?></a>
                </li>
                <?php } ?>
                <li><a href="likes.php" title="Beğendiklerin"><i class="fas fa-heart"></i></a></li>
            </ul>
        </nav>
    </header>
    
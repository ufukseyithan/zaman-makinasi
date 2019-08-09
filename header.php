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
    
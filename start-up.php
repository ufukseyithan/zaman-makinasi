<?php
    ob_start();
    session_start();

    date_default_timezone_set('Europe/Istanbul');

    try {
        $db = new PDO("mysql:host=localhost;dbname=zaman-makinasi", "root", "");
    } catch ( PDOException $e ){
        print $e->getMessage();
    }

    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!$_COOKIE["cls"]) {
        setcookie("cls", json_encode(array()), time() + (86400 * 30));
    }

    $liked = json_decode($_COOKIE['cls'], true);

    $countdowns = $db->prepare("SELECT * FROM countdowns WHERE auto=1 AND date < NOW()");
    $countdowns->execute();
    $countdowns = $countdowns->fetchAll();
    foreach ($countdowns as $countdown) {
        $date = $countdown["date"];
        $date = strtotime($date);
        $date = strtotime("+1 year", $date);
        $date = date("Y-m-d H:m:s", $date);

        $query = $db->prepare('UPDATE countdowns SET date=:date WHERE ID=:id');
        $query->execute(array(
            'date' => $date,
            'id' => $countdown["ID"]
        ));
    }

    require "functions.php";

    $pageTitle = false;
    $pageTags = false;
    $pageDesc = false;

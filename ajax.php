<?php
    include "start-up.php";

    $to = $_GET["to"];

    switch ($to) {
        case "like-dislike-countdown":
            $id = $_POST["id"];

            $add = 1;
            $status;
            if (isset($liked[$id])) {
                unset($liked[$id]);

                $add = -1;

                $status = "Decreased";
            } else {
                $liked[$id] = true;

                $status = "Increased";
            }

            setcookie("cls", json_encode($liked), time() + (86400 * 30));

            $query = $db->prepare('UPDATE countdowns SET likes=likes+:add WHERE ID=:id');
            $query->execute(array(
                'add' => $add,
                'id' => $id
            ));

            $countdowns = $db->prepare("SELECT likes FROM countdowns WHERE ID=:id");
            $countdowns->execute(array(
                'id' => $id
            ));
            $countdowns = $countdowns->fetchAll();
            foreach($countdowns as $countdown){
                $likes = $countdown["likes"];
            }

            echo json_encode(array(
                "status" => $status,
                "likes" => $likes
            ));

            break;
        case "search-countdowns":
            $val = $_POST["val"];
            $links = "";

            $countdowns = $db->prepare("SELECT * FROM countdowns WHERE name LIKE ? AND DATE(date) > CURDATE() ORDER BY date LIMIT 5");
            $countdowns->execute(array("%".$val."%"));
            $countdowns = $countdowns->fetchAll();
            foreach ($countdowns as $countdown) {
                $links .= '<li><a href="countdown.php?id='.$countdown["ID"].'" class="link">'.$countdown["name"].'</a></li>|';
            }

            echo $links != "" ? $links : "No result found";

            break;

        default:
            echo "No process was found";
}
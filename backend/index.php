<?php
$req = $_REQUEST;
$reb = array();
$reb['status'] = 200;
if (!$req) {
    echo json_encode($reb);
} else {
    $mysqli = new mysqli('localhost', 'root', 'GuanShuWen731008.', 'cat');
    switch ($req['method']) {
        case 'insert': // 添加一只猫咪
            $name = addslashes($req['name']);
            $sex  = $req['sex'];
            $vaccine = $req['vaccine'];
            $sterilization = $req['sterilization'];
            $status = addslashes($req['status']);
            $character = addslashes($req['character']);
            $vector = json_decode($req['vector']);
            $sql = "INSERT INTO info (name,sex,vaccine,sterilization,status,character,vector) VALUES ('$name','$sex','$vaccine','$sterilization','$status','$character','$vector'";
            if ($mysqli->query($sql) === TRUE) {
                $reb['status'] = 200;
            } else {
                $reb['status'] = 400;
                $reb['msg'] = $mysqli->error;
            }
            echo json_encode($reb);
            $mysqli->close();
            break;
        case 'search': // 列出所有猫咪
            $cats = array();
            $sql = "SELECT * FROM `cat`";
            $result = $mysqli->query($sql);
            while (list(
                $name,
                $sex,
                $vaccine,
                $sterilization,
                $status,
                $character,
                $vector
            ) = $result->fetch_row()) {
                $cats[] = array(
                    'name' => $name,
                    'sex' => $sex,
                    'vaccine' => $vaccine,
                    'sterilization' => $sterilization,
                    'status' => $status,
                    'character' => $character
                );
            };
            $reb['cats'] = $cats;
            echo json_encode($reb);
            $mysqli->close();
            break;
        case 'compare': // 与所有猫咪对比

        default:
            $reb['status'] = 500;
            $reb['msg'] = 'Invalid method';
            echo json_encode($reb);
            break;
    }
}

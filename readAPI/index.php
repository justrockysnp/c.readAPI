<?php
    require_once __DIR__ . '/config.php';
    class API{
        function ReadData(){
            $db = new Connect();
            $player = array();
            $data = $db->prepare('SELECT * FROM player ORDER BY id');
            $data->execute();

            while($output = $data->fetch(PDO::FETCH_ASSOC)){
                $player[$output['ID']] = array(
                    'ID' => $output['ID'],
                    'playername' => $output['playername'],
                    'level' => ['level']
                );
            }
            return json_encode($player);
        }
    }

    $API = new API;
    header('Content-Type: application/json');
    echo $API->ReadData();
?>
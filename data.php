<?php 
    if($_POST){
        $db = new PDO('mysql:host=127.0.0.1;dbname=tamirci_yedek','qaRe','root');


        $insert = $db->prepare('INSERT INTO postdatabase (mydate) VALUES (?)');
        $response = $insert->execute(array($_POST['name']));

        if($response){
            echo 'kayit edildi';
        }

    }
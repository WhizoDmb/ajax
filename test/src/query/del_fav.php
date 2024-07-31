<?php
    use MyApp\data\Database;
    require("../../vendor/autoload.php");
    $db = new Database;

    if(isset($_POST['title']) && isset($_POST['year']) && isset($_POST['type']) && isset($_POST['imdb_id']) && isset($_POST['poster'])  && isset($_POST['id_fav']) ){
        $title = $_POST['title'];
        $year = $_POST['year'];
        $type = $_POST['type'];
        $imdbID = $_POST['imdb_id'];
        $poster = $_POST['poster'];
        $id_fav = $_POST['id_fav'];
        
       $delete_fav="DELETE FROM favoritos WHERE `favoritos`.`id_fav` = $id_fav";
       $db->ejecutarConsulta($delete_fav);
  
header("Refresh:1");
        echo 'success';


    } else {
        echo 'error';
    }
?>
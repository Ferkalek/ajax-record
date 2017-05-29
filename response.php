<?php

include_once("config.php");
if(isset($_POST["content_txt"]) && strlen($_POST["content_txt"]) > 0) {
    $contentToSave = htmlspecialchars($_POST["content_txt"]);
    if($connecDB->query("INSERT INTO  `add_delete_record` (`content`) VALUES ('".$contentToSave."')")) {
        echo '<li id="item_'.$row["id"].'">';
        echo '<span class="del_button" id="del-'.$row["id"].'">x</span>';
        echo '<p>'.$contentToSave.'</p></li>';
        $connecDB->close();
    } else {
        header('HTTP/1.1 500 Could not insert record!');
        exit();
    }
}
elseif(isset($_POST["recordToDelete"]) && strlen($_POST["recordToDelete"]) > 0 && is_numeric($_POST["recordToDelete"])) {
    $idToDelete = $_POST["recordToDelete"];
    if(!$connecDB->query("DELETE FROM `add_delete_record` WHERE `di` =".$idToDelete)) {
        header('HTTP/1.1 500 Could not delete record!');
        exit();
    }
    $connecDB->close();
} else {
    header('HTTP/1.1 500 Error occurred, Could not process request!');
    exit();
}
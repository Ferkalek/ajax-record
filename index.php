<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<div class="content_wrapper">
    <ul id="responds">
        <?php include_once("config.php");
        $Result = $connecDB->query("SELECT * FROM `add_delete_record`");
        while(($row = $Result->fetch_assoc()) != false) {
            echo '<li id="item_'.$row["di"].'">';
            echo '<span class="del_button" id="del-'.$row["di"].'">x</span>';
            echo '<p>'.$row["content"].'</p></li>';
        }
        $connecDB->close();
        ?>
    </ul>
    <div class="form_style">
        <textarea name="content_txt" id="message" cols="45" rows="5"></textarea>
        <button id="add-item">Добавить запись</button>
    </div>
</div>

<script src="/js/jquery.js"></script>
<script src="/js/app.js"></script>
</body>
</html>
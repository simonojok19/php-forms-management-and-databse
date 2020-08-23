<?php
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = $_GET['id'];
    $db = new mysqli(
        'localhost',
        'root',
        '',
        'php'
    );

    $sql = "DELETE FROM users WHERE id=$id";
    $db -> query($sql);
    header('Location: select.php');
    $db -> close();

} else {
    header('Location: select.php');
}
<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=questionnairelist;charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    die($error->getMessage());
}
?>
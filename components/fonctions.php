<?php
include_once 'connect.php';
function listUsers()
{
    global $conn;
    $select_accounts = $conn->prepare("SELECT * FROM `users`");
    $select_accounts->execute();
    // $list_Users = $select_accounts->fetch(PDO::FETCH_ASSOC);
    $list_Users = $select_accounts->fetchAll();
    return $list_Users;
}

?>
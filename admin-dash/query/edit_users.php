<?php
require_once('../../config/config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $userID = $_POST['userID'];
    var_dump($userID);
    $editedData = [
        "name" => $_POST['userFName'],
        "lname" => $_POST['userLName'],
        "phone" => $_POST['userPhone'],
        "date_birth" => $_POST['userBirthday'],
        "address" => $_POST['userAddress'],
        "accountNumber" => $_POST['userCard'],
        "status" => $_POST['categoryStatus'],
    ];

    $db->where("id", $userID);
    $updated = $db->update("users", $editedData);

    if ($updated) {
        echo "<div class='alert alert-success'>کاربر با موفقیت ویرایش شد.</div>";
    } else {
        echo "<div class='alert alert-danger'>خطا در ویرایش کاربر</div>";
    }
}

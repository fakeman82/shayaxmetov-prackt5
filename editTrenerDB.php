<?php
$con = mysqli_connect("localhost", "root", "", "shayaxmetov_fitness"); 
include("header.php");
$editTrenerId = $_POST['id'];
$newTrener['surname'] = $_POST['surname'];
$newTrener['name'] = $_POST['name'];
$newTrener['patronymic'] = ($_POST['patronymic'] == false) ? "NULL" : "'" . $_POST['patronymic'] . "'";
$newTrener['phone'] = $_POST['phone'];
$newTrener['password'] = $_POST['password'];
$newTrener['birthday'] = date($_POST['birthday']);
$newTrener['gender'] = $_POST['gender'];
$newTrener['awards'] = ($_POST['awards'] == false) ? "NULL" : "'" . $_POST['awards'] . "'";
$q_oldTrener = "SELECT * FROM `Users` WHERE `id_client` = $editTrenerId";
$oldTrener = $con->query($q_oldTrener);
$oldTrener = mysqli_fetch_assoc($oldTrener);
unset($oldTrener['id_client'], $oldTrener['created_at'], $oldTrener['role'], $oldTrener['photo']);
$oldTrener['patronymic'] = (empty($oldTrener['patronymic'])) ? "NULL" : "'" . $oldTrener['patronymic'] . "'";
$oldTrener['awards'] = (empty($oldTrener['awards'])) ? "NULL" : "'" . $oldTrener['awards'] . "'";
if ($oldTrener != $newTrener) {
    $qUpdateTrenerData = "UPDATE `users` SET `surname`='" . $newTrener['surname'] . "',`name`='" . $newTrener['name'] . "',`patronymic`=" . $newTrener['patronymic'] . ",`birthday`='" . $newTrener['birthday'] . "',`gender`='" . $newTrener['gender'] . "',`phone`='" . $newTrener['phone'] . "',`password`='" . $newTrener['password'] . "',`awards`=" . $newTrener['awards'] . "WHERE `id_client` = " . $editTrenerId;
    echo $qUpdateTrenerData;
    $UpdateTrenerData = $con->query($qUpdateTrenerData);
    $_SESSION['result'] = "Изменения внесены";
} else {
    $_SESSION['result'] = "Информация идентична";
}
header('Location: editTrener.php?idTrener=' . $_POST['id']);
exit();
?>
<?php
$con = mysqli_connect("localhost", "root", "", "shayaxmetov_fitness"); 
if(!empty($_POST)){
    $surname = $_POST["surname"];
    $name = $_POST["name"];
    $patronymic = !empty($_POST["patronymic"])?$_POST["patronymic"]:"null";
    $birthday = $_POST["birthday"];
    $phone = $_POST["phone"];
    $photo = $_FILES["image"]["tmp_name"];
    if(!empty($_FILES["image"]["tmp_name"])){
        $name = "img/" .$_FILES["image"]["name"];
        $tmp_name = $_FILES["image"]["tmp_name"];
        move_uploaded_file($tmp_name, $name);
        
    }
    $gender = $_POST["gender"];
    $pass = $_POST["pass"];
    $awards = !empty($_POST["awards"])?$_POST["awards"]:"-";
    $photo = "trener1.png";
    $created_at = date("Y-m-d H:i:s");



    $query = "insert into users (id_client,surname,name,patronymic,birthday,photo,gender,phone,password,role,awards,created_at) values (null, '$surname', '$name', '$patronymic', '$birthday', '$photo', '$gender', '$phone', '$pass', '3', '$awards', '$created_at')";
    
    $result = mysqli_query($con,$query);
    
    if($result){
        if(!empty($_FILES["image"]["tmp_name"])){
            $name = "img/" .$_FILES["image"]["name"];
            $tmp_name = $_FILES["image"]["tmp_name"];
            move_uploaded_file($tmp_name, $name);
            
        }
        echo "<script>location.href='/';</script>";
    }
    else{
        echo "<script>alert('Ошибка добавления, попробуйте снова!');location.href='/';</script>";
    }
}
?>
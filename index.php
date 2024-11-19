<?php
session_start();
require_once("db.php");
if(isset($_POST['button'])){
if(!empty($_POST['login']) && !empty($_POST['password'])){
    $login=$_POST['login'];
    $password=md5($_POST['password']);
    $result=mysqli_query($link,"SELECT * FROM users WHERE login='$login' AND password='$password'");
    $user=mysqli_fetch_assoc($result);
    if(!empty($user)){
        $_SESSION['auth']=true;
        $_SESSION['login']=$user['login'];
        $_SESSION['id']=$user['id'];
        $_SESSION['status']=$user['status'];
        $_SESSION['full_name']=$user['full_name'];
        if($_SESSION['status']=='2'){
            header('Location: problems.php');
        }
        else if($_SESSION['status']=='1'){
        header("Location: admin.php");
    }
    }
    else{
        echo "Неверный логин и пароль";
    }
}
else{
    echo "Заполните поля!";
}
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Техносервис</title>
        <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>000 Техносервис</h1>
    </header>
    <nav>
        <a href="index.php">Главная</a>
        <a href="problems.php">Подать заявку</a>
        <a href="problems_all copy.php">Все заявки</a>
        <a href="logout.php">Выход</a>
    </nav>
    <main>
        <h2>Авторизация</h2>
        <form method="POST">
            <label for="login">Логин</label>
            <input type="text" name="login" id="login">
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password">
            <button name="button">Войти</button>
    </form>
    </main>
</body>
</html>
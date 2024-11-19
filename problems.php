<?php
session_start();
if(empty($_SESSION['auth'])){
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подать заявку</title>
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
    <h2>Подать заявку</h2>
    <form class="form1" action="" method="POST">
    <table>
    <tr>
    <td>Оборудование</td>
    <td><input type="text" name="equipment" ></td>
    </tr>
    <tr>
    <td>Тип неисправности </td>
    <td><input type="text" name="problem"></td>
    </tr>
    <tr>
    <td>Описание проблемы</td>
    <td><textarea name="descript" ></textarea></td>
    </tr>
    <tr>
    <td>ФИО клиента</td>
    <td><input type="text" name="full_name" ></td>
    </tr>
    <tr>
    <td></td>
    <td><button name="button">Отправить</button></td>
    </tr>
</form>
    </main>
 <?php
 require_once("db.php");
 if (isset($_POST['button'])){
 if(!empty($_POST['equipment']) && !empty($_POST['problem']) && !empty($_POST['descript']) && !empty($_POST['full_name'])){
    $equipment=$_POST['equipment'];
    $problem=$_POST['problem'];
    $descript=$_POST['descript'];
    $full_name=$_POST['full_name'];
    $id=$_SESSION['id'];
    $result=mysqli_query($link,"INSERT INTO problems (equipment,problem,descript,full_name,id_user) VALUES ('$equipment','$problem','$descript','$full_name','$id')");
    if($result=='true'){
        header("Location: problems_all copy.php");
    }
} else {
    echo "Все поля должны быть заполнены";
}
}
 
 ?>
</body>
</html>
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
    <title>Добавить исполнителя</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
        <h1>000 Техносервис</h1>
    </header>
    <nav>
        <a href="admin.php">Главная</a>
        <a href="insert_worker.php">Добавить исполнителя</a>
        <a href="update.php">Изменить статус заявки</a>
        <a href="update_problem.php">Изменить описание проблемы</a>
        <a href="problems.php">Подать заявку</a>
        <a href="logout.php">Выход</a>
    </nav>
    <main>
    <h2>Добавить или назначить исполнителя</h2>
    <form class="form1" action="" method="POST">
        <table>
            <tr>
                <td>Номер заявки</td>
                <td><input type="text" name="id"></td>
            </tr>
            <tr>
                <td>Назначить исполнителя</td>
                <td>
                    <input type="text" name="id_worker"></input>
                </td>
            </tr>
            <tr>
            <td></td>
            <td><button name="button">Изменить</button></td>
            </tr>
        </table>
    </form>
    <?php
    require_once("db.php");
    if (isset($_POST['button'])){
    if(!empty($_POST['id']) && !empty($_POST['id_worker'])){
        $id=$_POST['id'];
        $idWorker=$_POST['id_worker'];
        $result=mysqli_query($link,"UPDATE problems SET id_worker='$idWorker' WHERE id='$id'");
        if($result=='true'){
            header("Location:admin.php");
        }
        
    } else {
        echo "Все поля должны быть заполнены";
    }
    }
    ?>
    </main>
 
</body>
</html>
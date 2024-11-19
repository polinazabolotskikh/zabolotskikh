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
    <title>Все заявки</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
        <h1>000 Техносервис</h1>
    </header>
    <nav>
        <a href="index.php">Главная</a>
        <a href="problems.php">Подать заявку</a>
        <a href="logout.php">Выход</a>
    </nav>
    <main>
    <h2>Поиск заявки по ФИО</h2>
    <form method="POST">
        <label for="full_name">Введите ФИО клиента</label>
        <input type="text" name="full_name" id="full_name" placeholder="Иванов И. И.">
        <button>Найти</button>
    </form>
    <h2>Все заявки</h2>
    <table class="table1">
        <tr>
            <th>Номер заявки</th>
            <th>Дата добавления</th>
            <th>Оборудование</th>
            <th>Тип неисправности</th>
            <th>Описание проблемы</th>
            <th>ФИО клиента</th>
            <th>Статус заявки</th>
        </tr>
        <?php
        require_once('db.php');
        if(!empty($_POST['full_name'])){
            $search = mysqli_query($link, "SELECT * FROM problems WHERE full_name='$_POST[full_name]'");
            if(mysqli_fetch_assoc($search)==true){
            while($res=mysqli_fetch_assoc($search)){
                echo "<tr>
                <td>$res[id]</td>
                <td>$res[date_start]</td>
                <td>$res[equipment]</td>
                <td>$res[problem]</td>
                <td>$res[descript]</td>
                <td>$res[full_name]</td>
                <td>$res[status]</td></tr>";
            }
        }else{
                echo "Совпадений не найдено";
            }
        }
        else{
            $result=mysqli_query($link,"SELECT * FROM problems ORDER BY id DESC");
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr>
            <td>$row[id]</td>
            <td>$row[date_start]</td>
            <td>$row[equipment]</td>
            <td>$row[problem]</td>
            <td>$row[descript]</td>
            <td>$row[full_name]</td>
            <td>$row[status]</td></tr>";
        }
        }
        ?>
    </table>
    </main>
 
</body>
</html>
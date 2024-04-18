<?php
require_once 'classec/DbConnect.php';
require_once 'classec/Dog.php';

$connect = new DbConnect();

$db=$connect->connect_pdo();

$dog=new Dog($db);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color:#00CED1;
        }
        h1,h3{
            color:black;
        }
        .main{
            width:350px;
            height:600px;
            padding:30px;
            margin:10px;
            background-color:aquamarine;
        }
        .btn{
            background-color:white;
            width: 60px;
        }
        .btn1{
            border-radius:15px;
            width:130px;
            height: 30px;
            background-color:white;
        }
        .imgdogs{
            width:280px;
            height:180px;
            border-radius:15px;
        }
    </style>
<?php
require_once 'classec/DbConnect.php';
require_once 'classec/Dog.php';

$connect = new DbConnect();

$db=$connect->connect_pdo();

$dog=new Dog($db);


?>
<body>
    <h1>Клуб любителей собак</h1>
    <hr>
    <a href="index.php">Выбор карточки</a>
    <hr>
    <div class="main">
        <div class="container1">
        <h3>Введите номер карточки собаки</h3>
        <form method="POST" action="#">
        <input id="inp" class="btn" type="number" name="iddog"><br><br>
        <button id="inp" class="btn1" name="inpu">Показать</button>
        </form>
     
        </div>
        <hr>
        <?php
        if(isset($_POST['inpu'])){
            $x = $_POST["iddog"];
            $numberdog = $dog->readName($x);
        }
        ?>
        <div class="container2">
            <h3>Карточка № <?=$numberdog['id_dog']?></h3>
            <hr>
            <h3>Кличка: <?=$numberdog['nickname']?></h3>
            <h3>Порода: <?=$numberdog['breed']?></h3>
            <h3>Возраст: <?=$numberdog['age']?></h3>
            <h3>ФИО хозяина: <?=$numberdog['owner']?></h3>
            <img src="<?=$numberdog['image']?>" alt="" class="imgdogs">
        </div>
    </div>
</body>
</html>
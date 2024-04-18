<?php
require_once 'classec/DbConnect.php';
require_once 'classec/Dog.php';
$connect = new DbConnect();
$db = $connect->connect_pdo();
$dog=new Dog($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body{
        background-color: darkcyan;
        color: white;
    }
    a{
      color: white;
      font-size: 40px;
    }
    h3{
      font-size: 30px;
    }
    .grid-card{
      border: black 2px solid;
      width: 400px;
      height: 300px;
      padding: 20px;
      margin: auto;
    }
    .flex{
      display: flex;
      margin: auto;
      width: 1200px;
      height: 400px;
      align-items: center;
      justify-content: space-around;
      font-size: 20px;
    }
    .flex img{
      width: 500px;
      height: 300px;
      border: lightgreen 1px solid;
      border-radius: 45px;
    }
    .head{
      display: flex;
      justify-content: space-around;
    }
  </style>
</head>
<body>
<div class="page">
<?php
  $x = (int)$_GET['id'];
  $arry = $dog->readName($x);
  echo '<a href="index.php#pageGL"> << </a><hr style="margin: 10px 0px">';
  echo '<div class="head">';
  echo "<a href='style/page1.php'>Поиск собаки по номеру</a><br>";
  echo "<a href='style/page2.php'>Поиск собаки по породе</a><br>";
  echo "<a href='style/page3.php'>Вывод собак c группировкой</a><br>";
  echo "<a href='style/admin.php'>Страница админа</a><br>";
  echo '</div>';
  echo "<h1 style='color: white; text-align: center'> Клуб любителей собак: 'Белка и стрелка' </h1>";
  echo '<div class="flex">';
  echo '<img style="object-fit: cover;" src="'.$arry['image'].'" alt="">';
    echo '<div class="grid-card">
            <h3>Карточка № '.$arry['id_dog'].'</h3><hr style="margin: 10px 0px">
            <p>Кличка: '.$arry['nickname'].'</p>
            <p>Порода: '.$arry['breed'].'</p>
            <p>Возраст: '.$arry['age'].'</p>
            <p>Хозяин: '.$arry['owner'].'</p>
          </div>';
    echo '</div>';
?>
</body>
</html>
</div>
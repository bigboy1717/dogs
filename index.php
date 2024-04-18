<?php
require_once 'classec/DbConnect.php';
require_once 'classec/Dog.php';

$connect = new DbConnect();
$db=$connect->connect_pdo();

$dog=new Dog($db);
?>
<h1>Клуб любителей собак: СобакЛов </h1>
<h2>Первая запись</h2>
<?php
$sql1 = "SELECT * FROM dogs LIMIT 1";
$rezult = $connect->getInfPDO()->query($sql1);

while ($rows = $rezult->fetch(PDO::FETCH_ASSOC)){
    print_r($rows['id_dog'] . ") " . $rows['nickname'] . ", " .
$rows['breed'] . " " . $rows['age'] . " год<br>");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            display:flex;
            flex-wrap:wrap;
        }
        .cards{
            border:3px solid blue;
            flex:1 1 20rem;
            margin:2px;
            padding:10px;
            background-color:#CCFFCC;
            
        }
        .card_img{
            width:100%;
            border-radius:15px;
        }
        .flexContain{
            display:flex;
            flex-direction:row;
            gap:20px;
        }
        .flex{
          width:200px;
          background-color:aquamarine;
          text-align:center;
          
        }
        .flexx{
            background-color:aquamarine;
            height: 50px;
            width:110px;
            text-align:center;

        }
        .href{
        text-align: end;
        text-decoration: none;
        color: black
    }
    .href1{
        text-align: center;
        text-decoration: none;
        color: black
    }
    .href2{
        text-align: center;
        text-decoration: none;
        color: black
    }
    .poisk{
        display: flex;
        flex-direction: row;
        gap: 20px;
    }
    .pag1{
        background-color: #5F9EA0;
        color: white;
        text-align: center;
        font-size: 24px;
        width: 300px;
        height: 40px;
    }
    .pag2{
        background-color: #5F9EA0;
        text-align: center;
        color: white;
        font-size: 24px;
        width: 300px;
        height: 40px;
    }
    </style>
</head>
<body>
    

<h1>Собаки возрастом 1 год:</h1>

<?php
$sql2 = "SELECT * FROM dogs WHERE age = 1";
$rezult = $connect->getInfPDO()->query($sql2);

while ($rows = $rezult->fetch(PDO::FETCH_ASSOC)){
    print_r($rows['id_dog'] . ") " . $rows['nickname'] . ", " .
$rows['breed'] . " " . $rows['age'] . " год<br>");
}
?>

<hr>
<?php
$sql3 = "SELECT * FROM dogs WHERE breed = 'Мопс'";
$rezult = $connect->getInfPDO()->query($sql3);

while ($rows = $rezult->fetch(PDO::FETCH_ASSOC)){
    print_r($rows['id_dog'] . ") " . $rows['nickname'] . ", " .
$rows['breed'] . " " . $rows['age'] . " год<br>");
}
?>
<hr>
<?php
$sql5 = "SELECT * FROM dogs";
$rezult = $connect->getInfPDO()->query($sql5);

while($rows = $rezult->fetch(PDO::FETCH_ASSOC)){
    echo "<li>" . ($rows['nickname'] . ", " . $rows['breed'] . " " . $rows['age'] . " год<br> ");
}
?>
<hr>
<?php
$sql6 = "SELECT * FROM dogs WHERE breed = 'Ротвейлер'";
$rezult = $connect->getInfPDO()->query($sql6);

while ($rows = $rezult->fetch(PDO::FETCH_ASSOC)){
    print_r($rows['id_dog'] . ") " . $rows['nickname'] . ", " .
$rows['breed'] . " " . $rows['age'] . " год<br>");
}
?>

<?php
$sql7 = "SELECT COUNT(*) AS 'col' FROM dogs WHERE breed = 'Ротвейлер'";
$rezult = $connect->getInfPDO()->query($sql7);

while ($rows = $rezult->fetch(PDO::FETCH_ASSOC)){
    print_r("Количество Ротвейлеров = " . $rows['col']);
}
?>
<hr>
<?php
$sql8 = "SELECT * FROM dogs WHERE nickname = 'Чижик'";
$rezult = $connect->getInfPDO()->query($sql8);

while ($rows = $rezult->fetch(PDO::FETCH_ASSOC)){
    print_r($rows['id_dog'] . ") " . $rows['nickname'] . ", " .
$rows['breed'] . " " . $rows['age'] . " год<br>");
}
?>
<hr>
<?php
$sql9 = "SELECT * FROM dogs WHERE age >= 2";
$rezult = $connect->getInfPDO()->query($sql9);

while ($rows = $rezult->fetch(PDO::FETCH_ASSOC)){
    print_r($rows['id_dog'] . ") " . $rows['nickname'] . ", " .
$rows['breed'] . " " . $rows['age'] . " год<br>");
}
?>
<hr>
<?php
$sql10 = "SELECT * FROM dogs WHERE nickname = 'Бобик'";
$rezult = $connect->getInfPDO()->query($sql10);

while ($rows = $rezult->fetch(PDO::FETCH_ASSOC)){
    print_r($rows['age'] . " года<br>");
}
?>
<hr>
<?php
$sql11 = "SELECT * FROM dogs WHERE breed = 'Американский кокер спаниель'";
$rezult = $connect->getInfPDO()->query($sql11);

while ($rows = $rezult->fetch(PDO::FETCH_ASSOC)){
    print_r($rows['id_dog'] . ") " . $rows['nickname'] . ", " .
$rows['breed'] . " " . $rows['age'] . " год<br>");
}
?>
<hr>
<?php
$sql12 = "SELECT COUNT(*) AS 'col' FROM dogs WHERE breed = 'Бигль'";
$rezult = $connect->getInfPDO()->query($sql12);

while ($rows = $rezult->fetch(PDO::FETCH_ASSOC)){
    print_r($rows['nickname'] . " " .$rows['col'] . " Собак <br>");
}
?>
<?php
$sql12 = "SELECT * FROM dogs WHERE breed = 'Бигль'";
$rezult = $connect->getInfPDO()->query($sql12);

while ($rows = $rezult->fetch(PDO::FETCH_ASSOC)){
    print_r($rows['nickname'] . "<br>");
}
?>
<hr>
<?php
$sql12 = "SELECT breed FROM dogs WHERE age = 3 AND owner = 'Смирнов Е.Т.'";
$rezult = $connect->getInfPDO()->query($sql12);

while ($rows = $rezult->fetch(PDO::FETCH_ASSOC)) {
    echo "Порода собаки принадлежащая Смирнову: ".$rows['breed'];
}
?>
<hr>
<?php
$sql13 = "SELECT nickname FROM dogs WHERE age = 2 AND owner = 'Воронина М.И.'";
$rezult = $connect->getInfPDO()->query($sql13);

while ($rows = $rezult->fetch(PDO::FETCH_ASSOC)) {
    echo "Кличка собаки принадлежащая Ворониной: ".$rows['nickname'];
}
?>
<hr>
<?php
$sql14 = "SELECT owner, age FROM dogs WHERE age=(SELECT max(age) FROM dogs)";
$rezult = $connect->getInfPDO()->query($sql14);

while ($rows = $rezult->fetch(PDO::FETCH_ASSOC)) {
    echo " Владелец самой старой собаки ".$rows['owner'];
}
?>
<hr>

<table>
    <tr><th>Владелец</th><th>Кол-во собак</th></tr>
<?php
$sql14 = 'SELECT owner, count(id_dog) as colvo FROM dogs GROUP BY owner';
$rezult = $connect->getInfPDO()->query($sql14);
while( $rows = $rezult->fetch(PDO::FETCH_ASSOC)){
    ?>
    <tr><td style="border: 1px solid black;"><?= $rows['owner']; ?></td>
    <td style="border: 1px solid black;"><?= $rows['colvo'];?></td></tr>
<?php
}
?>
</table>
<hr>

<table>
    <tr><th>Порода</th><th>Кол-во собак</th></tr>
<?php
$sql15 = 'SELECT breed, count(breed) as colvo FROM dogs GROUP BY breed ORDER BY colvo DESC';
$rezult = $connect->getInfPDO()->query($sql15);tablDogs
while( $rows = $rezult->fetch(PDO::FETCH_ASSOC)){
    ?>
    <tr><td style="border: 1px solid black;"><?= $rows['breed']; ?></td>
    <td style="border: 1px solid black;"><?= $rows['colvo'];?></td></tr>
<?php
}
?>
</table>
<hr>
<table border="1px">
    <tr>
        <th style="border: 1px solid black;">Владелец</th>
        <th style="border: 1px solid black;">Кличка</th>
        <th style="border: 1px solid black;">Порода</th>
        <th style="border: 1px solid black;">Возраст</th>
        <th style="border: 1px solid black;">Владелец</th>
        <th style="border: 1px solid black;">Фото</th>
    </tr>

    <?php
    $tablDogs = $dog->getAll();
    $rows = $tablDogs->fetchall();
    foreach($rows as $arry)
    {
echo "<tr><td>" . $arry['id_dog'] . "</td>
<td>" . $arry['nickname'] . "</td>
<td>" . $arry['breed'] . "</td>
<td>" . $arry['age'] . "</td>
<td>" . $arry['owner'] . "</td>
<td align='center'>
<img src='".$arry['image']."' width='120px'></td></tr> ";
    }

echo "</table>";
?>
<hr>

<h1>Наш клуб</h1>

<a href="page3.php">Сортировка</a>
<h1 class="poiskh">Поисковики</h1>
    <div class="poisk">
        <a class="href1" href="page1.php">
            <div class="pag1">
            Выбор карточки по номеру
            </div>
        </a>
        <a class="href2" href="page2.php">
            <div class="pag2">
            Выбор породы
            </div>
        </a>
    </div>

<div class="container">
    <style></style>
    <?php
foreach($rows as $arry)
    {
?>


<div class="cards">

<h4>Карточка № <?=$arry['id_dog']?></h4>
<hr>
<h4>Кличка: <?= $arry['nickname']?></h4>
<img src="<?=$arry['image']?>" class="card_img" >
<h4><a href="pagecard.php?part=<?=$arry['id_dog']?>">Далее</a></h4>
</div>

<?php
    }
?>
</div>






</body>
</html>
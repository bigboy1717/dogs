<style>
    img{
        width: 400px;
        height: 300px;
        border-radius: 15px;
        box-shadow: 3px 3px 3px 3px blue;
    }
    body, input, button, a{
        background-color: darkcyan;
        color: white;
        font-size: 30px;
        text-decoration: none;
    }
</style>
<?php
require_once '../classec/DbConnect.php';
require_once '../classec/Dog.php';

$connect = new DbConnect();
$db=$connect->connect_pdo();

$dog=new Dog($db)
?>
<h1>Клуб любителей собак: 'Белка и стрелка'</h1>
<form action="" method='get'>
    <input type="number" name='numb' maxlength="2" onkeydown="return checkKey(event.key)">
    <script>
        function checkKey(key)
        {
            return (key >= '1' && key <= '9') || key=='ArrowLeft'
             || key == 'ArrowRight' || key=='Delete' || key == 'Backspace';
        }
    </script>
    <button type='submit' name='submit'>ЛЕСГОУ</button>
</form>
<?php
if(isset($_GET['submit']))
{
    $dogid = $_GET['numb'];
    $sql1="SELECT * FROM dogs WHERE id_dog = $dogid ";
    $rezult = $connect->getInfPDO()->query($sql1);

    while($rows = $rezult->fetch(PDO::FETCH_ASSOC)){
        print_r ("<div><img src='../".$rows['image']."' alt=''></div>");
        print_r("<div id='innercard'><p>Карточка № ". $rows['id_dog']. "<p>Кличка: ". $rows['nickname'] . "<br><p>Порода: ". $rows['breed'] . "<br><p>Лет: ". $rows['age'] . "<br><br>");
    }
}
echo "<a href='/index.php#pageGL'>Назад</a></div>";
?>
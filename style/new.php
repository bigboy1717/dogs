<style>
    img{
        width: 150px;
        height: 100px;
        border-radius: 15px;
        box-shadow: 3px 3px 3px 3px blue;
    }
    body, select, button, a, p, td, tr{
        background-color: darkcyan;
        color: white;
        font-size: 30px;
        text-decoration: none;
    }
</style>
<head><link rel="stylesheet" href="style.css"></head>
<?php
require_once '../classec/DbConnect.php';
require_once '../classec/Dog.php';

$connect = new DbConnect();
$db=$connect->connect_pdo();

$dog=new Dog($db);
?>
<form action='' enctype="multipart/form-data" class='flx' method='post'>
    <?php
    print_r("
    <label for='name'>Имя собаки</label>
    <input type='text' name='nickname' value=''>
    <label for='breed'>Порода собаки</label>
    <input type='text' name='breed' value=''>
    <label for='age'>Возраст собаки</label>
    <input type='text' name='age' value=''>
    <label for='owner'>Хозяин собаки</label>
    <input type='text' name='owner' value=''>
    <input type='file' accept='image/*' name='file'>");
    $name = $_POST['name'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $owner = $_POST['owner'];
    $image = "../img/". $_FILES['file']['name'];
    ?>
    <button name='submit'>Гоу</button>
    <?php
    if(isset($_POST['submit']))
    {
        move_uploaded_file(
            $_FILES['file']['tmp_name'],$image);
        $sql1="INSERT INTO `dogs`(`name`, `breed`, `age`, `owner`, `image`) VALUES ('$name','$breed','$age','$owner','$image')";
        $rezult = $connect->getInfPDO()->query($sql1);
    }
    ?>
</form>
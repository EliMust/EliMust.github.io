<?php require 'structure/contacts.php';?>

<?php
require_once './functions/connect.php';
$main = $pdo->prepare('SELECT * FROM header'); //подготовка
$main->execute(); //сам запрос
$result = $main->fetch(PDO::FETCH_OBJ);
?>

<div class="intro-section" style="background-image: url('/admin/image/<?php echo $result->filename?>');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 mx-auto text-center" data-aos="fade-up">
                <h1>
                    <?php echo $result->name?>
                </h1>
            </div>
        </div>
    </div>
</div>

<?php require 'structure/services.php';?>
<?php require 'structure/about.php';?>
<?php require 'structure/footer.php';?>


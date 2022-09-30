<?php
require_once './functions/connect.php';
$desc = $pdo->prepare('SELECT * FROM service'); //подготовка
$desc->execute(); //сам запрос
$services = $desc->fetchAll(PDO::FETCH_OBJ);
?>

<div class="site-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center">
                <h3 style="color: black">Наши услуги</h3>
            </div>
        </div>

        <div class="row">

            <?php foreach($services as $service):?>

            <div class="col-lg-3 col-md-6 mb-lg-0">
                <div class="person">
                    <figure>
                        <img src="/admin/image/<?php echo $service->filename?>" alt="Image" class="img-fluid">
                    </figure>

                    <div class="person-contents">
                        <h3 style="font-size: 24px">
                            <?php echo $service->title?>
                        </h3>
                        <span style="color: red;font-weight: bold">
                            <?php echo $service->price?>
                        </span>
                    </div>
                </div>
            </div>

            <?php endforeach;?>

        </div>
    </div>
</div>
<?php
require_once './functions/connect.php';

$sql = $pdo->prepare('SELECT * FROM contact'); //подготовка
$sql->execute(); //сам запрос
$res = $sql->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="<?php echo $res['description']?>">

    <title><?php echo $res['title']?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<div class="site-wrap">
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>

        <div class="site-mobile-menu-body"></div>
    </div>

    <div class="header-top bg-light">
        <div class="container">
            <div class="row align-items-center" style="flex-wrap: nowrap">
                <div class="col-6 col-lg-3">
                    <a href="index.php" style="color: black;">
                         <span style="font-family: 'Comic Sans MS'">PROдвижение</span>
                    </a>
                </div>

                <div class="col-lg-3 d-none d-lg-block">
                    <div class="quick-contact-icons d-flex">
                        <div class="text">
                            <span class="h4 d-block">
                                <?php echo $res['city']?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 d-none d-lg-block">
                    <div class="quick-contact-icons d-flex">
                        <div class="text">
                            <span class="h4 d-block">
                                <a href="tel:<?php echo $res['phone']?>" style="color: black">
                                 <?php echo $res['phone']?>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 d-none d-lg-block">
                    <div class="quick-contact-icons d-flex">
                        <div class="text">
                            <span class="h4 d-block">
                                <a href="mailto:<?php echo $res['email']?>" style="color: black">
                                  <?php echo $res['email']?>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 d-none d-lg-block">
                    <a href="/login.php" style="font-family: Oswald, sans-serif; font-size: 20px; color: #000">
                        Править
                    </a>
                </div>


                <div class="col-6 d-block d-lg-none text-right">
                    <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black">
                        <span class="icon-menu h3"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
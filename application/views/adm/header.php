<?php error_reporting(E_ERROR | E_PARSE);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMINISTRADOR - Renova Livros</title>
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Owl Carousel CSS -->
    <link href="<?= base_url() ?>assets/css/owl.carousel.css" rel="stylesheet">
    <!-- Owl Carousel CSS -->
    <link href="<?= base_url() ?>assets/css/new-slider.css" rel="stylesheet">
    <!-- Pretty Photo CSS -->
    <link href="<?= base_url() ?>assets/css/prettyPhoto.css" rel="stylesheet">
    <!-- Bx-Slider StyleSheet CSS -->
    <link href="<?= base_url() ?>assets/css/jquery.bxslider.css" rel="stylesheet">
    <!-- Font Awesome StyleSheet CSS -->
    <link href="<?= base_url() ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/svg.css" rel="stylesheet">
    <!-- Widget CSS -->
    <link href="<?= base_url() ?>assets/css/widget.css" rel="stylesheet">
    <!-- Typography CSS -->
    <link href="<?= base_url() ?>assets/css/typography.css" rel="stylesheet">
    <!-- Shortcodes CSS -->
    <link href="<?= base_url() ?>assets/css/shortcodes.css" rel="stylesheet">
    <!-- Custom Main StyleSheet CSS -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
    <!-- Jquery UI CSS -->
    <link href="<?= base_url() ?>assets/css/range-slider.css" rel="stylesheet">
    <!-- Color CSS -->
    <link href="<?= base_url() ?>assets/css/color.css" rel="stylesheet">
    <!-- SELECT MENU -->
    <link href="<?= base_url() ?>assets/css/selectric.css" rel="stylesheet">
    <!-- SIDE MENU -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery.sidr.dark.css">
    <!-- DL Menu CSS -->
    <link href="<?= base_url() ?>assets/js/dl-menu/component.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="<?= base_url() ?>assets/css/responsive.css" rel="stylesheet">
    <!--    Sweet Alert CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">
    <!--Data Table CSS-->
    <link href="<?= base_url() ?>assets/data-table/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/data-table/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!--    Favicon-->
    <link rel="icon" type="image/png" href="<?= base_url()?>assets/images/favicon.png" />

</head>

<body style="background-color: #fafafa;">

<!--Reset Senha-->
<div class="modal fade" id="recupera-senha" tabindex="-1" role="dialog">
    <div class="modal-dialog login1">
        <div class="modal-content">
            <div class="user-box">
                <div class="page-header" style="margin: 0 0 20px">
                    <h3>Perdeu sua Senha ?</h3>
                </div>
                <!--FORM FIELD START-->
                <form id="form-recupera-senha-adm" method="post">
                    <div class="input-dec3">
                        <input class="verifica" type="text" placeholder="E-mail" name="email">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <div class="dialog-footer">
                        <button type="submit" class="dialog-button" type="submit">Entrar</button>
                    </div>
                </form>
                <!--FORM FIELD END-->
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Reset Senha END -->
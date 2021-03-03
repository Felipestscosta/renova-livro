<?php error_reporting(E_ERROR | E_PARSE);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Renova Livro</title>
    <!-- Bootstrap core CSS -->
    <link href="<?= base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Owl Carousel CSS -->
    <link href="<?= base_url()?>assets/css/owl.carousel.css" rel="stylesheet">
    <!-- Owl Carousel CSS -->
    <link href="<?= base_url()?>assets/css/new-slider.css" rel="stylesheet">
    <!-- Pretty Photo CSS -->
    <link href="<?= base_url()?>assets/css/prettyPhoto.css" rel="stylesheet">
    <!-- Bx-Slider StyleSheet CSS -->
    <link href="<?= base_url()?>assets/css/jquery.bxslider.css" rel="stylesheet">
    <!-- Font Awesome StyleSheet CSS -->
    <link href="<?= base_url()?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/css/svg.css" rel="stylesheet">
    <!-- Widget CSS -->
    <link href="<?= base_url()?>assets/css/widget.css" rel="stylesheet">
    <!-- Typography CSS -->
    <link href="<?= base_url()?>assets/css/typography.css" rel="stylesheet">
    <!-- Shortcodes CSS -->
    <link href="<?= base_url()?>assets/css/shortcodes.css" rel="stylesheet">
    <!-- Custom Main StyleSheet CSS -->
    <link href="<?= base_url()?>assets/css/style.css" rel="stylesheet">
    <!-- Jquery UI CSS -->
    <link href="<?= base_url()?>assets/css/range-slider.css" rel="stylesheet">
    <!-- Color CSS -->
    <link href="<?= base_url()?>assets/css/color.css" rel="stylesheet">
    <!-- SELECT MENU -->
    <link href="<?= base_url()?>assets/css/selectric.css" rel="stylesheet">
    <!-- SIDE MENU -->
    <link rel="stylesheet" href="<?= base_url()?>assets/css/jquery.sidr.dark.css">
    <!-- DL Menu CSS -->
    <link href="<?= base_url()?>assets/js/dl-menu/component.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="<?= base_url()?>assets/css/responsive.css" rel="stylesheet">
    <!-- Sweet Alert CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet">
    <!--Icon-->
    <link rel="icon" type="image/png" href="<?= base_url()?>assets/images/favicon.png" />
</head>

<body>
<!--KF KODE WRAPPER WRAP START-->
<div class="kode_wrapper">
    <!-- register Modal -->
    <div class="modal fade" id="reg-box" tabindex="-1" role="dialog">
        <div class="modal-dialog login1 modal-lg" style="margin: 5% auto;">
            <div class="modal-content" style="height: 500px;overflow-y: auto;">
                <div class="page-header" style="margin: 0 0 20px">
                    <h3 class="text-uppercase">Crie sua conta</h3>
                    <small>Preencha os campos abaixo, e começe a sua troca de livros</small>
                </div>
                <div class="user-box">
                    <!--FORM FIELD START-->
                    <?php echo form_open_multipart('usuario/acaoNovoUsuario');?>
                        <fieldset>
                            <legend>Dados Pessoais</legend>
                            <div class="col-md-12">
                                <div class="input-dec3">
                                    <input type="text" placeholder="Digite seu Nome Completo" name="nome">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-dec3">
                                    <input class="telefone" type="text" placeholder="Digite seu Telefone de Contato" name="telefone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-dec3">
                                    <input type="email" placeholder="Digite seu E-mail" name="email">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-dec3">
                                    <input type="password" placeholder="Digite sua Senha" name="senha">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                        </fieldset>
                        <br/>
                        <fieldset>
                            <legend>Endereço <small>Para entregas de livros</small></legend>
                            <div class="col-md-6">
                                <div class="input-dec3">
                                    <input class="cep busca-cep" type="text" placeholder="CEP" name="cep">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <p><a class="cep-link" href="http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm" target="_blank">Não sei meu CEP</a></p>
                            </div>
                            <div class="col-md-9">
                                <div class="input-dec3">
                                    <input id="endereco" type="text" placeholder="Digite sua Rua, Av, Travessa, etc..." name="endereco">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-dec3">
                                    <input type="text" placeholder="Nº" name="numero">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-dec3">
                                    <input type="text" placeholder="Complemento" name="complemento">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="input-dec3">
                                    <input id="bairro" type="text" placeholder="Digite seu Bairro" name="bairro">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="input-dec3">
                                    <input id="cidade" type="text" placeholder="Cidade" name="cidade">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-dec3">
                                    <input id="estado" type="text" placeholder="Estado" name="estado">
                                </div>
                            </div>
                        </fieldset>
                        <hr>
                        <div class="dialog-footer">
                            <button class="dialog-button" type="submit"><i class="fa fa-plus"></i> Criar Conta</button>
                            <button class="dialog-button" data-dismiss="modal" style="background-color: #e74c3c;float:right;"><i class="fa fa-close"></i> Cancelar</button>
                        </div>
                    </form>
                    <!--FORM FIELD END-->
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- register Modal end-->

    <!-- SIGNIN MODEL START -->
    <div class="modal fade" id="signin-box" tabindex="-1" role="dialog">
        <div class="modal-dialog login1">
            <div class="modal-content">
                <div class="user-box">
                    <div class="page-header" style="margin: 0 0 20px">
                        <h3>Acesse sua Conta</h3>
                    </div>
                    <!--FORM FIELD START-->
                    <?php echo form_open_multipart('usuario/loginUsuario/');?>
                    <div class="input-dec3">
                        <input type="text" placeholder="E-mail" name="email">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <div class="input-dec3">
                        <input type="password" placeholder="Senha" name="senha">
                        <i class="fa fa-lock"></i>
                    </div>
                    <div class="dialog-footer">
                        <button class="dialog-button" type="submit">Entrar</button>
                        <a href="javascript:"  data-toggle="modal" data-target="#recupera-senha" class="recupera-senha">Perdeu a senha<i class="fa fa-question-circle"></i></a>
                    </div>
                    </form>
                    <!--FORM FIELD END-->
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- SIGNIN MODEL END -->

    <!--Reset Senha-->
    <div class="modal fade" id="recupera-senha" tabindex="-1" role="dialog">
        <div class="modal-dialog login1">
            <div class="modal-content">
                <div class="user-box">
                    <div class="page-header" style="margin: 0 0 20px">
                        <h3>Perdeu sua Senha ?</h3>
                    </div>
                    <!--FORM FIELD START-->
                    <form id="form-recupera-senha" method="post">
                        <div class="input-dec3">
                            <input type="text" placeholder="E-mail" name="email">
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


    <!-- MODAL SOLICTA LIVRO -->
    <div class="modal fade" id="solicita-livro" tabindex="-1" role="dialog">
        <div class="modal-dialog login1">
            <div class="modal-content">
                <div class="user-box">
                    <div class="page-header" style="margin: 0 0 20px">
                        <h3>Solicite um Livro</h3>
                    </div>

                    <div class="col-md-6">
                        <div class="page-header">
                            <h3>Já tenho Cadastro</h3>
                        </div>
                        <!--FORM FIELD START-->
                        <?php echo form_open_multipart('usuario/loginUsuario/0/1');?>
                        <div class="input-dec3">
                            <input type="text" placeholder="E-mail" name="email">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <div class="input-dec3">
                            <input type="password" placeholder="Senha" name="senha">
                            <i class="fa fa-lock"></i>
                        </div>
                        <div class="dialog-footer">
                            <button class="dialog-button" type="submit">Entrar</button>
                            <a href="javascript:"  data-toggle="modal" data-target="#recupera-senha" class="recupera-senha">Perdeu a senha<i class="fa fa-question-circle"></i></a>
                        </div>
                        </form>
                        <!--FORM FIELD END-->
                    </div>
                    <div class="col-md-6">
                        <div class="page-header">
                            <h3>Não Tenho Cadastro</h3>
                        </div>
                        <button class="btn-3 cadastrar-agora" data-toggle="modal" data-target="#reg-box">Cadastrar Agora!</button>
                    </div>

                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- MODAL SOLICITA  LIVRO -->

    <!--HEADER START-->
    <header class="header-1">

        <!-- Mensagem do sistema -->
        <div class="container text-center">
            <?php if($this->session->flashdata('sucesso')){ ?>
                <div class="col-md-12">
                    <h4 class='alert alert-success clearfix'>
                        <?= $this->session->flashdata('sucesso')?>
                    </h4>
                </div>
            <?php }elseif($this->session->flashdata('erro')){?>
                <div class="col-md-12">
                    <h4 class="alert alert-danger clearfix">
                        <?= $this->session->flashdata('erro')?>
                    </h4>
                </div>
            <?php }?>
        </div>

        <!--TOP BAR START START-->
        <div class="top-bar">
            <div class="container">
                <div class="pull-left">
                    <ul>
                        <li><i class="fa fa-phone"></i><a href="#">Fale conosco: (83) 99911-4106</a></li>
                        <li><i class="fa fa-envelope"></i><a href="#">jpwdsf1968@gmail.com</a></li>
                    </ul>
                </div>
                <div class="pull-right">
                    <div class="user-wrap">

                        <?php if($this->session->userdata('usuario_session')) {?>
                        <div class="user-dec">
                            <i class="fa fa-sign-in"></i>
                            <a href="<?= base_url('usuario/home')?>" >Voltar a Minha Conta</a>
                            <a href="<?= base_url('autentica/logoutUsuario')?>" style="color: red;">Sair</a>
                        </div>
                        <?php }else{ ?>
                            <div class="user-dec">
                                <i class="fa fa-sign-in"></i>
                                <a href="#" data-toggle="modal" data-target="#signin-box">Entrar</a>
                                <a href="#" data-toggle="modal" data-target="#reg-box">Registrar</a>
                            </div>
                        <?php }?>
                    </div>
                    <ul class="social-1">
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--TOP BAR END-->
        <!--LOGO WRAP START-->
        <div class="logo-wrap">
            <div class="container">
                <!--LOGO DEC START-->
                <div class="logo-dec" style="width: 20%;">
                    <a href="<?= base_url()?>"><img src="<?= base_url()?>assets/images/esboco3.png" alt="" /></a>
                </div>
                <!--LOGO DEC END-->
                <!--SEARCH WRAP START-->
                <div class="searh-wrap">
                    <ul class="tags-1"> </ul>
                    <form action="<?= base_url('site/pesquisa')?>" method="get">
                        <div class="text-filed-1">
                            <input type="text" name="titulo" placeholder="Qual livro você gostaria de ter ?">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <!--SEARCH WRAP END-->
                <!--CART WRAP START-->
                <div class="cart-wrap">

                    <!--DL Menu Start-->
                    <div id="kode-responsive-navigation" class="dl-menuwrapper">
                        <button class="dl-trigger">Open Menu</button>
                        <ul class="dl-menu">
                            <li><a href="<?= base_url()?>">Home</a></li>
                            <li class="menu-item kode-parent-menu"><a href="#">Sobre</a></li>
<!--                            <li class="menu-item kode-parent-menu"><a href="about-author.html">about author</a></li>-->
<!--                            <li class="menu-item kode-parent-menu"><a href="#">products</a></li>-->
                            <li><a href="contact-us.html">Contato</a></li>
                        </ul>
                    </div>
                    <!--DL Menu END-->
                    <a href="#" title="Minhas solicitações"> <i class="fa fa-truck"></i></a>
<!--                    <div class="cart">-->
<!--                        <div class="show2">-->
<!--                            <i class="icon-shopping-cart"></i>-->
<!--                            <small>2</small>-->
<!--                        </div>-->
<!--                        <div class="cart-form">-->
<!--                            <ul>-->
<!--                                <li>-->
<!--                                    <div class="thumb">-->
<!--                                        <a href="#"><img src="assets/extra-images/cart.jpg" alt=""></a>-->
<!--                                    </div>-->
<!--                                    <div class="text">-->
<!--                                        <span>Book Name</span>-->
<!--                                        <p>1 x $59.00</p>-->
<!--                                        <a class="closed" href="#">x</a>-->
<!--                                    </div>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <div class="thumb">-->
<!--                                        <a href="#"><img src="assets/extra-images/cart.jpg" alt=""></a>-->
<!--                                    </div>-->
<!--                                    <div class="text">-->
<!--                                        <span>Book Name</span>-->
<!--                                        <p>1 x $59.00</p>-->
<!--                                        <a class="closed" href="#">x</a>-->
<!--                                    </div>-->
<!--                                </li>-->
<!--                                <li>-->
<!--                                    <div class="thumb">-->
<!--                                        <a href="#"><img src="assets/extra-images/cart.jpg" alt=""></a>-->
<!--                                    </div>-->
<!--                                    <div class="text">-->
<!--                                        <span>Book Name</span>-->
<!--                                        <p>1 x $59.00</p>-->
<!--                                        <a class="closed" href="#">x</a>-->
<!--                                    </div>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                            <div class="cart-footer">-->
<!--                                <a class="ad-cart" href="#"><i class="fa fa-cart-arrow-down"></i>View Cart</a>-->
<!--                                <a class="cart-chekout" href="#"><i class="fa fa-mail-forward"></i>checkout</a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
                <!--CART WRAP END-->
            </div>
        </div>
        <!--LOGO WRAP END-->
        <!--NAVIGATION WRAP START-->
        <div class="container">
            <div class="navigation-wrap">
                <!--NAVIGATION DEC START-->
                <ul class="nav-dec">
                    <li>
                        <a href="<?= base_url()?>">Home</a>
                    </li>
                    <li>
                        <a href="<?= base_url('site/quemSomos')?>">Quem Somos</a>
                    </li>
                    <li>
                        <a href="<?= base_url('site/faleConosco')?>">Fale Conosco</a>
                    </li>
                </ul>
                <!--NAVIGATION DEC END-->
            </div>
        </div>
        <!--NAVIGATION WRAP END-->
    </header>
    <!--HEADER END-->
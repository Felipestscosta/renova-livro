<header class="header-1">
    <!--TOP BAR START START-->
    <div class="top-bar">
        <div class="container">
            <div class="pull-left">
                <ul>
                    <li><h3><i class="fa fa-user"></i><a href="#">Bem vindo - <?= $this->session->userdata('adm_session')['nome']?></a></h3></li>
                </ul>
            </div>
            <div class="pull-right">
                <a class="btn-3 sm-btn3" href="<?= base_url('autentica/logout')?>">Sair do Sistema</a>
            </div>
        </div>
    </div>
    <!--TOP BAR END-->

    <!--NAVIGATION WRAP START-->
    <div class="container">
        <div class="navigation-wrap">
            <!--NAVIGATION DEC START-->
            <ul class="nav-dec">
<!--                <li>-->
<!--                    <a href="index-2.html">HOME</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="blog-classic.html">blog</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="#">pages</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="#">book detail</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="about-author.html">Author</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="404.html">404</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="contact-us.html">Contact Us</a>-->
<!--                </li>-->
            </ul>
            <!--NAVIGATION DEC END-->
        </div>
    </div>
    <!--NAVIGATION WRAP END-->

    <!--    CONTEUDO-->
    <div class="container p-30">

        <div class="row">
            <div class="col-md-12">
                <?php if($this->session->flashdata('sucesso')){ ?>
                    <div class="col-md-12">
                        <h4 class='alert alert-success clearfix'>
                            <?= $this->session->flashdata('sucesso')?>
                        </h4>
                    </div>
                <?php }elseif($this->session->flashdata('erro')){?>
                    <div class="col-md-12">
                        <h2 class="alert alert-danger clearfix">
                            <?= $this->session->flashdata('erro')?>
                        </h2>
                    </div>
                <?php }?>
            </div>
        </div>

        <!-- USUARIOS-->
        <div class="col-md-12 box">
            <div class="widget-hd">
                <h3><i class="fa fa-users fa-lg"></i> Usuários</h3>
                <div class="pull-right">
                    <button class="btn-3 sm-btn3 view-novo-usuario"><i class="fa fa-plus"></i> Novo Usuário</button>
                </div>
            </div>
            <p><b>N° Total: </b><?= count($this->Acoes->findAll('usuarios'))?></b></p>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($usuarios as $chave => $usuario){?>
                    <tr>
                        <td><?= $usuario->nome?></td>
                        <td width="210px;"><button class="btn-3 sm-btn3 view-edita-usuario" data-id="<?= $usuario->id?>"><i class="fa fa-pencil"></i> Editar</button><button data-id="<?= $usuario->id?>" class="btn-3 sm-btn3 btn-3-danger delete-usuario"><i class="fa fa-trash-o"></i> Deletar</button></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>


        <!-- CATEGORIAS DOS LIVROS-->
        <div class="col-md-12 box">
            <div class="widget-hd">
                <h3><i class="fa fa-bars fa-lg"></i> CAGEGORIAS</h3>
                <div class="pull-right">
                    <button class="btn-3 sm-btn3 view-nova-categoria"><i class="fa fa-plus"></i> Nova Categoria</button>
                </div>
            </div>
            <table class="data-table">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($categorias as $chave => $valor){ ?>
                    <tr>
                        <td><?= $valor->nome?></td>
                        <td width="250px;"><button class="btn-3 sm-btn3 view-edita-categoria" data-id="<?= $valor->id ?>"><i class="fa fa-pencil fa-lg"></i> Editar</button><button data-id="<?= $valor->id?>" class="btn-3-danger sm-btn3 deleta-categoria"><i class="fa fa-trash-o fa-lg"></i> Deletar</button></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>

        <!-- LIVROS-->
        <div class="col-md-12 box">
            <div class="widget-hd">
                <h3><i class="fa fa-book fa-lg"></i> Livros</h3>
            </div>
            <p><b>N° Total: </b><?= count($this->Acoes->findAll('livros'))?></b></p>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>ISBN</th>
                        <th>Título</th>
                        <th>Anunciante</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($livros as $chave => $valor){ ?>
                    <tr>
                        <td style="width: 150px;"><div class="col-md-6 col-centered"><img src="<?=base_url('assets/uploads/'.$valor->imagem.'')?>" /></div></td>
                        <td><?= $valor->isbn?></td>
                        <td><?= $valor->titulo?></td>
                        <td><?= $valor->nome_usuarios?></td>
                        <td width="250px;"><button class="btn-3 sm-btn3 view-edita-livro" data-id="<?= $valor->id_livros ?>"><i class="fa fa-pencil fa-lg"></i> Editar</button><button data-id="<?= $valor->id_livros?>"  class="btn-3-danger sm-btn3 delete-livro"><i class="fa fa-trash-o fa-lg"></i> Deletar</button></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>

        <!-- NEWSLETTER-->
        <div class="col-md-12 box">
            <div class="widget-hd">
                <h3><i class="fa fa-envelope-o fa-lg"></i> Newsletter <small>(E-mails para mailing de Mail Marketing)</small></h3>
            </div>
            <p><b>N° Total: </b><?= count($this->Acoes->findAll('newsletter'))?></b></p>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($newsletter as $chave => $valor){ ?>
                    <tr>
                        <td><?= $valor->email?></td>
                        <td width="250px;"><button data-id="<?= $valor->id?>"  class="btn-3-danger sm-btn3 delete-email"><i class="fa fa-trash-o fa-lg"></i> Deletar</button></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>


    </div>
    <!--  FIM  CONTEUDO-->
</header>
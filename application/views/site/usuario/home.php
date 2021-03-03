<header class="header-4 header-4-2 header-4-3">
    <!--TOP BAR START START-->
    <div class="top-bar">
        <div class="container">
                <div class="col-md-4 minha-conta text-uppercase">
                    <p> <?= word_limiter($usuario->nome, 2)?> | <a href="javascript:" class="view-edita-dados" data-id="<?= $this->session->userdata('usuario_session')['id']?>"><i class="fa fa-gear fa-x1"></i> Minha Conta</a></p>
                </div>
                <div class="col-md-4 text-center text-uppercase">
                    <p style="color: #fff;">Você Tem <span style="color: #3498db;"><?= $usuario->pontos?></span> Pontos</p>
                </div>
            <div class="col-md-4">
                <div class="pull-right minha-conta">
                    <p><a class=" text-uppercase" href="<?= base_url('site/index')?>"> Voltar ao Site |</a>
                    <a class="text-uppercase" href="<?= base_url('autentica/logoutUsuario')?>">Sair <i class="fa fa-sign-out fa-lg"></i></a></p>
                </div>
            </div>
        </div>
    </div>
    <!--TOP BAR END-->

    <!--LOGO WRAP START-->
    <div class="logo-wrap">
        <div class="container">
            <!--LOGO DEC START-->
            <div class="logo-dec">
                <div class="col-md-3 col-centered">
                    <a href="<?=base_url()?>"><img  src="<?= base_url()?>assets/images/esboco3.png"alt=""/></a>
                </div>
            </div>
            <!--LOGO DEC END-->
        </div>
    </div>
    <!--LOGO WRAP END-->

    <!--Conteúdo-->
    <div class="container p-30">
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
        <div class="col-md-12">
            <div class="page-header">
                <h3>
                    <i class="fa fa-book fa-lg"></i> | QUEM SOLICITOU MEUS LIVROS ?
                </h3>
                <p><small>Lista de quem realizou solicitação dos meus livros</small></p>
            </div>
            <table class="table table-responsive table-striped data-table">
                <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Solicitante</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($me_solicitado as $chave => $valor){ ?>
                    <?php if($me_livro[$chave]){?>
                    <tr>
                        <td style="width: 30px;">
                            <div class="col-md-12 col-centered">
                                <img src="<?=base_url('assets/uploads/'.$me_livro[$chave][0]->imagem.'')?>" width="80px;" />
                            </div>
                        </td>
                        <td><?= $me_solicitante[$chave][0]->nome?></td>
                        <td>
                            <?= ($valor->status === 'enviado') ? '<span style="color: green;font-weight: 600;text-transform: uppercase">'.$valor->status.'</span>' : '<span style="color: orange;text-transform: capitalize">'.$valor->status.'</span>'?>
                        </td>
                        <td width="200px;">
                            <?php if($me_solicitado[$chave]->status == 'Aguardando Envio'){?>
                                <button data-id="<?= $valor->id?>" class="btn-3 sm-btn3 confirma-entrega">
                                    <i class="fa fa-check fa-lg"></i> Confirmar Envio
                                </button>
                            <?php }elseif ($me_solicitado[$chave]->status == 'entregue'){?>
                                <div style="line-height: 25px;">
                                    <b>
                                        <small>As informações desta solicitação será excluída automáticamente</small>
                                    </b>
                                </div>
                            <?php }?>

                        </td>
                    </tr>
                    <?php }?>
                <?php }?>
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
        <div class="col-md-12">
            <div class="page-header">
                <h3>
                    <i class="fa fa-book fa-lg"></i> | MEUS LIVROS CADASTRADOS
                    <div class="pull-right">
                        <button class="btn-3 sm-btn3" id="view-novo-livro"><i class="fa fa-plus fa-lg"></i> <span class="hidden-xs">Disponibilizar Novo Livro</span></button>
                    </div>
                </h3>
                <p><small>Lista dos livros que eu cadastrei</small></p>
            </div>
            <table class="table table-responsive table-striped data-table">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Ano</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($livros as $chave => $valor){ ?>
                        <tr>
                            <td style="width: 30px;"><div class="col-md-12 col-centered"><img src="<?=base_url('assets/uploads/'.$valor->imagem.'')?>" /></div></td>
                            <td><?= $valor->titulo?></td>
                            <td><?= $valor->autor?></td>
                            <td><?= $valor->ano?></td>
                            <td width="250px;"><button class="btn-3 sm-btn3 view-edita-livro" data-id="<?= $valor->id ?>"><i class="fa fa-pencil fa-lg"></i> Editar</button><button data-id="<?= $valor->id?>"  class="btn-3-danger sm-btn3 deleta-livro"><i class="fa fa-trash-o fa-lg"></i> Deletar</button></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
        <div class="col-md-12">
            <div class="page-header">
                <h3><i class="fa fa-handshake-o fa-lg"></i> | LIVROS QUE SOLICITEI</h3>
                <p><small>Lista de livros que solicitei</small></p>
            </div>
            <table class="table table-responsive table-striped data-table">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Livro</th>
                        <th>Proprietário</th>
                        <th>Situação</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(!empty($solicitado)){?>
                    <?php foreach($solicitado as $chave => $valor){ ?>
                        <?php if ($livro_solicitado[$chave]){?>
                        <tr>
                            <td><img src="<?=base_url('assets/uploads/'.$livro_solicitado[$chave][0]->imagem.'')?>" width="80px;" /></td>
                            <td><?= $livro_solicitado[$chave][0]->titulo?></td>
                            <td><?= $solicitado[$chave][0]->nome?></td>
                            <td>
                                <?php if($solicitacoes[$chave]->status === 'Aguardando Envio'){?>
                                    <span style="color: coral"><?= $solicitacoes[$chave]->status?></span>
                                <?php }elseif ($solicitacoes[$chave]->status === 'enviado'){?>
                                    <div style="line-height: 25px">
                                        <span style="color: green;font-weight: 600;text-transform: uppercase"><?= $solicitacoes[$chave]->status?></span>
                                        <br>
                                        <small>Cód. Rastreio: ( <b><?= $solicitacoes[$chave]->cod_rastreio?></b> )</small>
                                        <br>
                                        <a href="http://www2.correios.com.br/sistemas/rastreamento/" target="_blank">consultar</a>
                                    </div>
                                <?php }elseif($solicitacoes[$chave]->status === 'entregue'){?>
                                    <span style="color: green"> Solicitação Concluida</span>
                                <?php }?>
                            </td>
                            <td width="180">
                                <?php if($solicitacoes[$chave]->status === 'enviado'){?>
                                    <a href="<?= base_url('usuario/finalizaSolicitacao/'.$solicitado[$chave][0]->id.'/'.$solicitacoes[$chave]->id.'/'.$livro_solicitado[$chave][0]->id) ?>" class="btn-3 sm-btn3">
                                        Confirmar Recebimento
                                    </a>
                                <?php }elseif($solicitacoes[$chave]->status === 'entregue'){?>
                                    <div style="line-height: 25px;">
                                        <b>
                                            <small>As informações desta <br> solicitação será excluída <br> automáticamente</small>
                                        </b>
                                    </div>
                                <?php }else{?>
                                    <a href="<?= base_url('usuario/cancelaSolicitacao/'.$solicitacoes[$chave]->id.'/'.$livro_solicitado[$chave][0]->id)?>" class="btn-3-danger sm-btn3"><i class="fa fa-trash-o fa-lg"></i>
                                        Cancelar
                                    </a>
                                <?php }?>
                            </td>
                        </tr>
                        <?php }?>
                    <?php }?>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <!--FIM CONTEÚDO-->

</header>
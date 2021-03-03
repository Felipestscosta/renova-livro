<div class="inner-banner">
    <div class="container">
        <div class="inner-banner-dec">
            <h5>Resultados para sua Pesquisa:</h5>
            <div class="clear"></div>
            <span><?= ($string_pesquisada) ? urldecode($string_pesquisada) : 'Ops... Pesquisa Vazia.'?></span>
            <div class="clear"></div>
            <ol class="breadcrumb">
                <li><a href="<?= base_url()?>">Página Inicial</a></li>
                <li><a href="javascript:">Categoria</a></li>
                <li class="active"><?= ($string_pesquisada) ? urldecode($string_pesquisada) : 'Ops... Pesquisa Vazia.'?></li>
            </ol>
        </div>
        <div class="thumb">
            <img src="<?= base_url()?>assets/images/inner-banner1.png" alt="">
        </div>
    </div>
</div>

<div class="kf_content_wrap">

    <!--GRID 4 WRAP START-->
    <div class="grid-4">
        <div class="grid3-page">
            <div class="container">
                <div class="row">
                    <!--ASIDE BAR WRAP START-->
                    <aside class="col-md-3">
                        <!--WIDGET CATEGORIES WRAP START-->
                        <div class="widget widget-categories">
                            <!--WIDGET CATEGORIES WRAP START-->
                            <div class="widget widget-pub-fillter">
                                <!--WIDGET HEADING START-->
                                <div class="aside-widget-hd">
                                    <h5>CATEGORIAS</h5>
                                </div>
                                <!--WIDGET HEADING END-->
                                <div class="widget-padding">
                                    <ul>
                                        <?php foreach($categorias as $categoria){?>
                                            <li><a href="<?= base_url('site/busca/'.$categoria->id.'/'.$categoria->nome.'')?>"><?= $categoria->nome?> <!--<span>389</span>--></a></li>
                                        <?php }?>
                                    </ul>
                                </div>
                            </div>
                            <!--WIDGET CATEGORIES WRAP END-->
                        </div>

                    </aside>
                    <!--ASIDE BAR WRAP END-->
                    <div class="col-md-9">
                        <!--FILLTER WRAP START-->
                        <!--                        <div class="fillter-wrap">-->
                        <!--                            <div class="row">-->
                        <!--                                <div class="col-md-4">-->
                        <!--                                    <div class="slectric-dec">-->
                        <!--                                        <span>Sort by:</span>-->
                        <!--                                        <select>-->
                        <!--                                            <option value="1">Default Sorting</option>-->
                        <!--                                            <option value="9">novel</option>-->
                        <!--                                            <option value="2">books</option>-->
                        <!--                                            <option value="3">Select 4</option>-->
                        <!--                                            <option value="6">Select 5</option>-->
                        <!--                                            <option value="8">Select 6</option>-->
                        <!--                                        </select>-->
                        <!--                                    </div>-->
                        <!--                                </div>-->
                        <!--                                <div class="col-md-4">-->
                        <!--                                    <div class="slectric-dec">-->
                        <!--                                        <span>Show by:</span>-->
                        <!--                                        <select>-->
                        <!--                                            <option value="1"> 12 Items Per Page</option>-->
                        <!--                                            <option value="9">novel</option>-->
                        <!--                                            <option value="2">books</option>-->
                        <!--                                            <option value="3">Select 4</option>-->
                        <!--                                            <option value="6">Select 5</option>-->
                        <!--                                            <option value="8">Select 6</option>-->
                        <!--                                        </select>-->
                        <!--                                    </div>-->
                        <!--                                </div>-->
                        <!--                                <div class="col-md-4">-->
                        <!--                                    <div class="tab-dec">-->
                        <!--                                        <ul class="nav nav-tabs" role="tablist">-->
                        <!--                                            <li role="presentation" class="active">-->
                        <!--                                                <a href="#">-->
                        <!--                                                    <i class="fa fa-th-large"></i>-->
                        <!--                                                </a>-->
                        <!--                                            </li>-->
                        <!--                                            <li role="presentation">-->
                        <!--                                                <a href="#">-->
                        <!--                                                    <i class="fa fa-th-list"></i>-->
                        <!--                                                </a>-->
                        <!--                                            </li>-->
                        <!--                                        </ul>-->
                        <!--                                    </div>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--FILLTER WRAP END-->
                        <div class="blog-grid3">
                            <div class="row">
                                <?php if($livros) {?>
                                    <?php foreach($livros as $livro) {?>
                                        <?php if($livro->status != 'indisponivel') {?>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="book-tab-dec">
                                                <a href="<?= base_url('site/detalhes/'.$livro->id.'')?>">
                                                    <figure>
                                                        <img src="<?= base_url('assets/timthumb/index.php?src=')?><?= base_url('assets/uploads/'.$livro->imagem.'&q=100&w=262&h=342&zc=2')?>" alt=""/>
                                                    </figure>
                                                </a>
                                                <div class="text">
<!--                                                    <small>--><?//= $livro->nome_categorias?><!--</small>-->
                                                    <h5><a href="#"><?= $livro->titulo?></a></h5>
                                                    <span class="price-tag green">
                                                        <sub>Disponível</sub>
                                                    </span>
                                                    <?php if($this->session->userdata('usuario_session')){?>
                                                        <a class="btn-3 lg-btn3 view-solicita-livro"  href="javascript:"  data-nome="<?= $livro->titulo?>" data-solicitante="<?= $this->session->userdata('usuario_session')['id']?>" data-solicitado="<?= $livro->usuario_livro ?>" data-livro="<?= $livro->id?>" data-datasolicitacao="<?= date('Y-m-d h:m:s')?>" data-status="Aguardando Envio">Solicitar</a>
                                                    <?php }else{ ?>
                                                        <a class="btn-3 lg-btn3" data-toggle="modal" data-target="#solicita-livro">Solicitar</a>
                                                    <?php }?>
                                                    <a class="add-cart" href="<?= base_url('site/detalhes/'.$livro->id.'')?>">Detalhes</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }?>
                                    <?php }?>
                                <?php }else{?>
                                    <div class="heading-3">
                                        <h2>Opss...  Desculpe</h2>
                                        <span>Ainda não temos o  livro com este nome<br/> <br/><small>Tente outro por favor</small></span>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <!--KODDE PAGINATION START-->
                    <div class="col-md-12">
                        <div class="kf-pagination">
                            <ul class="pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
												<span aria-hidden="true">
													<i class="fa fa-angle-left"></i>
												</span>
                                        <small class="page-lable">
                                            Previous
                                        </small>
                                    </a>
                                </li>
                                <li>
                                    <a class="active" href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
												<span aria-hidden="true">
													<i class="fa fa-angle-right"></i>
												</span>
                                        <small class="page-lable">
                                            next
                                        </small>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--KODDE PAGINATION END-->
                </div>
            </div>
        </div>
    </div>
    <!--GRID 4 WRAP END-->
</div>
<div class="main-banner">
        <ul class="bxslider">
            <li>
                <div class="slider-outer">
                    <div class="bx-slider-wrap">
                        <div class="container">
                            <img class="image-1" src="<?= base_url()?>assets/images/slider-1-1.png" alt=""/>
                            <div class="slider-caption">
                                <div class="caption-dec">
                                    <h5>TROQUE SEU LIVRO</h5>
                                    <h3>MUITO  SIMPLES</h3>
                                    <h4>E RÁPIDO</h4>
                                    <h6>TÁ ESPERANDO O QUÊ?</h6>
                                </div>
                                <a href="#">VER LIVROS</a>
                            </div>
                            <img class="image-2" src="<?= base_url()?>assets/images/slider-1-2.png" alt=""/>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="slider-outer">
                    <div class="bx-slider-wrap">
                        <div class="container">
                            <img class="image-1" src="<?= base_url()?>assets/images/slider-1-1.png" alt=""/>
                            <div class="slider-caption">
                                <div class="caption-dec">
                                    <h5>TROQUE SEU LIVRO</h5>
                                    <h3>MUITO  SIMPLES</h3>
                                    <h4>E RÁPIDO</h4>
                                    <h6>TÁ ESPERANDO O QUÊ?</h6>
                                </div>
                                <a href="#">VER LIVROS</a>
                            </div>
                            <img class="image-2" src="<?= base_url()?>assets/images/slider-1-2.png" alt=""/>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="slider-outer">
                    <div class="bx-slider-wrap">
                        <div class="container">
                            <img class="image-1" src="<?= base_url()?>assets/images/slider-1-1.png" alt=""/>
                            <div class="slider-caption">
                                <div class="caption-dec">
                                    <h5>TROQUE SEU LIVRO</h5>
                                    <h3>MUITO  SIMPLES</h3>
                                    <h4>E RÁPIDO</h4>
                                    <h6>TÁ ESPERANDO O QUÊ?</h6>
                                </div>
                                <a href="#">VER LIVROS</a>
                            </div>
                            <img class="image-2" src="<?= base_url()?>assets/images/slider-1-2.png" alt=""/>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <!--CUSTOMER CARE WRAP START-->
    <div class="cstmr-cre-wrap">
        <div class="container">
            <div class="row">
                <!--CUSTOMER CARE DEC START-->
                <div class="col-md-3 col-sm-6">
                    <div class="cstmr-dec">
                        <span class="icon-truck-icon"></span>
                        <div class="text">
                            <h5><a href="#">ENTREGA</a></h5>
                            <p>combinada de forma ,<br/>simples, rápido e fácil</p>
                        </div>
                    </div>
                </div>
                <!--CUSTOMER CARE DEC END-->
                <!--CUSTOMER CARE DEC START-->
                <div class="col-md-3 col-sm-6">
                    <div class="cstmr-dec">
                        <span class="icon-phone-call"></span>
                        <div class="text">
                            <h5><a href="#">CONTATO</a></h5>
                            <p>está com dúvidas? <br/>entre em contato</p>
                        </div>
                    </div>
                </div>
                <!--CUSTOMER CARE DEC END-->
                <!--CUSTOMER CARE DEC START-->
                <div class="col-md-3 col-sm-6">
                    <div class="cstmr-dec">
                        <span class="icon-verification"></span>
                        <div class="text">
                            <h5><a href="#">PONTOS</a></h5>
                            <p>acumele pontos<br/>e solicite seu livro</p>
                        </div>
                    </div>
                </div>
                <!--CUSTOMER CARE DEC END-->
                <!--CUSTOMER CARE DEC START-->
                <div class="col-md-3 col-sm-6">
                    <div class="cstmr-dec">
                        <span class="icon-security"></span>
                        <div class="text">
                            <h5><a href="#">ANUNCIANTE</a></h5>
                            <p>você em contato direto<br/> com o anunciante</p>
                        </div>
                    </div>
                </div>
                <!--CUSTOMER CARE DEC END-->
            </div>
        </div>
    </div>
    <!--CUSTOMER CARE WRAP START-->

<!--Conteúdo-->
<div class="kf_content_wrap">

    <!--GRID 4 WRAP START-->
    <div class="grid-4">
        <div class="grid3-page">
            <div class="container">
                <div class="row">
                    <!--ASIDE BAR WRAP START-->
                    <aside class="col-md-3">
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

                        <!--WIDGET FEATURESD START-->
                        <div class="widget widget-featured" style="display: none;">
                            <!--WIDGET HEADING START-->
                            <div class="aside-widget-hd">
                                <h5>Livros mais trocados</h5>
                            </div>
                            <!--WIDGET HEADING END-->
                            <div class="widget-padding">
                                <!--FEATURED 3 START-->
                                <div class="featured-dec3">
                                    <figure>
                                        <img src="<?= base_url()?>assets/extra-images/widget-featured1.jpg" alt="">
                                    </figure>
                                    <div class="text">
                                        <div class="rating">
                                            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                        </div>
                                        <a href="#">Last Sleep</a>
                                    </div>
                                </div>
                                <!--FEATURED 3 END-->
                                <!--FEATURED 3 START-->
                                <div class="featured-dec3">
                                    <figure>
                                        <img src="<?= base_url()?>assets/extra-images/widget-featured2.jpg" alt="">
                                    </figure>
                                    <div class="text">
                                        <div class="rating">
                                            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                        </div>
                                        <a href="#">Unfriended </a>
                                    </div>
                                </div>
                                <!--FEATURED 3 END-->
                                <!--FEATURED 3 START-->
                                <div class="featured-dec3">
                                    <figure>
                                        <img src="<?= base_url()?>assets/extra-images/widget-featured3.jpg" alt="">
                                    </figure>
                                    <div class="text">
                                        <div class="rating">
                                            <span>☆</span><span>☆</span><span>☆</span><span>☆</span><span>☆</span>
                                        </div>
                                        <a href="#">White Teeth</a>
                                    </div>
                                </div>
                                <!--FEATURED 3 END-->
                            </div>
                        </div>
                        <!--WIDGET FEATURESD END-->
                    </aside>
                    <!--ASIDE BAR WRAP END-->


                    <div class="col-md-9">
                        <!--FILLTER WRAP START-->
                        <div class="fillter-wrap" style="display: none;">
                            <div class="row">
                                <!--SLECTRIC DEC START-->
                                <div class="col-md-4">
                                    <div class="slectric-dec">
                                        <span>Sort by:</span>
                                        <select>
                                            <option value="1">Default Sorting</option>
                                            <option value="9">novel</option>
                                            <option value="2">books</option>
                                            <option value="3">Select 4</option>
                                            <option value="6">Select 5</option>
                                            <option value="8">Select 6</option>
                                        </select>
                                    </div>
                                </div>
                                <!--SLECTRIC DEC END-->
                                <!--SLECTRIC DEC START-->
                                <div class="col-md-4">
                                    <div class="slectric-dec">
                                        <span>Show by:</span>
                                        <select>
                                            <option value="1"> 12 Items Per Page</option>
                                            <option value="9">novel</option>
                                            <option value="2">books</option>
                                            <option value="3">Select 4</option>
                                            <option value="6">Select 5</option>
                                            <option value="8">Select 6</option>
                                        </select>
                                    </div>
                                </div>
                                <!--SLECTRIC DEC END-->
                                <!--TAB DEC START-->
                                <div class="col-md-4">
                                    <div class="tab-dec">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active">
                                                <a href="#">
                                                    <i class="fa fa-th-large"></i>
                                                </a>
                                            </li>
                                            <li role="presentation">
                                                <a href="#">
                                                    <i class="fa fa-th-list"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--TAB DEC END-->
                            </div>
                        </div>
                        <!--GRID DOS LIVROS-->
                        <div class="blog-grid3">
                            <div class="row">
                                <?php foreach($livros as $livro) {?>
                                    <?php if($livro->status != 'indisponivel') {?>
                                    <div class="col-md-4 col-sm-6" style="height: 555px;">
                                        <div class="book-tab-dec">
                                            <a href="<?= base_url('site/detalhes/'.$livro->id_livros.'')?>">
                                                <figure>
                                                    <img src="<?= base_url('assets/timthumb/index.php?src=')?><?= base_url('assets/uploads/'.$livro->imagem.'&q=100&w=262&h=342&zc=2')?>" alt=""/>
                                                </figure>
                                            </a>
                                            <div class="text">
                                                <small><?= $livro->nome_categorias?></small>
                                                <h5><a href="#"><?= $livro->titulo?></a></h5>
                                                <span class="price-tag green">
                                                    <sub><?= $livro->status?></sub>
                                                </span>
                                                <?php if($this->session->userdata('usuario_session')){?>
                                                    <a class="btn-3 lg-btn3 view-solicita-livro"  href="javascript:"  data-nome="<?= $livro->titulo?>" data-solicitante="<?= $this->session->userdata('usuario_session')['id']?>" data-solicitado="<?= $livro->usuario_livro ?>" data-livro="<?= $livro->id_livros?>" data-datasolicitacao="<?= date('Y-m-d h:m:s')?>" data-status="Aguardando Envio">Solicitar</a>
                                                <?php }else{ ?>
                                                    <a class="btn-3 lg-btn3" data-toggle="modal" data-target="#solicita-livro">Solicitar</a>
                                                <?php }?>
                                                <a class="add-cart" href="<?= base_url('site/detalhes/'.$livro->id_livros.'')?>">Detalhes</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <!--KODDE PAGINATION START-->
                    <div class="col-md-12">
                        <div class="kf-pagination">
                            <ul class="pagination">
                                <?= $paginacao?>
                            </ul>
                        </div>
                    </div>
                    <!--KODDE PAGINATION END-->
                </div>
            </div>
        </div>
    </div>
    <!--GRID 4 WRAP END-->
    <!--BRAND SLIDER WRAP START-->
    <section class="bran-slider-wrap">
        <div class="container">
            <!--HEADING 1 START-->
            <div class="heading-1">
                <h2>Parceiros da Renova Livros</h2>
                <span>parcerias de qualidade</span>
            </div>
            <!--HEADING 1 END-->
            <div class="row">
                <div class="brand-slider">
                    <div id="brand-slider" class="owl-carousel owl-theme">
                        <div class="item">
                            <a href="#"><img src="<?= base_url()?>assets/images/brand1.png" alt=""></a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="<?= base_url()?>assets/images/brand2.png" alt=""></a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="<?= base_url()?>assets/images/brand3.png" alt=""></a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="<?= base_url()?>assets/images/brand4.png" alt=""></a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="<?= base_url()?>assets/images/brand5.png" alt=""></a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="<?= base_url()?>assets/images/brand6.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--BRAND SLIDER WRAP END-->
</div>


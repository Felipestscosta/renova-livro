<div class="kf_content_wrap" xmlns="http://www.w3.org/1999/html">
    <div class="product-detail1">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!--BOOK VIEW WRAP START-->
                        <div class="book-view book-view2">
                            <div class="row">
                                <div class="col-md-7">
                                    <!--BOOK VIEW THUMB START-->
                                    <div class="thumb">
                                        <div class="thumb-slider">
                                            <a data-rel="prettyPhoto[]" class="zoomer" href="<?= base_url('assets/uploads/'.$livro->imagem.'')?>"><i class="fa fa-arrows-alt"></i></a>
                                            <li>
                                                <img src="<?= base_url('assets/uploads/'.$livro->imagem.'')?>" alt="" />
                                            </li>
                                        </div>
                                    </div>
                                    <!--BOOK VIEW THUMB END-->
                                </div>
                                <div class="col-md-5">
                                    <!--BOOK TEXT START-->
                                    <div class="book-text">
                                        <!--BOOK HEADING START-->
                                        <div class="book-heading book-padding">
                                            <span><?= $livro->nome_categorias?></span>
                                            <h3><a href="#"><?= $livro->titulo?></a></h3>
                                            <div class="book-review">
                                                <ul class="blog-meta">
                                                    <li></li><br>
                                                    <li><a href="#"><b>Autor:</b> <?= $livro->autor?></a></li><br/>
                                                    <li><a href="#"><b>Ano:</b> <?= $livro->ano?></a></li><br/>
                                                    <li><a href="#"><b>Editora:</b> <?= $livro->editora?></a></li><br/>
                                                    <li><a href="#"><b>Nº de Páginas:</b> <?= $livro->paginas?></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!--BOOK HEADING END-->
                                        <!--BOOK DESCRIPTION START-->
                                        <div class="book-description book-padding">
                                            <span>Uma Pequena Descrição</span>
                                            <p><?= nl2br($livro->descricao)?></p>
                                        </div>
                                        <!--BOOK DESCRIPTION END-->
                                        <!--BOOK PRICE START-->
                                        <div class="book-price book-padding">
												<span class="price-tag green">
													DISPONÍVEL
												</span>
                                            <?php if($this->session->userdata('usuario_session')){?>
                                                <a class="cart-3 view-solicita-livro"  href="javascript:"  data-nome="<?= $livro->titulo?>" data-solicitante="<?= $this->session->userdata('usuario_session')['id']?>" data-solicitado="<?= $livro->usuario_livro ?>" data-livro="<?= $livro->id_livros?>" data-datasolicitacao="<?= date('Y-m-d h:m:s')?>" data-status="Aguardando Envio"><i class="fa fa-sign-in fa-lg"></i> Solicitar</a>
                                            <?php }else{ ?>
                                                <a class="cart-3" data-toggle="modal" data-target="#solicita-livro"><i class="fa fa-sign-in fa-lg"></i>  Solicitar</a>
                                            <?php }?>
                                        </div>
                                        <!--BOOK PRICE END-->
                                        <!--BOOK WISHLIST 2 START-->
                                        <div class="wishlist2 book-padding">
                                            <ul>
                                                <li><i class="icon-send"></i><a href="#">Fale com o <?= $usuario_dado->nome?></a></li>
                                            </ul>
                                        </div>
                                        <!--BOOK WISHLIST 2 END-->

                                    </div>
                                    <!--BOOK TEXT END-->
                                </div>
                            </div>
                        </div>
                        <!--BOOK VIEW WRAP END-->
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
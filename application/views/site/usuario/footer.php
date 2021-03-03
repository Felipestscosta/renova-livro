    <!--FOOTER START-->
    <footer class="footer-1">
        <div class="container">
            <div class="row">
                <!--WIDGET TEXT START-->
                <div class="col-md-4">
                    <div class="widget widget-text">
                        <!--WIDGET HEADING START-->
                        <div class="widget-hd">
                            <h3>SOBRE A RENOVA LIVRO</h3>
                        </div>
                        <!--WIDGET HEADING END-->
                        <div class="text">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl.</p>
                            <a href="#">LEIA MAIS... <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
                <!--WIDGET TEXT END-->
                <!--WIDGET LATEST NEWS START-->
                <div class="col-md-4">
                    <div class="widget widget-tags">
                        <!--WIDGET HEADING START-->
                        <div class="widget-hd">
                            <h3>CATEGORIAS</h3>
                        </div>
                        <!--WIDGET HEADING END-->
                        <ul>
                            <?php foreach($categorias_rodape as $categoria){?>
                                <li><a href="<?= base_url('site/busca/'.$categoria->id.'/'.$categoria->nome.'')?>"><?= $categoria->nome?></a></li>
                            <?php }?>
                        </ul>

                    </div>
                </div>
                <!--WIDGET LATEST NEWS END-->
                <!--WIDGET CONTACT START-->
                <div class="col-md-4">
                    <div class="widget contact-ft">
                        <!--WIDGET HEADING START-->
                        <div class="widget-hd">
                            <h3>FALE CONOSCO</h3>
                        </div>
                        <!--WIDGET HEADING END-->
                        <ul>
                            <li>
                                <span>
                                    Telefone:
                                </span>
                                <div class="text">
                                    <em>
                                        (83) 99911-4106 - <small>Walter</small>
                                    </em>
                                </div>
                            </li>
                            <li>
                                <span>
                                    Email:
                                </span>
                                <div class="text">
                                    <a href="#">jpwdsf1968@gmail.com </a>
                                </div>
                            </li>
                            <li>
                                <span>
                                    Siga-nos:
                                </span>
                                <div class="text">
                                    <ul class="social-1">
                                        <li><a href="#"  style="padding-top: 10px;"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"  style="padding-top: 10px;"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"  style="padding-top: 10px;"><i class="fa fa-tumblr"></i></a></li>
                                        <li><a href="#"  style="padding-top: 10px;"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--WIDGET CONTACT END-->
            </div>
        </div>
    </footer>
    <!--FOOTER END-->
    <div class="copy-right copy-right2">
        <div class="container">
            <p>Renova Livro - © <?= date('Y')?><a href="index.html"></a></p>
            <ul class="ft-nav" style="padding-top: 10px;">
                <li>
                    <a href="<?= base_url()?>">Home</a>
                </li>
                <li>
                    <a href="<?= base_url('site/quemSomos')?>">Quem somos</a>
                </li>
                <li>
                    <a href="<?= base_url('site/faleConosco')?>">Fale Conosco</a>
                </li>

            </ul>
            <ul class="brand-icons" style="padding-top: 0;">
                <li><a href="https://www.fastdevbr.com"><img width="40%;" src="<?= base_url('assets/images/fastdev.png')?>"></a></li>
            </ul>
        </div>
    </div>
    <!-- START GO UP -->
    <div class="go-up">
        <a href="#"><i class="fa fa-angle-up" style="padding-top: 6px;"></i></a>
    </div>
    <!--END GO UP-->
    </div>
    <!--KF KODE WRAPPER WRAP END-->
    <!--JavaScript Library-->
    <script src="<?= base_url()?>assets/js/jquery.js"></script>
    <!--Bootstrap core JavaScript-->
    <script src="<?= base_url()?>assets/js/bootstrap.min.js"></script>
    <!--Jquery UI Library-->
    <script src="<?= base_url()?>assets/js/range-slider.js"></script>
    <!--Bx-Slider JavaScript-->
    <script src="<?= base_url()?>assets/js/jquery.bxslider.min.js"></script>
    <!--Owl Carousel JavaScript-->
    <script src="<?= base_url()?>assets/js/owl.carousel.min.js"></script>
    <!--New-Slider JavaScript-->
    <script src="<?= base_url()?>assets/js/new-slider.min.js"></script>
    <!--Pretty Photo JavaScript-->
    <script src="<?= base_url()?>assets/js/jquery.prettyPhoto.js"></script>
    <!--Count Down JavaScript-->
    <script src="<?= base_url()?>assets/js/jquery.downCount.js"></script>
    <script src="<?= base_url()?>assets/js/waypoints-min.js"></script>
    <!--select menu-->
    <script src="<?= base_url()?>assets/js/jquery.selectric.min.js"></script>
    <!--Accordian JavaScript-->
    <script src="<?= base_url()?>assets/js/jquery.accordion.js"></script>
    <!--Progress Bar JavaScript-->
    <script src="<?= base_url()?>assets/js/jprogress.js"></script>
    <!--Dl Menu Script-->
    <script src="<?= base_url()?>assets/js/dl-menu/modernizr.custom.js"></script>
    <!--Dl Menu Script-->
    <script src="<?= base_url()?>assets/js/dl-menu/jquery.dlmenu.js"></script>
    <!--Map-->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
    <!--Side Menu-->
    <script src="<?= base_url()?>assets/js/jquery.sidr.min.js"></script>
    <!--Masonry-->
    <script src="<?= base_url()?>assets/js/masonry.min.js"></script>
    <!--Data Mask-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
    <!--Sweet Alert JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <!--Data TABLE-->
    <script src="<?= base_url() ?>assets/data-table/js/jquery.dataTables.js"></script>
    <script src="<?= base_url() ?>assets/data-table/js/dataTables.bootstrap4.min.js"></script>
    <!-- Emodal-->
    <script src="//rawgit.com/saribe/eModal/master/dist/eModal.min.js"></script>
    <!--FONT AWESOME-->
    <script src="https://use.fontawesome.com/173ce63742.js"></script>
    <!-- JQuery Uploader -->
    <script src="<?= base_url()?>assets/js/jquery.uploadPreview.min.js"></script>
    <!--Custom JavaScript-->
    <script src="<?= base_url()?>assets/js/custom.js"></script>
    <!--Custom JavaScript-->
    <script src="<?= base_url()?>assets/js/usuario.js"></script>
    </body>
</html>

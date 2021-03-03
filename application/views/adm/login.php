<!--KF KODE WRAPPER WRAP START-->
<div class="kode_wrapper">
    <div class="kf_content_wrap">
        <div class="login-wrap login-bg">
            <div class="col-md-12 col-centered">
                <div class="modal-dialog login1 login6 login6-1">
                    <div class="modal-content">
                        <div class="col-md-8 col-centered">
                            <img src="<?= base_url() ?>assets/images/logo_branca.png" alt="renova-livros">
                        </div>
                        <?php if($this->session->flashdata('erro')) {?>
                            <h4 class="alert alert-danger text-center"><?= $this->session->flashdata('erro')?></h4>
                        <?php }?>
                        <div class="user-box clearfix" style="width: 70%;float: none;margin: 40px auto;">
                            <!--FORM FIELD START-->
                            <form id="entrar" method="post">
                                <div class="input-dec3">
                                    <input type="text" name="email" placeholder="Digite seu E-mail" required>
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="input-dec3">
                                    <input type="password" name="senha" placeholder="Digite sua Senha" style="padding-left: 73px;" required>
                                    <i class="fa fa-lock"></i>
                                </div>
                                <button type="submit" class="dialog-button">Entrar</button>
                                <div class="dialog-footer">
                                    <div class="col-md-6">
                                        <div class="input-container">
                                            <a href="javascript:"  data-toggle="modal" data-target="#recupera-senha" class="recupera-senha">Esqueceu sua senha?</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-container" style="float: right;">
                                            <a href="<?= base_url()?>">Retornar ao site<i class="fa fa-chevron-circle-left fa-lg"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--FORM FIELD END-->
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--KF KODE WRAPPER WRAP END-->


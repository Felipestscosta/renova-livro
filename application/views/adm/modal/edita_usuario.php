<div class="login1 user-box">
    <!--FORM FIELD START-->
    <form action="<?= base_url('administrador/acaoEditaUsuario')?>" method="post">
        <fieldset>
            <legend>Dados Pessoais</legend>
            <div class="col-md-12">
                <div class="input-dec3">
                    <label>Nome</label>
                    <input type="text" placeholder="Digite seu Nome Completo" name="nome" value="<?= $usuario->nome?>">
                </div>
            </div>
            <div class="col-md-12">
                <div class="input-dec3">
                    <label>Telefone</label>
                    <input class="telefone" type="text" placeholder="Digite seu Telefone de Contato" name="telefone" value="<?= $usuario->telefone?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-dec3">
                    <label>E-mail</label>
                    <input type="email" placeholder="Digite seu E-mail" name="email" value="<?= $usuario->email?>">
                    <i class="fa fa-envelope-o"></i>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-dec3">
                    <label>Senha</label>
                    <input class="senha" type="password" placeholder="Redefinir Nova Senha ? " name="senha">
                    <i class="fa fa-lock"></i>
                </div>
            </div>
        </fieldset>
        <br/>
        <fieldset>
            <legend>Endereço <small>Para entregas de livros</small></legend>
            <div class="col-md-6">
                <div class="input-dec3">
                    <label>CEP</label>
                    <input class="cep busca-cep" type="text" placeholder="CEP" name="cep" value="<?= $usuario->cep?>">
                </div>
            </div>
            <div class="col-md-6">
                <p><a class="cep-link" href="http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm" target="_blank">Não sei meu CEP</a></p>
            </div>
            <div class="col-md-10">
                <div class="input-dec3">
                    <label>Endereço</label>
                    <input id="endereco" type="text" placeholder="Digite sua Rua, Av, Travessa, etc..." name="endereco" value="<?= $usuario->endereco?>">
                </div>
            </div>
            <div class="col-md-2">
                <div class="input-dec3">
                    <label>Nº</label>
                    <input type="text" placeholder="Nº" name="numero" value="<?= $usuario->numero?>">
                </div>
            </div>
            <div class="row" style="margin-left: 0;">
                <div class="col-md-6">
                    <div class="input-dec3">
                        <input type="text" placeholder="complemento" name="complemento" value="<?= ($usuario->complemento) ? $usuario->complemento  :  null ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="input-dec3">
                    <label>Bairro</label>
                    <input id="bairro" type="text" placeholder="Digite seu Bairro" name="bairro" value="<?= $usuario->bairro?>">
                </div>
            </div>
            <div class="col-md-5">
                <div class="input-dec3">
                    <label>Cidade</label>
                    <input id="cidade" type="text" placeholder="Cidade" name="cidade" value="<?= $usuario->cidade?>">
                </div>
            </div>
            <div class="col-md-2">
                <div class="input-dec3">
                    <label>Estado</label>
                    <input id="estado" type="text" placeholder="Estado" name="estado" value="<?= $usuario->estado?>">
                </div>
            </div>
        </fieldset>
        <hr>
        <div class="dialog-footer">
            <button class="dialog-button" type="submit"><i class="fa fa-pencil"></i> Editar</button>
        </div>
        <!--ID-->
        <input type="hidden" name="id" value="<?= $usuario->id?>">
    </form>
    <!--FORM FIELD END-->
</div>

<script type="text/javascript">

    $('document').ready(function() {

        //Required no campo Input
        $("input").prop('required',true);
        $("select").prop('required',true);
        $('input[name="senha"]').prop('required',false);

        //URL BASE
        var base_url = window.location.origin + '/';

        //Busca Cep
        $('.busca-cep').blur(function(){
            var cep = $(this).val();
            $.ajax({
                jsonp: 'callback',
                dataType: 'jsonp',
                url: 'https://viacep.com.br/ws/'+cep+'/json/'
            }).done(function(retorno){
                $("#endereco").val( retorno['logradouro'] );
                $("#bairro").val( retorno['bairro'] );
                $("#cidade").val( retorno['localidade'] );
                $("#estado").val( retorno['uf'] );
            }).fail(function(retorno){
                console.log(retorno);
            });
        });

        //FORMULÁRIO NOVO USUÁRIO
        $('form#novo-usuario').submit(function(event){
            event.preventDefault();
            var dados = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: base_url+'administrador/acaoEditaUsuario',
                data: dados
            }).done(function(retorno){
                if(retorno == true){
                    window.location.href = base_url+"administrador/home";
                }else{
                    var mensagem = retorno.replace('_',' ');
                    sweetAlert(mensagem, "", "error");
                }
            }).fail(function(){
                sweetAlert("Oops...", "Something went wrong!", "error");
            });
            return false;
        });

    });
</script>
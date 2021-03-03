<div class="login1 user-box">
    <!--FORM FIELD START-->
    <?php echo form_open_multipart('administrador/acaoNovoUsuario');?>
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
                    <input class="verifica" type="email" placeholder="Digite seu E-mail" name="email">
                    <i class="fa fa-envelope-o"></i>
                    <span class="error-msg" style="color: red;"></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-dec3">
                    <input  class="senha" type="password" placeholder="Digite sua Senha" name="senha">
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
            <div class="col-md-10">
                <div class="input-dec3">
                    <input id="endereco" type="text" placeholder="Digite sua Rua, Av, Travessa, etc..." name="endereco">
                </div>
            </div>
            <div class="col-md-2">
                <div class="input-dec3">
                    <input type="text" placeholder="Nº" name="numero">
                </div>
            </div>
            <div class="row" style="margin-left: 0;">
                <div class="col-md-6">
                    <div class="input-dec3">
                        <input type="text" placeholder="complemento" name="complemento">
                    </div>
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
            <button class="dialog-button verifica-btn" type="submit"><i class="fa fa-plus"></i> Criar Usuário</button>
        </div>
    </form>
    <!--FORM FIELD END-->
</div>

<script type="text/javascript">

    $('document').ready(function() {
        //Required no campo Input
        $("input").prop('required',true);
        $("select").prop('required',true);

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

        //Verifica se email existe
        $('.verifica').blur(function(){
            var email = $(this).val();
            var tabela = 'usuarios';
            $.ajax({
                url: base_url+"administrador/consulta/"+tabela+"/"+encodeURIComponent(email)
            }).done(function(res){
                if(res){
                    $('.error-msg').html('<small>Email já está sendo usado</small>');
                    $('.verifica-btn').attr("disabled", true);
                }else{
                    $('.verifica-btn').attr("disabled", false);
                    $('.error-msg').remove();
                }
            }).fail(function(res){
                console.log(res);
            });
            return false;
        });


    });
</script>
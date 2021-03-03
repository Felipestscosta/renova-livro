<style type="text/css" xmlns="http://www.w3.org/1999/html">
    /*CSS Uploader*/
    #image-preview {
        width: 400px;
        height: 400px;
        position: relative;
        overflow: hidden;
        background-color: #ffffff;
        color: #ecf0f1;
    }
    #image-preview input {
        line-height: 200px;
        font-size: 200px;
        position: absolute;
        opacity: 0;
        z-index: 10;
    }
    #image-preview label {
        position: absolute;
        z-index: 5;
        opacity: 0.8;
        cursor: pointer;
        background-color: #bdc3c7;
        width: 200px;
        height: 50px;
        font-size: 20px;
        line-height: 50px;
        text-transform: uppercase;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        text-align: center;
    }
</style>
<div class="login1 user-box">
    <!--FORM FIELD START-->
    <?php echo form_open_multipart('usuario/acaoNovoLivro');?>
        <div class="col-md-8">
            <div class="input-dec3 input-group">
                <input class="consulta-isbn" type="text" placeholder="Digite o ISBN" name="isbn" maxlength="14" style="margin-bottom: 15px;">
                <br clear="all">
                <small class="msg-isbn">
                    <span style="color: #288ece">Digite o Nº de 10 ou 13 digitos do ISBN, para ser verificado.</span>
                </small>
            </div>
        </div>
    <div id="content"></div>
        <div class="campos-new-livro" style="display: none;">
            <div class="col-md-6 col-centered">
                <div id="image-preview">
                    <label for="image-upload" id="image-label">Imagem Livro</label>
                    <input type="file" name="imagem" id="image-upload" />
                </div>
            </div>
            <div class="col-md-12">
                <div class="input-dec3">
                    <input type="text" placeholder="Título" name="titulo">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-dec3">
                    <input type="text" placeholder="Autor" name="autor">
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-dec3">
                    <select name="categoria">
                        <option value="">-- Categoria --</option>
                        <?php foreach($categorias as $categoria) {?>
                            <option value="<?= $categoria->id?>"><?= $categoria->nome?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="col-md-9">
                <div class="input-dec3">
                    <input type="text" placeholder="Editora" name="editora">
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-dec3">
                    <input type="text" placeholder="Ano" name="ano">
                </div>
            </div>
            <div class="col-md-8">
                <div class="input-dec3">
                    <input type="text" placeholder="Edição" name="edicao">
                </div>
            </div>
            <div class="col-md-9">
                <div class="input-dec3">
                    <input type="text" placeholder="Idioma" name="idioma">
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-dec3">
                    <input type="number" placeholder="Nº Páginas" name="paginas">
                </div>
            </div>
            <div class="col-md-12">
            <div class="input-dec3">
                <textarea placeholder="Descrição" rows="4" name="descricao"></textarea>
            </div>
        </div>
        </div>
        <input type="hidden" name="usuario_livro" value="<?= $this->session->userdata('usuario_session')['id']?>">
        <div class="col-md-12">
            <hr>
        </div>
        <div class="dialog-footer">
            <button class="dialog-button btn-new-livro" type="submit" disabled><i class="fa fa-plus"></i> Disponibilizar</button>
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

        $('input[name="isbn"]').keyup(function(e){
            var formatado = $(this).val();
            $(this).val(formatado.replace(/ /g, '').replace(/-/g,''));
        });

        $.uploadPreview({
            input_field: "#image-upload",   // Default: .image-upload
            preview_box: "#image-preview",  // Default: .image-preview
            label_field: "#image-label",    // Default: .image-label
            label_default: "Imagem Livro",   // Default: Choose File
            label_selected: "Trocar Imagem",  // Default: Change File
            no_label: false                 // Default: false
        });

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

        $('.consulta-isbn').keyup(function(){
            if($(this).val().length >= 10){
                $.ajax({
                    url: base_url+"usuario/verificaIsbn/"+$(this).val()
                }).done(function(res){
                    if(res.return == 'incorreto'){
                        $('.msg-isbn').html('<span style="color: red">Número incorreto!</span>');
                        $('.campos-new-livro').hide('slow');
                    }else if(res.return == 'correto'){
                        $('.msg-isbn').html('<span style="color: green">ISBN Válido</span>');
                        $('.campos-new-livro').show('slow');
                        $('.btn-new-livro').attr('disabled',false);
                        if(res.dados){
                            $('input[name="titulo"]').val(res.dados['titulo']);
                            $('input[name="autor"]').val(res.dados['autor']);
                            $('input[name="editora"]').val(res.dados['editora']);
                            $('input[name="edicao"]').val(res.dados['edicao']);
                            $('input[name="idioma"]').val(res.dados['idioma']);
                            $('input[name="paginas"]').val(res.dados['paginas']);
                            $('textarea[name="descricao"]').val(res.dados['descricao']);
                        }
                    }else{
                        $('.msg-isbn').html('<span style="color: red">Número incorreto!</span>');
                        $('.campos-new-livro').hide('slow');
                    }
                }).fail(function(res){

                });
                return false;
            }
        });
});


</script>
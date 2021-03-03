<style type="text/css">
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
    <?php echo form_open_multipart('administrador/acaoEditaLivro');?>
        <div class="col-md-6 col-centered">
            <div id="image-preview" style="background-image: url(<?=base_url('assets/timthumb/index.php?src=')?><?= base_url('assets/uploads/'.$livro->imagem.'&q=100&w=262&h=342&zc=2')?>);background-repeat: no-repeat;">
                <label for="image-upload" id="image-label">Imagem Livro</label>
                <input type="file" name="imagem" id="image-upload" />
            </div>
        </div>
        <div class="col-md-12">
            <div class="input-dec3">
                <label>ISBN</label>
                <input type="text" placeholder="Digite o ISBN" name="isbn" value="<?= $livro->isbn?>">
            </div>
        </div>
        <div class="col-md-12">
            <div class="input-dec3">
                <label>Título</label>
                <input type="text" placeholder="Título" name="titulo" value="<?= $livro->titulo?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-dec3">
                <label>Autor</label>
                <input type="text" placeholder="Autor" name="autor" value="<?= $livro->autor?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-dec3">
                <label>Categoria</label>
                <select name="categoria">
                    <option value="">-- Categoria --</option>
                    <?php foreach($categorias as $chave => $categoria) {?>
                        <option value="<?= $categoria->id?>" <?= ($categoria->id == $livro->categoria) ?  'selected' :  null ?>><?= $categoria->nome?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="col-md-9">
            <div class="input-dec3">
                <label>Editora</label>
                <input type="text" placeholder="Editora" name="editora" value="<?= $livro->editora?>">
            </div>
        </div>
        <div class="col-md-3">
            <div class="input-dec3">
                <label>Ano</label>
                <input type="text" placeholder="Ano" name="ano" value="<?= $livro->ano?>">
            </div>
        </div>
        <div class="col-md-8">
            <div class="input-dec3">
                <label>Edição</label>
                <input type="text" placeholder="Edição" name="edicao" value="<?= $livro->edicao?>">
            </div>
        </div>
        <div class="col-md-9">
            <div class="input-dec3">
                <label>Idioma</label>
                <input type="text" placeholder="Idioma" name="idioma" value="<?= $livro->idioma?>">
            </div>
        </div>
        <div class="col-md-3">
            <div class="input-dec3">
                <label>Nº de Páginas</label>
                <input type="number" placeholder="Nº Páginas" name="paginas" value="<?= $livro->paginas?>">
            </div>
        </div>
        <div class="col-md-12">
            <div class="input-dec3">
                <label>Descrição</label>
                <textarea placeholder="Descrição" rows="4" name="descricao"><?= $livro->descricao?></textarea>
            </div>
        </div>
        <!--    ID DO LIVRO-->
        <input type="hidden" name="id" value="<?= $livro->id_livros?>">
        <hr>
        <div class="dialog-footer">
            <button class="dialog-button" type="submit"><i class="fa fa-pencil"></i> Editar</button>
        </div>
    </form>
    <!--FORM FIELD END-->
</div>

<script type="text/javascript">

    $('document').ready(function() {
        //Required no campo Input
        $("input").prop('required',false);
        $("select").prop('required',true);

        //URL BASE
        var base_url = window.location.origin + '/';

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

        //FORMULÁRIO NOVO USUÁRIO
        $('form#novo-livro').submit(function(event){
            event.preventDefault();
            var dados = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: base_url+'usuario/acaoNovoLivro',
                data: dados
            }).done(function(retorno){
                if(retorno == true){
                    window.location.href = base_url+"usuario/home";
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
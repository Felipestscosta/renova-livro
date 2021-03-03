<div class="login1 user-box">
    <!--FORM FIELD START-->
    <?php echo form_open_multipart('administrador/acaoEditaCategoria');?>
    <div class="col-md-12">
        <div class="input-dec3">
            <label>NOME DA CATEGORIA</label>
            <input type="text" placeholder="Título" name="nome" value="<?= $categoria->nome?>">
        </div>
    </div>

    <!--    ID DA CATEGORIA-->
    <input type="hidden" name="id" value="<?= $categoria->id?>">
    <hr>
    <div class="dialog-footer">
        <button class="dialog-button" type="submit"><i class="fa fa-pencil"></i> Editar</button>
    </div>
    </form>
    <!--FORM FIELD END-->
</div>

<script type="text/javascript">
    $('document').ready(function(){
        //Required no campo Input
        $("input").prop('required',true);
        $("select").prop('required',true);
    })
</script>
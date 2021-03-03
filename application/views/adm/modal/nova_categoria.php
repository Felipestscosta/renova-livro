<div class="login1 user-box">
    <!--FORM FIELD START-->
    <?php echo form_open_multipart('administrador/acaoNovaCategoria');?>
    <div class="col-md-12">
        <div class="input-dec3">
            <label>NOME DA CATEGORIA</label>
            <input type="text" placeholder="Título" name="nome">
        </div>
    </div>
    <hr>
    <div class="dialog-footer">
        <button class="dialog-button" type="submit"><i class="fa fa-save"></i> Salvar</button>
    </div>
    </form>
    <!--FORM FIELD END-->
</div>

<script type="text/javascript">
    //Required no campo Input
    $("input").prop('required',true);
    $("select").prop('required',true);
</script>
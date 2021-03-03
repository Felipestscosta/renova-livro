<div class="row" style="padding: 20px 0 40px 0">
    <div class="col-md-8 col-centered">
        <form id="form_confirmacao" method="post">
            <div class="form-group">
                <label for="p_rastreio">Você tem o Código de Rastreio ?<br><small>Este código é obtido quando você posta o livro através do sitema de <b>CORREIOS</b></small></label>
                <select id="p_rastreio">
                    <option value="sim">Sim</option>
                    <option value="nao" selected>Não</option>
                </select>
            </div>
            <div class="form-group" style="display: none" id="exibe_rastreio">
                <label for="cod_rastreio">Código de Rastreio</label>
                <input type="text" class="form-control" name="cod_rastreio" id="cod_rastreio">
            </div>
            <input type="hidden" value="<?= $solicitacao->id?>" name="id">
            <hr>
            <div class="col-md-12">
                <button class="btn-3 sm-btn3 col-centered" type="submit">Confirmar Envio</button>
            </div>
        </form>
    </div>
</div>

<script>
    $('#p_rastreio').change(function(){
        $('#cod_rastreio').attr('required', true);
        var existe = $('#p_rastreio option:selected').val();
        if(existe === 'sim'){
            $('#exibe_rastreio').show('slow');
        }else{
            $('#exibe_rastreio').hide('slow');
        }
    });
    
    $('#form_confirmacao').submit(function(){
        var id = $('input[name="id"]').val();
        var cod_rastreio = $('input[name="cod_rastreio"]').val();
        $.ajax({
            url: window.location.origin+'/usuario/atualizaSolicitacoes/enviado/'+id+'/'+cod_rastreio
        }).done(function(){
            window.location.href = window.location.origin+"/usuario/home"
        });
        return false;
    })
</script>
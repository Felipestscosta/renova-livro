/**
 * Criado por Felipe em 03/05/2017.
 */

$('document').ready(function(){

    //URL BASE
    var base_url = window.location.origin + '/';

    //DATA TABLE
    $('.data-table').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json"
        }
    });

    $('#view-novo-livro').click(function(event){
        event.preventDefault();
        var options = {
            url: base_url+"usuario/viewNovoLivro",
            title:'Novo Livro',
            size: 'lg',
            subtitle: 'Preencha com as informações do livro',
            buttons: false
        };
        eModal.ajax(options);
    });

    //Emodal Edita Livro
    $('.view-edita-livro').click(function(event){
        event.preventDefault();
        var id = $(this).data('id');
        var options = {
            url: base_url+"usuario/viewEditaLivro/"+id,
            title:'Editar Livro',
            size: 'lg',
            subtitle: 'Aqui você pode editar as informações do livro',
            buttons: false
        };
        eModal.ajax(options);
    });

    //Emodal Edita Livro
    $('.view-edita-dados').click(function(event){
        event.preventDefault();
        var id = $(this).data('id');
        var options = {
            url: base_url+"usuario/viewEditaDados/"+id,
            title:'Minha Conta',
            size: 'lg',
            subtitle: 'Altere as informações da Sua Conta',
            buttons: false
        };
        eModal.ajax(options);
    });

    //Exclui a Categoria
    $('.deleta-livro').click(function(){
        var id = $(this).data('id');
        swal({
                title: "Tem certeza  ?",
                text: "Você não poderá cancelar a exclusão após essa confirmação.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sim, excluir!",
                cancelButtonText: "Não, cancelar",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                    $.ajax({
                        type: "POST",
                        url: base_url+"usuario/deletaLivro/"+id
                    }).done(function(){
                        window.location.href = base_url+'usuario/home';
                    });
                } else {
                    swal("Cancelado", "suas informações não foram deletadas", "error");
                }
            });
    });

    //Emodal Altera Status
    $('.confirma-entrega').click(function(event){
        event.preventDefault();
        var id = $(this).data('id');
        var options = {
            url: base_url+"usuario/viewAlteraStatus/"+id,
            title:'Alteração de Status da Solicitação',
            size: 'lg',
            subtitle: 'Altere as informações de status da solicitação',
            buttons: false
        };
        eModal.ajax(options);
    });
});

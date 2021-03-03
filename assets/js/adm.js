/**
 * Criado por Felipe em 02/05/2017.
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

    //Emodal Novo Usuário
    $('.view-novo-usuario').click(function(event){
        event.preventDefault();
        var options = {
            url: base_url+"administrador/viewNovoUsuario",
            title:'Novo Usuário',
            size: 'lg',
            subtitle: 'Aqui você pode criar novos usuários',
            buttons: false
        };
        eModal.ajax(options);
    });

    //Emodal Edita Usuário
    $('.view-edita-usuario').click(function(event){
        event.preventDefault();
        var id = $(this).data('id');
        var options = {
            url: base_url+"administrador/viewEditaUsuario/"+id,
            title:'Editar Usuário',
            size: 'lg',
            subtitle: 'Aqui você pode modificar informações dos usuários',
            buttons: false
        };
        eModal.ajax(options);
    });

    //FORMULÁRIO DE LOGIN DO ADMINISTRADOR
    $('form#entrar').submit(function(event){
        event.preventDefault();
        var dados = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: base_url+'autentica/login',
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

    //Emodal Edita Livro
    $('.view-edita-livro').click(function(event){
        event.preventDefault();
        var id = $(this).data('id');
        var options = {
            url: base_url+"administrador/viewEditaLivro/"+id,
            title:'Editar Livro',
            size: 'lg',
            subtitle: 'Aqui você pode editar as informações do livro',
            buttons: false
        };
        eModal.ajax(options);
    });

     //MODAL QUE EDITA CATEGORIA
    $('.view-edita-categoria').click(function(event){
        event.preventDefault();
        var id = $(this).data('id');
        var options = {
            url: base_url+"administrador/viewEditaCategoria/"+id,
            title:'Editar Categoria',
            size: 'lg',
            subtitle: 'Aqui você pode editar o nome da categoria',
            buttons: false
        };
        eModal.ajax(options);
    });

    //Exclui o Usuário
    $('.delete-usuario').click(function(){
        var id = $(this).data('id');
        swal({
                title: "Tem certeza ?",
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
                        url: base_url+"administrador/deletaUsuario/"+id
                    }).done(function(){
                        window.location.href = base_url+'administrador/home';
                    });
                } else {
                    swal("Cancelado", "suas informações não foram deletadas", "error");
                }
            });
    });

  //Exclui o Livro
    $('.delete-livro').click(function(){
        var id = $(this).data('id');
        swal({
                title: "Tem certeza ?",
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
                        url: base_url+"administrador/deletaLivro/"+id
                    }).done(function(){
                        window.location.href = base_url+'administrador/home';
                    });
                } else {
                    swal("Cancelado", "suas informações não foram deletadas", "error");
                }
            });
      });

    //Emodal Nova Categoria
    $('.view-nova-categoria').click(function(event){
        event.preventDefault();
        var options = {
            url: base_url+"administrador/viewNovaCategoria",
            title:'Novo Categoria',
            size: 'lg',
            subtitle: 'Aqui você pode criar novas categorias',
            buttons: false
        };
        eModal.ajax(options);
    });

     //Exclui a Categoria
    $('.deleta-categoria').click(function(){
        var id = $(this).data('id');
        swal({
                title: "Tem certeza ?",
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
                        url: base_url+"administrador/deletaCategoria/"+id
                    }).done(function(){
                        window.location.href = base_url+'administrador/home';
                    });
                } else {
                    swal("Cancelado", "suas informações não foram deletadas", "error");
                }
            });
    });

    //Deleta E-mail da  Newsletter
    //Exclui o Livro
    $('.delete-email').click(function(){
        var id = $(this).data('id');
        swal({
                title: "Tem certeza ?",
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
                        url: base_url+"administrador/deletEmail/"+id
                    }).done(function(){
                        window.location.href = base_url+'administrador/home';
                    });
                } else {
                    swal("Cancelado", "suas informações não foram deletadas", "error");
                }
            });
    });

});
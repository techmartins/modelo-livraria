$(document).ready(function(){

    $('#enviar-dados').on('click', function() {

        var titulo = $('#titulo').val();
        var descricao = $('#descricao').val();
        var autor = $('#autor').val();
        var numero_paginas = $('#numero_paginas').val();
        
        let _url = $('#url_cadastro').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');

        $('#modal-loading').modal('show');

        setTimeout(function () {
            $.ajax({
                url: _url,
                type: "POST",
                data: {
                    titulo: titulo,
                    descricao: descricao,
                    autor:autor,
                    numero_paginas:numero_paginas,
                    _token: _token
                },

                success: function(response) {
                    console.log(response);
                },
                error: function(response) {
                    console.log(response)
                }
            });
            $('#modal-loading').modal('hide');
        }, 3000);
        // location.reload;
    });

    $(".btn-editar-livro").click(function(){
        $("#modal-editar-livro").modal();
        let id = $(this).data('id');
        let _url = $('#url_editar').val();
        
        $.ajax({
            url: _url+"/"+id,
            type: "GET",
            
            success: function(response) {
                console.log(response);
                //console.log(response[0]["razao_social"]);
                $('#id_edit').val(response["id"]);
                $("#titulo_edit").val(response["titulo"]);
                $('#descricao_edit').val(response["descricao"]);
                $('#autor_edit').val(response["autor"]);
                $('#numero_paginas_edit').val(response["numero_paginas"]);
            },
            error: function(err) {
                console.log(err)
            }
        });

    });

    $("#editar-dados").click(function(){
        var id = $("#id_edit").val();
        var titulo = $('#titulo_edit').val();
        var descricao = $('#descricao_edit').val();
        var autor = $('#autor_edit').val();
        var numero_paginas = $('#numero_paginas_edit').val();
        
        let _url = $('#url_editar').val();
        $("#modal-editar-livro").modal('hide');
        $('#modal-loading').modal('show');
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        setTimeout(function () {
            $.ajax({
                url: _url+"/"+id,
                type: "PUT",
                data: {
                    titulo:titulo,
                    descricao:descricao,
                    autor:autor,
                    numero_paginas
                },
                
                success: function(response) {
                    console.log(response);
                },
                error: function(err) {
                    console.log(err)
                }
            });
            $('#modal-loading').modal('hide');
            // location.reload();
        }, 3000);
        // location.reload();
    });

    $(".btn-excluir-livro").click(function(){
        $("#modal-excluir-livro").modal();
        let id = $(this).data('id');
        $('#id_deletar_livro').val(id);
    });

    
    $("#deletar").click(function(){
    
        let id = $("#id_deletar_livro").val();
        let _url = $('#url_excluir').val();
        let _token   = $('meta[name="csrf-token"]').attr('content');
        $('#modal-excluir-livro').modal('hide');
        $('#modal-loading').modal('show');
        setTimeout(function () {
            $.ajax({
                url: _url+"/"+id,
                type: "DELETE",
                data: {
                    _token:_token
                },
                
                success: function(response) {
                    console.log(response);
                    if(response === "success"){
                        console.log("Exclusão realizada com sucesso!")
                    }
                },
                error: function(err) {
                    console.log(err)
                }
            });
            $('#modal-loading').modal('hide');
            // location.reload();
        }, 3000);
    });

});


function Abrir_modal_npj(val) {
    $('#myModal').modal({
        show: 'true'
    });
    $(".modal-title").html("<div align='center'>Informações do Processo: " + val + "</div>");
    var proc_num_npj = val;

    $.ajax({
        method: "GET",
        url: "pages/mediacao/NPJ_modal_dados_assist.php",
        data: {val: val},
        success: function(retorno){
            $('#conteudo_modal_assist').html(retorno);
        }
    });
    $.ajax({
        method: "GET",
        url: "pages/mediacao/NPJ_modal_dados_requer.php",
        data: {val: val},
        success: function(retorno){
            $('#conteudo_modal_requer').html(retorno);
        }
    });
    $.ajax({
        method: "GET",
        url: "pages/mediacao/NPJ_modal_dados_proc.php",
        data: {val: val},
        success: function(retorno){
            $('#conteudo_modal_proc').html(retorno);
        }
    });
}



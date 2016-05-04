function abrirPopover(id_msg) {

    $('#popover-dismiss_' + id_msg).popover({
        html: true,
        title : '<a href="#" class="close_popover" data-dismiss="alert">Cancelar</a>',
        content: function () {
            document.getElementById("content_popover").setAttribute("id", id_msg);
            
            return $("#ex02conteudo").html();
        },
        animation: true,
        placement: "bottom"
    }).click(function (e) {
        $(this).popover('show');
        e.preventDefault();
    });

    $(document).on("click", ".popover .close_popover" , function(){
        $(this).parents(".popover").popover('hide');
        document.getElementById(id_msg).setAttribute("id", "content_popover");
    });
    $ready(function () {
        document.getElementById(id_msg).setAttribute("id", "content_popover");
    });
    console.log(id_msg);
};




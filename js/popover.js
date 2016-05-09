function abrirPopover(id_msg) {
    $('#popover-dismiss_' + id_msg).popover({
        html: true,
        content: function () {
            document.getElementById("content_popover").setAttribute("id", id_msg);
            return $("#ex02conteudo").html();
        },
        animation: true,
        placement: "bottom"
    }).click(function (e) {
        e.preventDefault();
        // Exibe o popover.
        $(this).popover('show');
    });
    console.log(id_msg);

};

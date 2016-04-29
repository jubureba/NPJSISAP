$(document).ready(function (e) {

    $("#uploadForm8").on('submit', (function (e) {
        e.preventDefault();
        $.ajax({
            url: "pages/cadastro/pessoa/upload/php-img-upload/upload-img-obito.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                $("#targetLayer8").html(data);
            },
            error: function () {
            }
        });
    }));

    $(function () { //FUNÇÃO PARA TRATAR A IMAGEM
        $("#upload-obito").change(function () {
            var file = this.files[0];
            var imagefile = file.type;
            var match = ["image/jpeg", "image/png", "image/jpg"];
            if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                $('#previewing8').attr('src', 'dist/img/defaultimg.gif');
                return false;
            }
            else {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });

    function imageIsLoaded(e) { //FUNÇÃO PARA APARECER A IMG NO PREVIEW, E CHAMAR A FUNC DO SUBMIT
        $('#previewing8').attr('src', 'dist/img/loader.gif');
        setTimeout(function() { //SETA DEPOIS DE 2 SEGUNDOS A IMAGEM UPADA, E CHAMA A FUNÇÃO DO SUBMIT
            $("#upload-obito").css("color", "green");
;
            $('#previewing8').attr('src',"../" + e.target.result);
            $('#previewing8').attr('width', '40px');
            $('#previewing8').attr('height', '40px');
            document.getElementById("upload-obito-button").click();
        }, 4000);
    };
});
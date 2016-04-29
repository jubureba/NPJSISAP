$(document).ready(function (e) {

    $("#uploadForm6").on('submit', (function (e) {
        e.preventDefault();
        $.ajax({
            url: "pages/cadastro/pessoa/upload/php-img-upload/upload-img-nascimento.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                $("#targetLayer6").html(data);
            },
            error: function () {
            }
        });
    }));

    $(function () { //FUNÇÃO PARA TRATAR A IMAGEM
        $("#upload-nascimento").change(function () {
            var file = this.files[0];
            var imagefile = file.type;
            var match = ["image/jpeg", "image/png", "image/jpg"];
            if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                $('#previewing6').attr('src', 'dist/img/defaultimg.gif');
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
        $('#previewing6').attr('src', 'dist/img/loader.gif');
        setTimeout(function() { //SETA DEPOIS DE 2 SEGUNDOS A IMAGEM UPADA, E CHAMA A FUNÇÃO DO SUBMIT
            $("#upload-nascimento").css("color", "green");

            $('#previewing6').attr('src',"../" + e.target.result);
            $('#previewing6').attr('width', '40px');
            $('#previewing6').attr('height', '40px');
            document.getElementById("upload-nascimento-button").click();
        }, 4000);
    };
});
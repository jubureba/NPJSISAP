$(document).ready(function (e) {

    $("#uploadForm4").on('submit', (function (e) {
        e.preventDefault();
        $.ajax({
            url: "pages/cadastro/pessoa/upload/php-img-upload/upload-img-residencia.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                $("#targetLayer4").html(data);
            },
            error: function () {
            }
        });
    }));

    $(function () { //FUNÇÃO PARA TRATAR A IMAGEM
        $("#upload-residencia").change(function () {
            var file = this.files[0];
            var imagefile = file.type;
            var match = ["image/jpeg", "image/png", "image/jpg"];
            if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                $('#previewing4').attr('src', 'dist/img/defaultimg.gif');
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
        $('#previewing4').attr('src', 'dist/img/loader.gif');
        setTimeout(function() { //SETA DEPOIS DE 2 SEGUNDOS A IMAGEM UPADA, E CHAMA A FUNÇÃO DO SUBMIT
            $("#upload-residencia").css("color", "green");
    
            $('#previewing4').attr('src', "../" +e.target.result);
            $('#previewing4').attr('width', '40px');
            $('#previewing4').attr('height', '40px');
            document.getElementById("upload-residencia-button").click();
        }, 4000);
    };
});
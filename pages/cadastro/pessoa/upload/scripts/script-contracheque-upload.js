$(document).ready(function (e) {

    $("#uploadForm5").on('submit', (function (e) {
        e.preventDefault();
        $.ajax({
            url: "pages/cadastro/pessoa/upload/php-img-upload/upload-img-contracheque.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                $("#targetLayer5").html(data);
            },
            error: function () {
            }
        });
    }));

    $(function () { //FUNÇÃO PARA TRATAR A IMAGEM
        $("#upload-contracheque").change(function () {
            var file = this.files[0];
            var imagefile = file.type;
            var match = ["image/jpeg", "image/png", "image/jpg"];
            if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
                $('#previewing5').attr('src', 'dist/img/defaultimg.gif');
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
        $('#previewing5').attr('src', 'dist/img/loader.gif');
        setTimeout(function() { //SETA DEPOIS DE 2 SEGUNDOS A IMAGEM UPADA, E CHAMA A FUNÇÃO DO SUBMIT
            $("#upload-contracheque").css("color", "green");

            $('#previewing5').attr('src', "../" +e.target.result);
            $('#previewing5').attr('width', '40px');
            $('#previewing5').attr('height', '40px');
            document.getElementById("upload-contracheque-button").click();
        }, 4000);
    };
});
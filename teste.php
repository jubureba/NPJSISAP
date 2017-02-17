
<html>
<head>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.5.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            var input = '<label style="display: block">Nome: <input type="text" name="foto[]" /> <a href="#" class="remove">X</a></label>';
            $("input[name='add']").click(function( e ){
                $('#inputs_adicionais').append( input );
            });

            $('#inputs_adicionais').delegate('a','click',function( e ){
                e.preventDefault();
                $( this ).parent('label').remove();
            });

        });
    </script>
</head>
<body>
<form action="" method="post">
    <label style="display: block"><input type="button" name="add" value="Add" /></label>
    <label style="display: block">Nome: <input type="text" name="foto[]"></label>
    <fieldset id="inputs_adicionais" style="border: none">
    </fieldset>
</form>
</body>
</html>
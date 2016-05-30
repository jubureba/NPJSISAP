<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
ini_set('default_charset','UTF-8');
session_start();
require_once("pages/config/conn_pdo.php");
include("pages/login/seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
$conn = Conectar();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>NPJ | Tela Principal</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="shortcut icon" href="imagens/logoSisAp.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/ionicons-2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="plugins/iCheck/all.css">
    <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">

    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <link rel="stylesheet" href="dist/css/form_Style.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/m2br.dialog.css"/>
    <script language="JavaScript" type="text/javascript" src="js/cidades-estados-1.4-utf8.js"></script> <!--cidades e estados -->
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <script type="text/javascript" src="pages/mediacao/paginador_tab_npj.js"></script>
    <script type="text/javascript" src="pages/mediacao/paginador_tab_def_pub.js"></script>
</head>


<body class="hold-transition skin-blue sidebar-mini">

</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Hover Data Table</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th style="width: 5%">Protocolo</th>
                            <th style="width: 20%">Assistido</th>
                            <th style="width: 20%">Requerido</th>
                            <th style="width: 10%">Data | Hora</th>
                            <th style="width: 10%">Status</th>
                            <th style="width: 35%">Assunto</th>
                        </tr>
                        </thead>

                        <tbody>

                        <tr>
                            <td>TESTE1</td>
                            <td>TESTE1</td>
                            <td>TESTE1</td>
                            <td>TESTE1</td>
                            <td>TESTE1</td>
                            <td>TESTE1</td>
                        </tr>

                        <?php
                        $conn = Conectar();
                        try{
                            $query_qtd1=$conn->prepare("
                                                                SELECT DISTINCT
                                                                    atend_npj.data_atend, atend_npj.id_status, atend_npj.proc_num, cliente.nome, situacao.status_atual, assuntos.assunto, 
                                                                    (SELECT nome FROM cliente c WHERE c.id_pessoas = cliente_npj.id_cliente_requer) as REQUERIDO 
                                                                    FROM 
                                                                    atend_npj, cliente, cliente_npj, situacao, assuntos 
                                                                    WHERE 
                                                                    cliente_npj.id_cliente_assist = cliente.id_pessoas 
                                                                    AND 
                                                                    cliente_npj.id_atend_npj = atend_npj.id_atend_npj 
                                                                    AND
                                                                    atend_npj.id_assunto = assuntos.id_assunto
                                                                    AND
                                                                    situacao.id_status = atend_npj.id_status
                                                                    ORDER BY 
                                                                    cliente_npj.id_cliente_npj");//COLOCAR WHERE COM ID DO ALUNO
                            $query_qtd1->execute();
                            while($query_tab=$query_qtd1->fetch(PDO::FETCH_ASSOC)){
                                echo $query_tab['proc_num'];
                                ?>
                                <tr id="dados">
                                    <td><?php echo $query_tab['proc_num'] ?></td>
                                    <td><?php echo $query_tab['nome']; ?></td>
                                    <td><?php echo $query_tab['REQUERIDO']; ?></td>
                                    <td><?php echo date('d/m/Y - h:m:s', strtotime($query_tab['data_atend'])); ?></td>
                                    <script type="text/javascript">
                                        var status = <?php echo $query_tab['id_status']; ?>;
                                        if (status == 1) {
                                            document.getElementById("stats").setAttribute("class", "label label-primary");
                                            document.getElementById("stats").setAttribute("id", "class1");
                                        }
                                        if (status == 4) {
                                            document.getElementById("stats").setAttribute("class", "label label-success");
                                            document.getElementById("stats").setAttribute("id", "class2");
                                        }
                                        if (status == 3) {
                                            document.getElementById("stats").setAttribute("class", "label label-danger");
                                            document.getElementById("stats").setAttribute("id", "class3");
                                        }
                                        if (status == 2) {
                                            document.getElementById("stats").setAttribute("class", "label label-warning");
                                            document.getElementById("stats").setAttribute("id", "class4");
                                        }
                                    </script>
                                    <td>
                                        <span id="stats" class="label label-success"><?php echo $query_tab['status_atual']; ?></span>
                                    </td>

                                    <td>
                                        <?php echo $query_tab['assunto']; ?>
                                    </td>-->
                                </tr>
                                <?php
                            }
                        } catch (Exception $e){
                            echo 'Erro: '.$e->getMessage();
                        }
                        ?>



                        </tbody>

                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->
<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
            showInputs: false
        });
    });
</script>

<script>
    $(function(){
        $("#tabela input").keyup(function(){

            var index = $(this).parent().index();
            var nth = "#tabela td:nth-child("+(index+1).toString()+")";
            var valor = $(this).val().toUpperCase();
            $("#tabela tbody tr").show();
            $(nth).each(function(){
                if($(this).text().toUpperCase().indexOf(valor) < 0){
                    $(this).parent().hide();
                }
            });
        });

        $("#tabela input").blur(function(){
            $(this).val("");
        });
    });
</script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
</body>
</html>
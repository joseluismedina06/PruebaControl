<?php 
include "class/pgSQL.php";
include "class/dataClass.php";

$pgSQL = new PgSQL();
$conn = $pgSQL->OpenConnection();

$data = new Data();
$json_data = $data->GetData($conn);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>SCIAN</title>
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default-dark/style.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script> -->

        <link rel="stylesheet" href="dist/themes/default/style.min.css" />
        <script src="js/jquery.min.js"></script>
        <script src="dist/jstree.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        
        <div id="id01" class="modal">
            <div class="modal-content">
                <div class="container">
                    <span onclick="document.getElementById('id01').style.display='none'" class="button display-topright">&times;</span>
                    
                    <span class="treeTitle">Códigos SCIAN</span>
                    <!-- Initialize jsTree -->
                    <div id="data_jstree">
            
                    </div>
                </div>
            </div>
        </div>

        <!-- Store folder list in JSON format -->
        <div class="modal">
            <textarea id='txt_jsondata'><?= json_encode($json_data) ?></textarea>
        </div>

        <br/><br/>
        <input type="text" id="codigo_scian" name="codigo_scian" />&nbsp;<img src="img/plus.png" width="16px" alt="Seleccionar código" id="mostrar" onclick="document.getElementById('id01').style.display='block'" />
    </body>
</html>

<script type="text/javascript">
    $('#mostrar').click(function(){
        var jsondata = JSON.parse($('#txt_jsondata').val());

        $('#data_jstree').jstree({ 'core' : {
            'data' : jsondata,
            'multiple': false,
            'themes': {
                'name'      : 'default',
                'variant'   : 'medium',
                'icons'     : false
            }
        } });
    });

    $('#data_jstree')
        // listen for event
        .on('changed.jstree', function (e, data) {
            var i, j, r = [];
            for(i = 0, j = data.selected.length; i < j; i++) {
                r.push(data.instance.get_node(data.selected[i]).text);
            }

            var text = r.join(', ');
            var text_array = text.split(' ');
            $('#codigo_scian').val(text_array[0]);
        })

    // $('#data_jstree').on("changed.jstree", function (e, data) {
    //     // open a new window with your url
    //     // window.open("http://www.google.com/");
    //     // call a function
    //     myFunction();
    // });

    // function myFunction() {
    //     alert("Hola");
    // }
</script>
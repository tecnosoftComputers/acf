    
    
    <script src="<?php echo PUERTO."://".HOST;?>/js/jquery-3.0.0.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/metisMenu/metisMenu.min.js"></script>

    <script src="<?php echo PUERTO."://".HOST;?>/js/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/datatables-responsive/dataTables.responsive.js"></script>
    
    <script src="<?php echo PUERTO."://".HOST;?>/js/sb-admin-2.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/flot/excanvas.min.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/flot/jquery.flot.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/flot/jquery.flot.time.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/flot-data.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/sweetalert.v2.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/jquery-ui.min.js"></script> 
    <script src="<?php echo PUERTO."://".HOST;?>/js/valida.js"></script>
    <script src="<?php echo PUERTO."://".HOST;?>/js/bootstrap-select.min.js"></script>

    <?php
        if (isset($template_js) && is_array($template_js)){
          foreach($template_js as $file_js){
            if(!empty($file_js)){
                echo '<script type="text/javascript" src="'.PUERTO.'://'.HOST.'/js/'.$file_js.'.js"></script>';
            }
          }  
        }
    ?>

    <!--mensajes de error y exito-->
    <?php if (isset($sess_err_msg) && !empty($sess_err_msg)){
      echo "<script type='text/javascript'>
            $(document).ready(function(){          
              Swal.fire({            
                text: '".$sess_err_msg."',
                imageUrl: '".PUERTO."://".HOST."/imagenes/wrong-04.png',
                imageWidth: 75,
                confirmButtonText: 'OK',
                animation: true
              });     
            });
          </script>";
    }?>

    <?php if (isset($sess_suc_msg) && !empty($sess_suc_msg)){
      echo "<script type='text/javascript'>
            $(document).ready(function(){
              Swal.fire({            
                text: '".$sess_suc_msg."',
                imageUrl: '".PUERTO."://".HOST."/imagenes/check-01.png',
                imageWidth: 75,
                confirmButtonText: 'OK',
                animation: true
              });          
            });
          </script>";
    }?> 
      

    <script>

        function openNav() {
          document.getElementById("mySidenav").style.width = "250px";
          $('ul.nav').removeClass('collapse');
        }

        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
        }

        $(document).ready(function() {
    $('#dataTables-example').DataTable( {
        //"scrollY":        "380px",
        //"scrollCollapse": true,
        "paging":         true
    } );
} );
    
    
    $(document).ready(function() {
    $('#example2').DataTable( {
        "scrollY":        "380px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );
    
    $(document).ready(function() {
    $('#example3').DataTable( {
        "scrollY":        "380px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );
    
    $(document).ready(function() {
    $('#example4').DataTable( {
        "scrollY":        "380px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );

    $(document).ready(function() {
    $('#example5').DataTable( {
        "scrollY":        "380px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );

    $(document).ready(function() {
    $('#example6').DataTable( {
        "scrollY":        "380px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );

    $(document).ready(function() {
    $('#example7').DataTable( {
        "scrollY":        "380px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );

    $(document).ready(function() {
    $('#example8').DataTable( {
        "scrollY":        "380px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );

    $(document).ready(function() {
    $('#example9').DataTable( {
        "scrollY":        "380px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );

    $(document).ready(function() {
    $('#example10').DataTable( {
        "scrollY":        "380px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );

    $(document).ready(function() {
    $('#example11').DataTable( {
        "scrollY":        "380px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );

    $(document).ready(function() {
    $('#example12').DataTable( {
        "scrollY":        "380px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );

    $(document).ready(function() {
    $('#example13').DataTable( {
        "scrollY":        "380px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );

    $(document).ready(function() {
    $('#example14').DataTable( {
        "scrollY":        "380px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );
    </script>

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 750px; margin-left:-100px">
        
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Chart of Accounts</h4>
            </div>
            
            <div class="modal-body"  style="height:460px; overflow:auto;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                           <div class="tab-content">
                                <div class="tab-pane fade in active" id="contentBody">
                                    <!--<table id="accounts" class="display table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Number</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="contentBody">
                                            
                                        </tbody>
                                    </table>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="buttonClose">Close</button>
            </div>
        </div>
    </div>
</div> <!--  FIN MODAL 1 -->
<input type="hidden" name="field_name" id="field_name" value="" >
<input type="text" hidden id="puerto_host" value="<?php echo PUERTO."://".HOST ;?>">
</body>
</html>
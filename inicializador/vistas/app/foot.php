    </div>

    <script src="<?php echo PUERTO.'://'.HOST; ?>/inicializador/js/valida.js"></script>
    
    <script src="<?php echo PUERTO.'://'.HOST; ?>/inicializador/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo PUERTO.'://'.HOST; ?>/inicializador/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo PUERTO.'://'.HOST; ?>/inicializador/vendor/metisMenu/metisMenu.min.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="<?php echo PUERTO.'://'.HOST; ?>/inicializador/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo PUERTO.'://'.HOST; ?>/inicializador/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo PUERTO.'://'.HOST; ?>/inicializador/vendor/datatables-responsive/dataTables.responsive.js"></script>
    
    <script src="<?php echo PUERTO.'://'.HOST; ?>/inicializador/dist/js/sb-admin-2.js"></script>
    <script src="<?php echo PUERTO.'://'.HOST; ?>/inicializador/vendor/flot/excanvas.min.js"></script>
    <script src="<?php echo PUERTO.'://'.HOST; ?>/inicializador/vendor/flot/jquery.flot.js"></script>
    <script src="<?php echo PUERTO.'://'.HOST; ?>/inicializador/vendor/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo PUERTO.'://'.HOST; ?>/inicializador/vendor/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo PUERTO.'://'.HOST; ?>/inicializador/vendor/flot/jquery.flot.time.js"></script>
    <script src="<?php echo PUERTO.'://'.HOST; ?>/inicializador/vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo PUERTO.'://'.HOST; ?>/inicializador/data/flot-data.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable( {
                //"scrollY":        "380px",
                //"scrollCollapse": true,
                "paging":         false
            } );
        } );
    
    
    $(document).ready(function() {
        $('#example2').DataTable( {
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
                <h4 class="modal-title">Plan de Cuentas</h4>
            </div>
            
            <div class="modal-body"  style="height:500px;overflow:auto;">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                           <div class="tab-content">
                                <div class="tab-pane fade in active" id="home-pills">
                                    <table id="accounts" class="display table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Number</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="contentBody">
                                            
                                        </tbody>
                                    </table>
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


<input type="hidden" name="field_name" id="field_name" value="" />
</body>
</html>
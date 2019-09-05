    </div>

    <div class="modal fade" id="modalViewTemplate">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myViewTemplate">View Template</h4>
                </div>
                <div class="modal-body" style="height:70%; overflow:auto;">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body" align="center" id="contentTemplate">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    
    <script src="../../../vendor/jquery/jquery.min.js"></script>
    <script src="../../../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../../../vendor/raphael/raphael.min.js"></script>
    <!--<script src="../../../vendor/morrisjs/morris.min.js"></script>-->
    <script src="../../../data/morris-data.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../../../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../../../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../../../vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script src="../../../dist/js/sb-admin-2.js"></script>
    <script src="../../../js/valida.js"></script>
    
     <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

    </body>
</html>
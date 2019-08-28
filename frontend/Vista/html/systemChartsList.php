<div id="page-wrapper"><br />
    <div class="alert alert-info"><p>Operations / Files / System Charts  <a style="float: right; color: #fff" href="<?php echo PUERTO."://".HOST.'/dashboard/'; ?>">Volver</a></p></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body" style="height: 500px; overflow: auto;">
                    <span id="pdf" style="float: right; margin-left: 10px"><a href="<?php echo PUERTO."://".HOST.'/systemChartsReport/excel/'; ?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i></a></span>
                    <span id="excel" style="float: right"><a href="<?php echo PUERTO."://".HOST.'/systemChartsReport/pdf/'; ?>" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a></span>
                    
                    <ul class="nav nav-pills">
                        <li class="active"><a id="list" href="#home-pills" data-toggle="tab"><i class="fa fa-th-list"></i> List System Chart</a></li>
                    </ul>
                    

                    <!-- Tab panes -->  
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home-pills">
                            <br>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="systemCharts">
                                <thead>
                                    <tr>
                                        <th align="center" width=220>Code</th>
                                        <th align="center" >Name</th>
                                        <th align="center" width=220>Select</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach( (array) $systemCharts as $registro2 ){ ?>
                                        <tr class='odd gradeX' data-toggle="collapse" data-target="#demo<?php echo $registro2['CODIGO']; ?>" class="accordion-toggle">
                                            <td><?php echo $registro2['CODIGO'] ?></td>
                                            <td><?php echo $registro2['NOMBRE'] ?></td>
                                            <td align="center"><a href="<?php echo PUERTO."://".HOST.'/'.$registro2['ROUTE']; ?>"><i class="fa fa-check"></i></a></td>   
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- FIN TAB CONTENT -->
                </div>
            </div>
        </div>
        <div class="col-lg-2">
        </div>
    </div>
</div>
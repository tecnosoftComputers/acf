<div id="page-wrapper"><br />
    <div class="alert alert-info"><p>Accounting / Files / Accounting Accounts / <a style="float: right; color: #fff" href="<?php echo PUERTO."://".HOST.'/dashboard/'; ?>">Volver</a></p></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="nav nav-pills">
                        <li class="active"><a href="#home-pills" data-toggle="tab"><i class="fa fa-th-list"></i> Accounting Accounts</a></li>
                        <li><a href="<?php echo PUERTO."://".HOST.'/accountsCreate/' ?>"><i class="fa fa-plus-square-o"></i> New Accounts</a></li>
                    </ul>

                    <!-- Tab panes -->  
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="home-pills">
                            <br>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th align="center" width=50><i class="fa fa-check"></i></th>
                                        <th align="center" width=220>Cuenta</th>
                                        <th align="center" width=300>Nombre</th>
                                        <th align="center">Saldo</th>
                                        <th align="center">Update</th>
                                        <th align="center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach( (array) $one as $registro2 ){ ?>
                                        <tr class='odd gradeX' data-toggle="collapse" data-target="#demo<?php echo $registro2['CODIGO_AUX']; ?>" class="accordion-toggle">
                                            <?php
                                            $var = $registro2['CODIGO'];
                                            $newvar = substr($var, -1);
                                            if ($newvar == '.'){ ?>
                                                <td><a href="<?php echo PUERTO."://".HOST.'/accountsAdd/'.Utils::encriptar($registro2['CODIGO']).'/'; ?>" class='userinfo'><i class="fa fa-check"> Add</i></a></td>
                                                <td><strong><?php echo $registro2['CODIGO'] ?></strong></td>
                                                <td><strong><?php echo $registro2['NOMBRE'] ?></strong></td>
                                                <td align="center">$0.00</td>
                                                
                                                <td align="center"><a href="<?php echo PUERTO."://".HOST.'/accountsUpdate/'.Utils::encriptar($registro2['CODIGO']).'/'; ?>"><i class="fa fa-edit"></i></a></td>
                                                <td align="center"><a href="<?php echo PUERTO."://".HOST.'/accountsDelete/'.Utils::encriptar($registro2['CODIGO']).'/'; ?>"><i class="fa fa-trash"></i></a></td>
                                            <?php }else{ ?>
                                                <td ><a href="<?php echo PUERTO."://".HOST.'/accountsAdd/'.Utils::encriptar($registro2['CODIGO']).'/'; ?>" class='userinfo'><i class="fa fa-check"> Add</i></a></td>
                                                <td><?php echo $registro2['CODIGO'] ?></td>
                                                <td><?php echo $registro2['NOMBRE'] ?></td>
                                                <td align="center">$0.00</td>
                                                <td align="center"><a href="<?php echo PUERTO."://".HOST.'/accountsUpdate/'.Utils::encriptar($registro2['CODIGO']).'/'; ?>"><i class="fa fa-edit"></i></a></td>
                                                <td align="center"><a href="<?php echo PUERTO."://".HOST.'/accountsDelete/'.Utils::encriptar($registro2['CODIGO']).'/'; ?>"><i class="fa fa-trash"></i></a></td>                 
                                            <?php } ?>
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
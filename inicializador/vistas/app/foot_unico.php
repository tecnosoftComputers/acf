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
                                <header style="border-bottom:1px solid #333;padding-left:5px; font-family:Arial; padding-bottom:0px;"><table><tr><td><img src="imagenes/_LOGO_" width="20%"></td><td align="right" width="750"><p style="font-size:16px; "><b>_COMPANY_</b><p><p style="font-size:15px;">User: _USER_</p><p style="font-size:15px;">Printing date: _PRINT_DATE_</p></td></tr></table></header>
                                <body style="font-family: Arial; font-size:14px;"><br><br><br><p align="center" style="font-size:14px;"><b>_TITLE_</b></p>

<table width="100%" id="table2" border="1" style="border-collapse: collapse; font-size:11px; font-family:Arial;">
<tr>
<td width="20%" align="left" style="padding-top:5px; padding-bottom:2px; background: #ddd;"><b>Date of issue:</b></td>
<td colspan="4" align="left" style="padding-top:5px; padding-bottom:2px;">_DATE_</td>
<td colspan="2" width="30%" align="right" style="padding-top:5px; padding-bottom:2px;"><b>BY.: _TOTALS_</b></td>
</tr>
<tr>
<td align="left" style="padding-top:5px; padding-bottom:2px; background: #ddd;"><b>Beneficiary:</b></td>
<td colspan="6" align="left" style="padding-top:5px; padding-bottom:2px;">_BENEFICIARY_</td>
</tr>
<tr>
<td align="left" style="padding-top:5px; padding-bottom:2px; background: #ddd;"><b>Amount of:</b></td>
<td colspan="6" align="left" style="padding-top:5px; padding-bottom:2px;">_AMOUNT_</td>
</tr>
<tr>
<td align="left" style="padding-top:5px; padding-bottom:2px; background: #ddd;"><b>Turned on:</b></td>
<td  width="30%" align="left" style="padding-top:5px; padding-bottom:2px;">_TURNED_</td>
<td align="left" width="10%" style="padding-top:5px; padding-bottom:2px; background: #ddd;"><b>Account:</b></td>
<td colspan="2" width="15%" align="left" style="padding-top:5px; padding-bottom:2px;">_ACCOUNT_</td>
<td align="left" width="8%" style="padding-top:5px; padding-bottom:2px; background: #ddd;"><b>Check #:</b></td>
<td  width="15%" align="left" style="padding-top:5px; padding-bottom:2px;">_CHECK_</td>
</tr>
<tr>
<td align="left" style="vertical-align:top; padding-top:5px; padding-bottom:2px; background: #ddd;"><b>Memo:</b></td>
<td colspan="6" align="left" style="padding-top:5px; padding-bottom:2px;">_MEMO_</td>
</tr>
</table>
_TRANSACTION_
<p align="center" style="font-size:14px;"><b>
SEAT DETAIL</b></p>
<table width="100%" id="table1" border="1" style="border-collapse: collapse;font-size:11px; font-family:Arial;">
<tr style="background: #ddd;">
<td align="center" style="padding-top:5px; padding-bottom:2px;"><b>Account</b></td>
<td align="center" style="padding-top:5px; padding-bottom:2px;"><b>Name</b></td>
<td align="center" style="padding-top:5px; padding-bottom:2px;"><b>Debit</b></td>
<td align="center" style="padding-top:5px; padding-bottom:2px;"><b>Credit</b></td>
</tr>
_BODY_
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<table>
<tr>
<td><hr>Management:<br> Identification:</td>
<td width="100%"></td>
<td><hr>Accounting:<br> Identification:</td>
<td width="100%"></td>
<td><hr>Reviewed by:<br> Identification:</td>
</tr>
</table>
</body><footer style="text-align:center;"><table style="border-top:1px solid #333;font-size:10px; font-family:Arial"><tr><td width="700">Online accounting</td><td align="right">Page: {PAGENO}</td><tr></table></footer>
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
<?php 
    if (permiso(5)){
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-lock"></i> Auditoría
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <h3 class="box-title"> &nbsp Lista de acciones </h3>
                    <div class="box-header">
                        <div class="col-xs-12">
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover nuevaTable table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Login</th>
                                            <th>Acción</th>
                                            <th>Fecha</th>
                                            <th>Tabla</th>
                                            <th>SQL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if (!empty($Auditoria)) {
                                                foreach ($Auditoria as $record) {?>
                                                <tr>
                                                    <td><?php echo $record->usuario ?></td>
                                                    <td><?php echo $record->accion ?></td>
                                                    <td><?php echo $record->fecha ?></td>
                                                    <td><?php echo $record->tabla ?></td>
                                                    <td><?php echo $record->query ?></td>
                                                </tr>
                                            <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="box">
                    <h3 class="box-title"> &nbsp Accesos al Sistema</h3>
                    <div class="box-header">
                        <div class="col-xs-12">
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover nuevaTable table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Dotos de seción</th>
                                            <th>Ip</th>
                                            <th>S.O.</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if (!empty($vAuditoria)) {
                                                foreach ($vAuditoria as $record) {
                                        ?>
                                            <tr>
                                                <td><?php echo $record->userId ?></td>
                                                <td><?php echo $record->sessionData ?></td>
                                                <td><?php echo $record->machineIp ?></td>
                                                <td><?php echo $record->platform ?></td>
                                                <td><?php echo $record->createdDtm ?></td>
                                            </tr>
                                            <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js" charset="utf-8"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js" charset="utf-8"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" charset="utf-8"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" charset="utf-8"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" charset="utf-8"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js" charset="utf-8"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        $('.nuevaTable').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'deferRender': true,
            'info': true,
            'autoWidth': true,
            'filter': true,
            "language": {
                "url": "<?php echo base_url(); ?>assets/bower_components/datatables.net/Spanish.json"
            },
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
        })
    });
</script>
<?php 
}
else
    redirect('accessDeny');
?>
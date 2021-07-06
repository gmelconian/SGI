<?php 
    if (permiso(2)||permiso(3)||permiso(4)) {
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-table"></i> &nbsp Oficina
            <small>Agregar, Editar, Borrar</small>
        </h1>
    </section>
    <section class="content">
        <?php if (permiso(2)) { ?>
            <div class="row">
                <div class="col-xs-12 text-right">
                    <div class="form-group">
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>altaOficina"><i class="fa fa-plus"></i> Agregar nuevo</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <h3 class="box-title"> &nbsp Lista de Oficinas </h3>
                    <div class="box-header">
                        <div class="col-xs-12">
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover nuevaTable table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Unidad Ejecutora</th>
                                            <th>Teléfono</th>
                                            <th>Piso</th>
                                            <th>Edificio</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if (!empty($oficinas)) {
                                                foreach ($oficinas as $record) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $record->codigo ?></td>
                                                    <td><?php echo $record->nombre ?></td>
                                                    <td>
                                                        <?php 
                                                            switch ($record->unidad) {
                                                                case 1:
                                                                        echo "DGS";
                                                                    break;
                                                                case 2:
                                                                        echo "DINAVI";
                                                                    break;
                                                                case 3:
                                                                        echo "DINOT";
                                                                    break;
                                                                case 4:
                                                                        echo "DINAGUA";
                                                                    break;
                                                                case 5:
                                                                        echo "DINAMA";
                                                                    break;                                                                    
                                                            }                                                        
                                                        ?>
                                                    </td>
                                                    <td><?php echo $record->telefono ?></td>
                                                    <td><?php echo $record->piso ?></td>
                                                    <td><?php echo $record->edificio ?></td>
                                                    <td class="text-center">
                                                    <?php if (permiso(2) || permiso(3)) { ?>
                                                        <a class="btn btn-sm btn-info" href="<?php echo base_url() . 'editOficina/' . $record->codigo; ?>" title="Editar"><i class="fa fa-pencil"></i></a>
                                                    <?php } if (permiso(2)) { ?>   
                                                        <a class="btn btn-sm btn-danger deleteOficina" href="#" data-oficina="<?php echo $record->codigo; ?>" title="Eliminar"><i class="fa fa-trash"></i></a>
                                                    <?php } ?>
                                                        <a class="btn btn-sm btn-primary" href="<?php echo base_url() . 'infoOficina/' . $record->codigo; ?>" title="info"><i class="fa fa-info"></i></a>
                                                    </td>
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
<script type="text/javascript">
    jQuery(document).ready(function() {
        $('.nuevaTable').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
            "language": {
                "url": "<?php echo base_url(); ?>assets/bower_components/datatables.net/Spanish.json"
            }
        })
    });
</script>
<?php 
}
else
    redirect('accessDeny');
?>
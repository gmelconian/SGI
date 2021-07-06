<?php 
    if (permiso(2)||permiso(3)||permiso(4)) {
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-bank"></i> Proveedores
            <small>Agregar, Editar, Borrar</small>
        </h1>
    </section>
    <section class="content">
        <?php if (permiso(2)) { ?> 
            <div class="row">
                <div class="col-xs-12 text-right">
                    <div class="form-group">
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>addEmpresa"> Nuevo Proveedor </a>

                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <h3 class="box-title"> &nbsp Lista de Proveedores </h3>
                    <div class="box-header">
                        <div class="col-xs-12">
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover nuevaTable table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Nombre fantacia</th>
                                            <th>Razón Social</th>
                                            <th>RUT</th>
                                            <th>Teléfono</th>
                                            <th>Email</th>
                                            <th>Contacto</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($userRecords)) {
                                            foreach ($userRecords as $record) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $record->codigo ?></td>
                                                    <td><?php echo $record->nombre_fantacia ?></td>
                                                    <td><?php echo $record->razon_social ?></td>
                                                    <td><?php echo $record->rut ?></td>
                                                    <td><?php echo $record->telefono ?></td>
                                                    <td><?php echo $record->email ?></td>
                                                    <td><?php echo $record->contacto ?></td>
                                                    <td class="text-center">
                                                        <?php if (permiso(2) || permiso(3)){ ?>
                                                            <a class="btn btn-sm btn-info" href="<?php echo base_url() . 'editEmpresa/' . $record->codigo; ?>" title="Editar"><i class="fa fa-pencil"></i></a>
                                                        <?php } if (permiso(2)){ ?>    
                                                            <a class="btn btn-sm btn-danger deleteEmpresa" href="#" data-user="<?php echo $record->codigo; ?>" title="Eliminar"><i class="fa fa-trash"></i></a>
                                                        <?php
                                                            }
                                                        ?>
                                                            <a class="btn btn-sm btn-primary" href="<?php echo base_url() . 'infoEmpresa/' . $record->codigo; ?>" title="info"><i class="fa fa-info"></i></a>
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

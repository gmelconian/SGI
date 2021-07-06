<?php 
    if (permiso(2)||permiso(3)||permiso(4)) {
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-building"></i> &nbsp Edificio
            <small>Agregar, Editar, Borrar</small>
        </h1>
    </section>
    <section class="content">
        <?php if (permiso(2)) { ?>
            <div class="row">
                <div class="col-xs-12 text-right">
                    <div class="form-group">
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>altaEdificio"><i class="fa fa-plus"></i> Agregar nuevo</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <h3 class="box-title"> &nbsp Lista de Edificios </h3>
                    <div class="box-header">
                        <div class="col-xs-12">
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover nuevaTable table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nombre</th>
                                            <th>Departamento</th>
                                            <th>Ciudad</th>
                                            <th>Calle</th>
                                            <th>Número</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if (!empty($edificios)) {
                                                foreach ($edificios as $record) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $record->codigo ?></td>
                                                    <td><?php echo $record->nombre ?></td>
                                                    <td>
                                                        <?php 
                                                            switch ($record->departamento) {
                                                                case 1:
                                                                        echo 'Montevideo';
                                                                    break;
                                                                case 2:
                                                                        echo 'Artigas';
                                                                    break;
                                                                case 3:
                                                                        echo 'Canelones';
                                                                    break;
                                                                case 4:
                                                                        echo 'Cerro Largo';
                                                                    break;
                                                                case 5:
                                                                        echo 'Colonia';
                                                                    break; 
                                                                case 6:
                                                                        echo 'Durazno';
                                                                    break;
                                                                case 7:
                                                                        echo 'Flores';
                                                                    break;
                                                                case 8:
                                                                        echo 'Florida';
                                                                    break;
                                                                case 9:
                                                                        echo 'Lavalleja';
                                                                    break;
                                                                case 10:
                                                                        echo 'Maldonado';
                                                                    break;
                                                                case 11:
                                                                        echo 'Paysandu';
                                                                    break;
                                                                case 12:
                                                                        echo 'Rio Negro';
                                                                    break;
                                                                case 13:
                                                                        echo 'Rivera';
                                                                    break;
                                                                case 14:
                                                                        echo 'Rocha';
                                                                    break;
                                                                case 15:
                                                                        echo 'Salto';
                                                                    break;
                                                                case 16:
                                                                        echo 'San Jose';
                                                                    break;
                                                                case 17:
                                                                        echo 'Soriano';
                                                                    break;
                                                                case 18:
                                                                        echo 'Tacuarembo';
                                                                    break;
                                                                case 19:
                                                                        echo 'Treinta y Tres';
                                                                    break;
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $record->ciudad ?></td>
                                                    <td><?php echo $record->calle ?></td>
                                                    <td><?php echo $record->numero ?></td>
                                                    <td class="text-center">
                                                    <?php if (permiso(2)||permiso(3)) { ?>
                                                        <a class="btn btn-sm btn-info" href="<?php echo base_url() . 'editEdificio/' . $record->codigo; ?>" title="Editar"><i class="fa fa-pencil"></i></a>
                                                    <?php } if (permiso(2)) { ?>    
                                                        <a class="btn btn-sm btn-danger deleteEdificio" href="#" data-edificio="<?php echo $record->codigo; ?>" title="Eliminar"><i class="fa fa-trash"></i></a>
                                                    <?php } ?>
                                                        <a class="btn btn-sm btn-primary" href="<?php echo base_url() . 'infoEdificio/' . $record->codigo; ?>" title="info"><i class="fa fa-info"></i></a>
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
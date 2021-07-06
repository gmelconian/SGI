<?php 
    if (permiso(2)||permiso(3)||permiso(4)){
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Usuarios
            <small>Agregar, Editar, Borrar</small>
        </h1>
    </section>
    <section class="content">
        <?php if (permiso(2)) { ?>
            <div class="row">
                <div class="col-xs-12 text-right">
                    <div class="form-group">
                        <a class="btn btn-primary" href="<?php echo base_url(); ?>addNew"><i class="fa fa-plus"></i> Agregar nuevo</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <h3 class="box-title"> &nbsp Lista de Usuarios </h3>
                    <div class="box-header">
                        <div class="col-xs-12">
                            <div class="box-body table-responsive no-padding">
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover nuevaTable table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Login</th>
                                                <th>Email</th>
                                                <th>Nombre completo</th>
                                                <th>Teléfono</th>
                                                <th>Rol</th>
                                                <th >Acciones</th>
                                        
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($userRecords)) {
                                                foreach ($userRecords as $record) {
                                                    if (permiso(2) || permiso(3)){ ?>
                                                        <tr>
                                                            <td><?php echo $record->login ?></td>
                                                            <td><?php echo $record->email ?></td>
                                                            <td><?php echo $record->nombre ?></td>
                                                            <td><?php echo $record->telefono ?></td>
                                                            <td><?php echo $record->tipo ?></td>
                                                            <td class="text-center">
                                                                <a class="btn btn-sm btn-primary" href="<?php echo base_url() . 'infoUsuario/' . $record->login; ?>" title="Info"><i class="fa fa-info"></i></a>
                                                                <a class="btn btn-sm btn-info" href="<?php echo base_url() . 'editOld/' . $record->login; ?>" title="Editar"><i class="fa fa-pencil"></i></a>
                                                            <?php if (permiso(2)){?>    
                                                                <a class="btn btn-sm btn-danger deleteUser" href="#" data-user="<?php echo $record->login; ?>" title="Eliminar"><i class="fa fa-trash"></i></a>
                                                            <?php }?>
                                                            </td>                                                        
                                                        </tr>

                                            <?php
                                                    }elseif ($record->tipo == 'Consulta') {?>
                                                        <tr>
                                                            <td><?php echo $record->login ?></td>
                                                            <td><?php echo $record->email ?></td>
                                                            <td><?php echo $record->nombre ?></td>
                                                            <td><?php echo $record->telefono ?></td>
                                                            <td><?php echo $record->tipo ?></td>
                                                            <td class="text-center">
                                                                <a class="btn btn-sm btn-primary" href="<?php echo base_url() . 'infoUsuario/' . $record->login; ?>" title="Info"><i class="fa fa-info"></i></a>
                                                            </td>
                                                        </tr>
                                            <?php  }
                                                }
                                            }?>
                                            <?php
                                            if (!empty($personaRecords)) {
                                                foreach ($personaRecords as $record) {
                                                    if (permiso(2) || permiso(3)){ ?>
                                                        <tr>
                                                            <td><?php echo $record->login ?></td>
                                                            <td><?php echo $record->email ?></td>
                                                            <td><?php echo $record->nombre ?></td>
                                                            <td><?php echo $record->telefono ?></td>
                                                            <td><?php echo "Persona" ?></td>
                                                            <td class="text-center">
                                                                <a class="btn btn-sm btn-primary" href="<?php echo base_url() . 'infoPersona/' . $record->login; ?>" title="Info"><i class="fa fa-info"></i></a>
                                                                <a class="btn btn-sm btn-info" href="<?php echo base_url() . 'editPersona/' . $record->login; ?>" title="Editar"><i class="fa fa-pencil"></i></a>   
                                                                <a class="btn btn-sm btn-success" href="<?php echo base_url() . 'asignaOficina/' . $record->login; ?>" title="Asignar"><i class="fa fa-sitemap"></i></a>
                                                            </td>                                                        
                                                        </tr>
                                            <?php
                                                    }
                                                }
                                            }?>            
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
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
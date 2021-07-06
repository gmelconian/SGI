<?php 
    if (permiso(2)||permiso(3)||permiso(4)) {
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-stack-overflow"></i> Equipamiento
            <small>Mover, Eliminar</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12"> 
                <div class="box">
                    <h3 class="box-title"> &nbsp Listado de stock</h3>
                    <div class="box-header">
                        <div class="col-xs-12">
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover nuevaTable table-bordered" id="tabla">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Tipo</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Cantidad</th>
                                            <th>Descripción</th>
                                            <th>Host</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($insumos)){ ?>
                                        <?php foreach($insumos as $record){ ?>
                                                <tr>
                                                    <td><?php echo $record->codigo ?></td>
                                                    <td><?php echo $record->tipo ?></td>
                                                    <td><?php echo $record->marca ?></td>
                                                    <td><?php echo $record->modelo ?></td>
                                                    <td><?php echo $record->cantidad ?></td>
                                                    <td><?php echo $record->descripcion ?></td>
                                                    <td><?php echo "---" ?></td>
                                                    <td class="text-center">
                                                        <?php if (permiso(2)|| permiso(3)) {?> 
                                                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'asignarStockInsumo/'.$record->codigo.'/'.$record->tipo; ?>" title="Asignar"><i class="fa fa-user-plus"></i></a>                                                            
                                                        <?php
                                                        }?>                                                        
                                                    </td>
                                                </tr>
                                            <?php }}?>
                                    <?php if(!empty($equipo)){ ?>
                                        <?php foreach($equipo as $record){ ?>
                                                <tr>
                                                    <td><?php echo $record->codigo ?></td>
                                                    <td><?php echo $record->tipo ?></td>
                                                    <td><?php echo $record->marca ?></td>
                                                    <td><?php echo $record->modelo ?></td>
                                                    <td><?php echo '1' ?></td>
                                                    <td><?php echo $record->descripcion ?></td>
                                                    <td><?php echo $record->host ?></td>
                                                    <td class="text-center">
                                                        <?php if (permiso(2)|| permiso(3)) {?> 
                                                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'asignarStockEquipo/'.$record->codigo.'/'.$record->tipo; ?>" title="Asignar"><i class="fa fa-user-plus"></i></a>
                                                        <?php
                                                        }?>
                                                    </td>
                                                </tr>
                                            <?php }}?>            
                                    </tbody>
                                </table>                          
                            </div>                    
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
        $(".oculto").hide();
        $('.nuevaTable').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
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


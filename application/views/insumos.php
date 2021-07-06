<?php 
    if (permiso(2)||permiso(3)||permiso(4)) {
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-tint"></i> Insumos
            <small>Agregar, Editar, Eliminar</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <?php if (permiso(2)){ ?> 
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>creaInsumo"><i class="fa fa-plus"></i> Agregar Insumos</a>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-xs-12"> 
                <div class="box">
                    <h3 class="box-title"> &nbsp Lista de insumos</h3>
                    <div class="box-header">
                        <div class="col-xs-12">
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover nuevaTable table-bordered" id="tabla">
                                    <thead>
                                        <tr>
                                            <th>Código Qr</th>
                                            <th>Tipo</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Cantidad</th>
                                            <th>Descripción</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($insumos)){ ?>
                                        <?php foreach($insumos as $record){ ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <img  id="qr" name="qr" alt="qr" src="<?php 
                                                            $texto = str_replace('INS' , 'min_INS' , $record->qr );
                                                            echo $texto; 
                                                        ?>">
                                                    </td>
                                                    <td><?php echo $record->tipo ?></td>
                                                    <td><?php echo $record->marca ?></td>
                                                    <td><?php echo $record->modelo ?></td>
                                                    <td><?php echo $record->cantidad ?></td>
                                                    <td><?php echo $record->descripcion ?></td>
                                                    <td class="text-center">
                                                        <?php if (permiso(2)|| permiso(3)) {?> 
                                                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'editarinsumo/'.$record->codigo; ?>" title="Editar"><i class="fa fa-pencil"></i></a>
                                                        <?php } if (permiso(2)) {?> 
                                                            <a class="btn btn-sm btn-danger deleteInsumo" href="#" data-insumo="<?php echo $record->codigo; ?>" title="Eliminar"><i class="fa fa-trash"></i></a>
                                                        <?php
                                                        }?>
                                                        <a class="btn btn-sm btn-primary" href="<?php echo base_url().'infoInsumo/'.$record->codigo; ?>" title="info"><i class="fa fa-info"></i></a>
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


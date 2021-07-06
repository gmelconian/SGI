<?php 
    if (permiso(2)||permiso(3)||permiso(4)) {
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-microchip"></i> Componentes
            <small>Agregar, Editar, Eliminar</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <?php if (permiso(2)){ ?> 
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>creaComponente"><i class="fa fa-plus"></i> Agregar Componente</a>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-xs-12"> 
                <div class="box">
                    <h3 class="box-title"> &nbsp Lista de Componentes</h3>
                    <div class="box-header">
                        <div class="col-xs-12">
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover nuevaTable table-bordered" id="tabla">
                                    <thead>
                                        <tr>
                                            <th>Código QR</th>
                                            <th>Tipo</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Descripción</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(!empty($componentes)){ ?>
                                        <?php foreach($componentes as $record){ ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <img  id="qr" name="qr" alt="qr" src="<?php
                                                            switch ($record->tipo) {
                                                                case 'TECLADO':
                                                                    $texto = str_replace('TEC' , 'min_TEC' , $record->qr );
                                                                    break;
                                                                case 'RATON':
                                                                    $texto = str_replace('RAT' , 'min_RAT' , $record->qr );
                                                                    break;
                                                                case 'DISCO':
                                                                    $texto = str_replace('HDD' , 'min_HDD' , $record->qr );;
                                                                    break;
                                                                case 'FUENTE':
                                                                    $texto = str_replace('POW' , 'min_POW' , $record->qr );
                                                                    break;
                                                                case 'OTRO':
                                                                    $texto = str_replace('OTRO' , 'min_OTRO' , $record->qr );
                                                                    break;
                                                            }
                                                            echo $texto; 
                                                        ?>">
                                                    </td>
                                                    <td><?php echo $record->tipo ?></td>
                                                    <td><?php echo $record->marca ?></td>
                                                    <td><?php echo $record->modelo ?></td>
                                                    <td><?php echo $record->descripcion ?></td>
                                                    <td class="text-center">
                                                        <?php if (permiso(2)||permiso(3)) {?> 
                                                            <a class="btn btn-sm btn-info" href="<?php echo base_url().'editarComponente/'.$record->codigo; ?>" title="Editar"><i class="fa fa-pencil"></i></a>
                                                        <?php} if (permiso(2)) {?>    
                                                            <a class="btn btn-sm btn-danger deleteInsumo" href="#" data-insumo="<?php echo $record->codigo; ?>" title="Eliminar"><i class="fa fa-trash"></i></a>
                                                        <?php
                                                        }?>
                                                        <a class="btn btn-sm btn-primary" href="<?php echo base_url().'infoComponente/'.$record->codigo; ?>" title="info"><i class="fa fa-info"></i></a>
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
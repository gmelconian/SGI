<?php 
    if (permiso(2)||permiso(3)){
        $numero_serie = $qr->numero_serie;
        $qr = $qr->qr;
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Impresoras
            <small>Imprimir QR</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-8">
                <div class="box">
                    <div class="box-header">
                        <div class="col-xs-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group" id="printJS-form">
                                            <img id="qr" name="qr" alt="qr" src="<?php echo base_url() . $qr; ?>"><br>
                                            <label><?php echo "N/I: " . $numero_serie ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <a class="btn btn-primary" href="javascript:history.back()"> Volver Atrás</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dist/css/print.min.css">
<script src="<?php echo base_url(); ?>assets/js/print.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        printJS('printJS-form', 'html');
    });
</script>
<?php 
}
else
    redirect('accessDeny');
?>
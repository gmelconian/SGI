<?php 
    if (permiso(2)) {
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-bank"></i>Nuevo Edificio
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Ingresar detalles del Edificio</h3>
                    </div><!-- /.box-header -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addNewEdificio" action="<?php echo base_url() ?>addNewEdificio" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre *</label>
                                        <input type="text" class="form-control"  id="fname" placeholder="Nombre" name="fname" required  minlength="5" maxlength="50" pattern="[Aa-Zz]{1,15}"  value="<?php echo set_value('fname'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Departamento *</label>
                                    <select class="form-control required" required id="departamento" name="departamento">
                                        <option value="0" selected="selected" disabled="disabled">Seleccione el departamento</option>
                                        <option value="1" >Montevideo</option>
                                        <option value="2" >Artigas</option>
                                        <option value="3" >Canelones</option>
                                        <option value="4" >Cerro Largo</option>
                                        <option value="5" >Colonia</option>
                                        <option value="6" >Durazno</option>
                                        <option value="7" >Flores</option>
                                        <option value="8" >Florida</option>
                                        <option value="9" >Lavalleja</option>
                                        <option value="10" >Maldonado</option>
                                        <option value="11" >Paysandu</option>
                                        <option value="12" >Rio Negro</option>
                                        <option value="13" >Rivera</option>
                                        <option value="14" >Rocha</option>
                                        <option value="15" >Salto</option>
                                        <option value="16" >San Jose</option>
                                        <option value="17" >Soriano</option>
                                        <option value="18" >Tacuarembo</option>
                                        <option value="19" >Treinta y Tres</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ciudad *</label>
                                        <input type="text" class="form-control" id="ciudad" required placeholder="Ciudad" name="ciudad" maxlength="30" minlength="1" pattern="[A-z]{2,30}" value="<?php echo set_value('ciudad'); ?>">
                                    </div>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Calle *</label>
                                    <input type="text" class="form-control" id="calle" required placeholder="Calle" name="calle" maxlength="50" minlength="2" value="<?php echo set_value('calle'); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Número *</label>
                                        <input type="number" class="form-control" id="numero" required placeholder="Nº Calle" name="numero" maxlength="10" value="<?php echo set_value('numero'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div id="mapa" style="width: auto; height: 310px;"> </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Latitud *</label>
                                        <input type="number" step="any" class="form-control" id="latitud" required placeholder="Latitud" name="latitud" value="<?php echo set_value('latitud'); ?>"><br>
                                        <label>Longitud *</label>
                                        <input type="number" step="any" class="form-control" id="longitud"  required placeholder="Longitud" name="longitud" value="<?php echo set_value('longitud'); ?>"><br>
                                        <input type="button" class="btn btn-primary" value="Obtener Coordenadas" onClick="mapa.getCoords()"><br><br>
                                        <label for="comment">Referencia:</label>
                                        <textarea class="form-control" rows="3" id="referencia" name="referencia"> <?php echo set_value('referencia'); ?></textarea><br>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary" value="Enviar" />
                                <input type="reset" class="btn btn-default" value="Limpiar">
                                <a class="btn btn-primary" href="javascript:location.href= baseURL + 'edificio'"> Volver Atrás</a>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if ($error) { ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                <?php } ?>
                <?php
                    $success = $this->session->flashdata('success');
                    if ($success) { ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                <?php } ?>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjCQwUdynCyn9dGLOaniUVdXiDwkub4Dg&callback=mapa.initMap"></script>
<script>
    mapa = {
        map: false,
        marker: false,
        initMap: function() {
            // Creamos un objeto mapa y especificamos el elemento DOM donde se va a mostrar.
            mapa.map = new google.maps.Map(document.getElementById('mapa'), {
                center: {
                    lat: -34.9011127,
                    lng: -56.16453139999999
                },
                scrollwheel: false,
                zoom: 14,
                zoomControl: true,
                rotateControl: false,
                mapTypeControl: true,
                streetViewControl: true
            });
            // Creamos el marcador
            mapa.marker = new google.maps.Marker({
                position: {
                    lat: -34.9011127,
                    lng: -56.16453139999999
                },
                draggable: true
            });
            // Le asignamos el mapa a los marcadores.
            mapa.marker.setMap(mapa.map);
            //con esto obtengo las coordenadas cuando mueve el marcador 
            mapa.marker.addListener('dragend', function() {
                document.getElementById("latitud").value = this.getPosition().lat();
                document.getElementById("longitud").value = this.getPosition().lng();
            });
        },
        // función que se ejecuta al pulsar el botón buscar dirección
        getCoords: function() {
            // Creamos el objeto geodecoder
            var geocoder = new google.maps.Geocoder();
            var combo = document.getElementById("departamento");
            var departamento = combo.options[combo.selectedIndex].text;
            var address = document.getElementById('calle').value +" " + document.getElementById('numero').value + " " + departamento + ' Uruguay';
            //alert(address);
            if (address != '') {
                // Llamamos a la función geodecode pasandole la dirección que hemos introducido en la caja de texto.
                geocoder.geocode({
                    'address': address
                }, function(results, status) {
                    if (status == 'OK') {
                        // Mostramos las coordenadas obtenidas en el p con id coordenadas
                        document.getElementById("latitud").value = results[0].geometry.location.lat();
                        document.getElementById("longitud").value = results[0].geometry.location.lng();
                        // Posicionamos el marcador en las coordenadas obtenidas
                        mapa.marker.setPosition(results[0].geometry.location);
                        // Centramos el mapa en las coordenadas obtenidas
                        mapa.map.setCenter(mapa.marker.getPosition());
                        agendaForm.showMapaEventForm();
                    }
                });
            }
        }
    }
</script>
<?php 
}
else
    redirect('accessDeny');
?>
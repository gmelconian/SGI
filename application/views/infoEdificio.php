<?php 
    if (permiso(2)|| permiso(3)|| permiso(4)){
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <i class="fa fa-bank"></i>Informacion del Edificio
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="infoEdificio"  method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nombre *</label>
                                        <input type="text" class="form-control"  id="fname" disabled  name="fname" value="<?php echo $edificio->nombre; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Departamento *</label>
                                    <?php 
                                        switch ($edificio->departamento) {
                                            case 1:
                                                    echo "<input type='text' disabled class='form-control'  id='departamento' name='departamento' value='Montevideo'>";
                                                break;
                                            case 2:
                                                    echo "<input type='text' disabled class='form-control'  id='departamento' name='departamento' value='Artigas'>";
                                                break;
                                            case 3:
                                                    echo "<input type='text' disabled class='form-control'  id='departamento' name='departamento' value='Canelones'>";
                                                break;
                                            case 4:
                                                    echo "<input type='text' disabled class='form-control'  id='departamento' name='departamento' value='Cerro Largo'>";
                                                break;
                                            case 5:
                                                    echo "<input type='text' disabled class='form-control'  id='departamento' name='departamento' value='Colonia'>";
                                                break; 
                                            case 6:
                                                    echo "<input type='text' disabled class='form-control'  id='departamento' name='departamento' value='Durazno'>";
                                                break;
                                            case 7:
                                                    echo "<input type='text' disabled class='form-control'  id='departamento' name='departamento' value='Flores'>";
                                                break;
                                            case 8:
                                                    echo "<input type='text' disabled class='form-control'  id='departamento' name='departamento' value='Florida'>";
                                                break;
                                            case 9:
                                                    echo "<input type='text' disabled class='form-control'  id='departamento' name='departamento' value='Lavalleja'>";
                                                break;
                                            case 10:
                                                    echo "<input type='text' disabled class='form-control'  id='departamento' name='departamento' value='Maldonado'>";
                                                break;
                                            case 11:
                                                    echo "<input type='text' disabled class='form-control'  id='departamento' name='departamento' value='Paysandu'>";
                                                break;
                                            case 12:
                                                    echo "<input type='text' disabled class='form-control'  id='departamento' name='departamento' value='Rio Negro'>";
                                                break;
                                            case 13:
                                                    echo "<input type='text' disabled class='form-control'  id='departamento' name='departamento' value='Rivera'>";
                                                break;
                                            case 14:
                                                    echo "<input type='text' disabled class='form-control'  id='departamento' name='departamento' value='Rocha'>";
                                                break;
                                            case 15:
                                                    echo "<input type='text' disabled class='form-control'  id='departamento' name='departamento' value='Salto'>";
                                                break;
                                            case 16:
                                                    echo "<input type='text' disabled class='form-control'  id='departamento' name='departamento' value='San Jose'>";
                                                break;
                                            case 17:
                                                    echo "<input type='text' disabled class='form-control'  id='departamento' name='departamento' value='Soriano'>";
                                                break;
                                            case 18:
                                                    echo "<input type='text' disabled class='form-control'  id='departamento' name='departamento' value='Tacuarembo'>";
                                                break;
                                            case 19:
                                                    echo "<input type='text' disabled class='form-control'  id='departamento' name='departamento' value='Treinta y Tres'>";
                                                break;
                                        }                                                        
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ciudad *</label>
                                        <input type="text" class="form-control" id="ciudad" disabled name="ciudad" value="<?php echo $edificio->ciudad; ?>">
                                    </div>
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Calle *</label>
                                    <input type="text" class="form-control" id="calle" disabled name="calle" value="<?php echo $edificio->calle; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Número *</label>
                                        <input type="number" class="form-control" disabled id="numero" name="numero" value="<?php echo $edificio->numero; ?>">
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
                                        <input type="number" step="any" class="form-control" id="latitud" disabled name="latitud" value="<?php echo $edificio->latitud; ?>"><br>
                                        <label>Longitud *</label>
                                        <input type="number" step="any" class="form-control" id="longitud"  disabled name="longitud" value="<?php echo $edificio->longitud; ?>"><br>
                                        <label for="comment">Referencia:</label>
                                        <textarea class="form-control" rows="3" id="referencia" disabled name="referencia"> <?php echo $edificio->referencia; ?></textarea><br>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <a class="btn btn-primary" href="javascript:history.back()"> Volver Atrás</a>
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
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUg0a7LLCXNAyieFut9dH9_Hxf8q3UgA8&callback=mapa.initMap"></script>
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
            var combo = document.getElementById('departamento');
            var departamento = combo.options[combo.selectedIndex].text;
            var address = document.getElementById('calle').value + document.getElementById('numeroc').value + departamento + 'Uruguay';
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
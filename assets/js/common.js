/**
 * @author Kishor Mali
 */
jQuery(document).ready(function(){
	
    jQuery(document).on("click", ".deleteUser", function(){
            var userId = $(this).data("user"),
            hitURL = baseURL + "deleteUser",
            currentRow = $(this);

            var confirmation = confirm("¿Estás seguro de eliminar al usuario?");

            if(confirmation)
            {
                    jQuery.ajax({
                    type : "POST",
                    dataType : "json",
                    url : hitURL,
                    data : { userId : userId } 
                    }).done(function(data){
                            //console.log(data);
                            currentRow.parents('tr').remove();
                            if(data.status = true) { alert("Usuario eliminado con exito"); }
                            else if(data.status = false) { alert("El usuario no se pudo eliminar"); }
                            else { alert("Acceso denegado..!"); }
                    });
            }
    });
   
    jQuery(document).on("click", ".deleteEmpresa", function(){
        var userId = $(this).data("user"),
        hitURL = baseURL + "deleteEmpresa",
        currentRow = $(this);

        var confirmation = confirm("¿Estás seguro de eliminar el proveedor?");

        if(confirmation)
        {
                jQuery.ajax({
                type : "POST",
                dataType : "json",
                url : hitURL,
                data : { userId : userId } 
                }).done(function(data){
                        //console.log(data);
                        currentRow.parents('tr').remove();
                        if(data.status = true) { alert("Proveedor eliminado con exito"); }
                        else if(data.status = false) { alert("El proveedor no se pudo eliminar"); }
                        else { alert("Acceso denegado..!"); }
                });
        }
    });
    
    //delete equipo
    jQuery(document).on("click", ".deleteEquipo", function(){
        var codigo_equipo = $(this).data("equipo");
        hitURL = baseURL + "eliminarequipos",
        currentRow = $(this);

        var confirmation = confirm("¿Estás seguro de eliminar el equipo seleccionado?");

        if(confirmation)
        {
            jQuery.ajax({
            type : "POST",
            dataType : "json",
            url : hitURL,
            data : { equipo : codigo_equipo } 
            }).done(function(data){
                currentRow.parents('tr').remove();
                if(data.status = true) { alert("Equipo eliminado con exito"); }
                else if(data.status = false) { alert("El equipo no se pudo eliminar"); }
                else { alert("Acceso denegado..!"); }
            });
        }    
    });
    
    //delete equipo
    jQuery(document).on("click", ".deleteInsumo", function(){
        var codigo_insumo = $(this).data("insumo");
        hitURL = baseURL + "eliminareinsumo",
        currentRow = $(this);

        var confirmation = confirm("¿Estás seguro de eliminar el insumo seleccionado?");

        if(confirmation)
        {
            jQuery.ajax({
            type : "POST",
            dataType : "json",
            url : hitURL,
            data : { insumo : codigo_insumo } 
            }).done(function(data){
                currentRow.parents('tr').remove();
                if(data.status = true) { alert("Insumo eliminado con exito"); }
                else if(data.status = false) { alert("El insumo no se pudo eliminar"); }
                else { alert("Acceso denegado..!"); }
            });
        }    
    });
    
    //delete contratos
    jQuery(document).on("click", ".deleteContrato", function(){
        var codigo_contrato = $(this).data("contrato");
        hitURL = baseURL + "bajaContratos",
        currentRow = $(this);

        var confirmation = confirm("¿Estás seguro de eliminar el contrato seleccionado?");

        if(confirmation)
        {
            jQuery.ajax({
            type : "POST",
            dataType : "json",
            url : hitURL,
            data : { contrato : codigo_contrato } 
            }).done(function(data){
                currentRow.parents('tr').remove();
                if(data.status = true) { alert("Contrato eliminado con exito"); }
                else if(data.status = false) { alert("El contrato no se pudo eliminar"); }
                else { alert("Acceso denegado..!"); }
            });
        }    
    });
    
    jQuery(document).on("click", ".deleteOficina", function(){
            var oficina = $(this).data("oficina"),
            hitURL = baseURL + "deleteOficina",
            currentRow = $(this);
            var confirmation = confirm("¿Estás seguro de eliminar la oficina?");
            if(confirmation)
            {
                jQuery.ajax({
                    type : "POST",
                    dataType : "json",
                    url : hitURL,
                    data : { codigo_oficina : oficina } 
                    }).done(function(data){
                            currentRow.parents('tr').remove();
                            if(data.status = true) { alert("Oficina eliminada con exito"); }
                            else if(data.status = false) { alert("La oficina no se pudo eliminar"); }
                            else { alert("Acceso denegado..!"); }
                    });
            }
    });
    
    jQuery(document).on("click", ".deleteEdificio", function(){
            var edificio = $(this).data("edificio"),
            hitURL = baseURL + "deleteEdificio",
            currentRow = $(this);
            var confirmation = confirm("¿Estás seguro de eliminar el edificio?");
            if(confirmation)
            {
                jQuery.ajax({
                    type : "POST",
                    dataType : "json",
                    url : hitURL,
                    data : { codigo_edificio : edificio } 
                    }).done(function(data){
                            currentRow.parents('tr').remove();
                            if(data.status = true) { alert("Edificio eliminado con exito"); }
                            else if(data.status = false) { alert("El edificio no se pudo eliminar"); }
                            else { alert("Acceso denegado..!"); }
                    });
            }
    });
});
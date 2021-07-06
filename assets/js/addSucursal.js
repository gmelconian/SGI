/**
 * File : addUser.js
 * 
 * This file contain the validation of add user form
 * 
 * Using validation plugin : jquery.validate.js
 * 
 * @author Kishor Mali
 */

$(document).ready(function() {



    var addSucursalForm = $("#addSucursal");

    var validator = addSucursalForm.validate({

        rules: {
            fname: { required: true },
            email: { required: true, email: true, remote: { url: baseURL + "checkEmailExists", type: "post" } },
            password: { required: true },
            cpassword: { required: true, equalTo: "#password" },
            telefono: { required: true, digits: true },
            role: { required: true, selected: true }
        },
        messages: {
            fname: { required: "Este campo es requerido" },
            email: { required: "Este campo es requerido ", email: "Por favor ingrese una dirección de correo electrónico válida ", remote: "Correo electrónico ya tomado " },
            password: { required: "Este campo es requerido" },
            cpassword: { required: "Este campo es requerido", equalTo: "Por favor ingrese la misma contraseña" },
            telefono: { required: "Este campo es requerido", digits: "Por favor solo inserte numeros" },
            role: { required: "Este campo es requerido", selected: "Seleccione al menos una opción" }
        }
    });


    var loginValidation = $(".loginValidation");

    var validator = loginValidation.validate({

        rules: {
            login: { required: true, remote: { url: baseURL + "checkloginExists", type: "post" } },

        },

    });

 





});
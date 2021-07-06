/**
 * File : editUser.js 
 * 
 * This file contain the validation of edit user form
 * 
 * @author Kishor Mali
 */
$(document).ready(function() {

    var editUserForm = $("#editUser");

    var validator = editUserForm.validate({

        rules: {
            fname: { required: true },
            email: { required: true, email: true, type: "post", data: { userId: function() { return $("#userId").val(); } } },
            cpassword: { equalTo: "#password" },
            mobile: { required: true, digits: true },
            role: { required: true, selected: true }
        },
        messages: {
            fname: { required: "Este campo es requerido" },
            email: { required: "Este campo es requerido", email: "Por favor ingrese una dirección de correo electrónico válida", remote: "Correo electrónico ya tomado" },
            cpassword: { equalTo: "Por favor ingrese la misma contraseña" },
            mobile: { required: "Este campo es requerido", digits: "Por favor solo inserte numeros" },
            role: { required: "Este campo es requerido", selected: "Seleccione al menos una opción" }
        },
    });

    var editProfileForm = $("#editProfile");

    var validator = editProfileForm.validate({

        rules: {
            fname: { required: true },
            mobile: { required: true, digits: true },
            email: { required: true, email: true, remote: { url: baseURL + "checkEmailExists", type: "post", data: { userId: function() { return $("#userId").val(); } } } },
        },
        messages: {
            fname: { required: "Este campo es requerido" },
            mobile: { required: "Este campo es requerido", digits: "Por favor solo inserte numeros" },
            email: { required: "Este campo es requerido", email: "Por favor ingrese una dirección de correo electrónico válida", remote: "Correo electrónico ya tomado" },
        }
    });

});
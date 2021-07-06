<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = "login";
$route['404_override'] = 'error_404';
$route['translate_uri_dashes'] = FALSE;

/*********** RUTAS *******************/

/*********** login y cambio de pass ****/
$route['loginMe'] = 'login/loginMe';
$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['dashboard'] = 'user';
$route['accessDeny'] = "user/accessDeny";

/********* menu principal **********/
$route['userListing'] = 'user/userListing';
$route['empresas'] = 'Empresa/empresasL';
$route['impresoras'] = 'Impresora/imresorasList';
$route['insumos'] = 'Insumo/insumosList';
$route['auditoria'] = 'Auditoria/auditoria';
$route['logout'] = 'user/logout';
$route['Contratos'] = 'Contrato/contratoListing';
$route['oficina'] = 'Ubicacion/getOficinas';
$route['edificio'] = 'Ubicacion/getEdificios';
$route['computadoras'] = 'Computadora/computadoras';
$route['monitores'] = 'Computadora/monitores';
$route['telefonos'] = 'Computadora/telefonos';
$route['componentes'] = 'Computadora/componentes';
$route['stock'] = 'Stock/stock';
$route['reportes'] = 'Reporte/reporte';

/********* usuarios **********/
$route['profile'] = "user/profile";
$route['addNew'] = "user/addNew";
$route['addNewUser'] = "user/addNewUser";
$route['editUser'] = "user/editUser";
$route['infoUsuario'] = "user/infoUsuario";
$route['infoUsuario/(:any)'] = "user/infoUsuario/$1";
$route['infoPersona/(:any)'] = "user/infoPersona/$1";
$route['editOld'] = "user/editOld";
$route['editOld/(:any)'] = "user/editOld/$1";
$route['editPersona/(:any)'] = "user/editPersona/$1";
$route['checkEmailExists'] = "user/checkEmailExists";
$route['profileUpdate'] = "user/profileUpdate";
$route['profile/(:any)'] = "user/profile/$1";
$route['changePassword'] = "user/changePassword";
$route['deleteUser'] = "user/deleteUser";

/********* proveedores **********/
$route['addEmpresa'] = 'Empresa/empresaL';
$route['addNewEmpresa'] = 'Empresa/addNewEmpresa';
$route['editEmpresa'] = "Empresa/editEmpresa";
$route['editEmpresa/(:any)'] = "Empresa/editEmpresa/$1";
$route['updateEmpresa'] = "Empresa/updateEmpresa";
$route['updateEmpresa/(:any)'] = "Empresa/updateEmpresa/$1";
$route['infoEmpresa'] = "Empresa/infoEmpresa";
$route['infoEmpresa/(:any)'] = "Empresa/infoEmpresa/$1";
$route['deleteEmpresa'] = "Empresa/deleteEmpresa";

/********* GENERAL A TODOS LOS ACTIVOS **********/
$route['addMarca'] = "Equipo/addMarca";
$route['addModelo'] = "Equipo/addModelo";
$route['printQR/(:any)'] = 'Equipo/printQR/$1';
$route['getModelos'] = "Equipo/getModelos";
$route['getModeloMarca'] = "Equipo/getModeloMarca";
$route['CHestadoEquipo/(:any)/(:any)'] = "Equipo/CHestadoEquipo/$1/$2";
$route['cambiarEstado/(:any)/(:any)'] = "Equipo/cambiarEstado/$1/$2";
$route['validaSerial'] = 'Equipo/validaSerial';

/********* impresoras **********/
$route['creaEquipos'] = 'Impresora/creaEquiposL';
$route['editarequipos/(:any)'] = "Impresora/editarequiposL/$1";
$route['eliminarequipos'] = 'Impresora/eliminarequiposL';
$route['infoEquipos/(:any)'] = 'Impresora/infoEquiposL/$1';
$route['updateEquipos/(:any)'] = 'Impresora/updateEquipos/$1';
$route['guardaImpresora'] = 'Impresora/guardaImpresora';

/********* insumos **********/
$route['creaInsumo'] = "Insumo/creaInsumo";
$route['addInsumo'] = "Insumo/addInsumo";
$route['agregarInsumo'] = "Insumo/agregarInsumo";
$route['infoInsumo/(:any)'] = "Insumo/infoInsumo/$1";
$route['editarinsumo/(:any)'] = "Insumo/editarinsumo/$1";
$route['updateInsumo/(:any)'] = "Insumo/updateInsumo/$1";
$route['eliminareinsumo'] = 'Insumo/eliminareinsumo';

/********* computadoras **********/
$route['creaComputadora'] = "Computadora/creaComputadora";
$route['addComputadora'] = 'Computadora/addComputadora';
$route['editaComputadora/(:any)'] = "Computadora/editaComputadora/$1";
$route['updateComputadora/(:any)'] = "Computadora/updateComputadora/$1";

/********* monitores **********/
$route['creaMonitor'] = "Computadora/creaMonitor";
$route['guardaMonitor'] = 'Computadora/guardaMonitor';
$route['editarMonitor/(:any)'] = "Computadora/editarMonitor/$1";
$route['updateMonitor/(:any)'] = "Computadora/updateMonitor/$1";
$route['infoMonitor/(:any)'] = "Computadora/infoMonitor/$1";

/********* telefono **********/
$route['creaTelefono'] = "Computadora/creaTelefono";
$route['agregarTelefono'] = 'Computadora/agregarTelefono';
$route['editarTelefono/(:any)'] = "Computadora/editarTelefono/$1";
$route['updateTelefono/(:any)'] = "Computadora/updateTelefono/$1";
$route['infoTelefono/(:any)'] = "Computadora/infoTelefono/$1";

/********* componentes **********/
$route['creaComponente'] = "Computadora/creaComponente";
$route['agregarComponente'] = 'Computadora/agregarComponente';
$route['editarComponente/(:any)'] = "Computadora/editarComponente/$1";
$route['updateComponente/(:any)'] = "Computadora/updateComponente/$1";
$route['infoComponente/(:any)'] = "Computadora/infoComponente/$1";

/********* STOCK **********/
$route['asignarStockEquipo/(:any)/(:any)'] = "Stock/asignarStockEquipo/$1/$2";
$route['asignarStockInsumo/(:any)/(:any)'] = "Stock/asignarStockInsumo/$1/$2";
$route['asignarEquipo'] = "Stock/asignarEquipo";
$route['asignarOficina'] = "Stock/asignarOficina";
$route['asignarPersona'] = "Stock/asignarPersona";
$route['insumosAsiganados'] = "Stock/insumosAsiganados";
$route['cambiarEstado'] = "Stock/cambiarEstado";

/********* contratos **********/
$route['altaContratos'] = 'Contrato/AltaContratosL';
$route['infoContrato/(:any)'] = 'Contrato/infoContrato/$1';
$route['bajaContratos/(:any)'] = 'Contrato/bajaContratos/$1';

/********* reportes **********/
$route['getFiltroReporte'] = 'Reporte/getFiltroReporte';
$route['getDatosReporte'] = 'Reporte/getDatosReporte';
$route['getComboReporte'] = 'Reporte/getComboReporte';

/********* ubicaciones **********/
$route['altaEdificio'] = 'Ubicacion/altaEdificios';
$route['bajaContratos/(:any)'] = 'Ubicacion/bajaContratos/$1';
$route['addNewEdificio'] = 'Ubicacion/addNewEdificio';
$route['altaOficina'] = 'Ubicacion/altaOficina';
$route['addNewOficina'] = 'Ubicacion/addNewOficina';
$route['infoOficina/(:any)'] = 'Ubicacion/infoOficina/$1';
$route['editOficina/(:any)'] = 'Ubicacion/editOficina/$1';
$route['updateOficina/(:any)'] = 'Ubicacion/updateOficina/$1';
$route['deleteOficina'] = 'Ubicacion/deleteOficina';
$route['editEdificio/(:any)'] = 'Ubicacion/editEdificio/$1';
$route['deleteEdificio'] = 'Ubicacion/deleteEdificio';
$route['updateEdificio/(:any)'] = 'Ubicacion/updateEdificio/$1';
$route['infoEdificio/(:any)'] = 'Ubicacion/infoEdificio/$1';
$route['asignaOficina/(:any)'] = 'Ubicacion/asignaOficina/$1';
$route['personaUbicacion'] = 'Ubicacion/personaUbicacion';

/* End of file routes.php */
/* Location: ./application/config/routes.php */
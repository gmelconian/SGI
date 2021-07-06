<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $pageTitle; ?></title>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link rel="icon" href="<?=base_url()?>assets/images/ico.png" type="image/gif">
    <link href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/mapas.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
    folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/dist/css/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/bower_components/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/bower_components/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/bower_components/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/bower_components/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

    <style>
        .error{
            color:red;
            font-weight: normal;
        }
    </style>
    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript">
        var baseURL = "<?php echo base_url(); ?>";
    </script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
        <!-- Logo -->
            <a href="<?php echo base_url(); ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span><i class="fa fa-cogs"></i> SGI</span>
          <!-- logo for regular state and mobile devices -->   
            </a>
        <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown tasks-menu">
                            <ul class="dropdown-menu">
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url(); 
                                if ($ruta == NULL) 
                                    $ruta = 'subir.jpg'; 
                                echo("./assets/dist/img/perfil/".$ruta);?>" 
                                accesskey=""class="user-image" alt="User Image"/>
                                <span class="hidden-xs"><?php echo $name; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                            <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo base_url();if ($ruta == NULL) 
                                    $ruta = '/assets/dist/img/perfil/subir.jpg'; echo("./assets/dist/img/perfil/".$ruta);?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $name; ?>
                                        <small><?php echo $role_text; ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo base_url(); ?>profile" class="btn btn-warning btn-flat"><i class="fa fa-user-circle"></i> Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i>Cerrar sesión</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
            <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU</li>
                        <?php if (permiso(2)||permiso(3)||permiso(4)){ ?>
                        <li>
                            <a href="<?php echo base_url(); ?>dashboard">
                                <i class="fa fa-home"></i> <span>Inicio</span>
                            </a>
                        </li>
                        <?php 
                            }                             
                            if (permiso(2)||permiso(3)||permiso(4)){ ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>userListing">
                                        <i class="fa fa-users"></i>
                                        <span>Usuarios</span>
                                    </a>
                                </li>
                            <?php } 
                            ?>
                        <?php if (permiso(2)||permiso(3)||permiso(4)){ ?>
                        <li>
                          <a href="<?php echo base_url(); ?>empresas">
                            <i class="fa fa-bank"></i>
                            <span>Proveedores</span>
                          </a>
                        </li>
                        <?php } ?>
                        <?php if (permiso(2)||permiso(3)||permiso(4)){ ?>
                        <li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-money"></i>
                                    <span>Inventario</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu" role="menu">
                                    <li><a href="<?php echo base_url(); ?>impresoras"><i class="fa fa-print"></i>Impresoras</a></li>
                                    <li><a href="<?php echo base_url(); ?>insumos"><i class="fa fa-tint"></i>Insumos</a></li>
                                    <li><a href="<?php echo base_url(); ?>computadoras"><i class="fa fa-laptop"></i>Computadoras</a></li>
                                    <li><a href="<?php echo base_url(); ?>monitores"><i class="fa fa-television"></i>Monitores</a></li>
                                    <li><a href="<?php echo base_url(); ?>telefonos"><i class="fa fa-phone"></i>Telefonos</a></li>
                                    <li><a href="<?php echo base_url(); ?>componentes"><i class="fa fa-microchip"></i>Componentes</a></li>
                                </ul>
                            </li>
                        </li>    
                        <?php }  
                        if (permiso(2)||permiso(3)||permiso(4)){ ?>
                        <li>
                            <a href="<?php echo base_url(); ?>stock">
                                <i class="fa fa-arrows-h"></i>
                                <span>Stock</span>
                            </a>
                        </li>    
                        <?php }
                        if (permiso(2)|| permiso(3)||permiso(4)){?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-map"></i>
                                <span>Ubicación</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu" role="menu">
                                <li><a href="<?php echo base_url(); ?>edificio"><i class="fa fa-building"></i>Edificios</a></li>
                                <li><a href="<?php echo base_url(); ?>oficina"><i class="fa fa-sitemap"></i>Oficinas</a></li>
                            </ul>
                        </li>
                        <?php
                        }
                        if (permiso(2)|| permiso(3)||permiso(4)){?>
                         <li>
                          <a href="<?php echo base_url(); ?>reportes">
                            <i class="fa fa-line-chart"></i>
                            <span>Reportes</span>
                          </a>
                        </li>
                        <?php
                      }
                        if (permiso(5)){?>
                            <li>
                              <a href="<?php echo base_url(); ?>auditoria">
                                <i class="fa fa-lock"></i>
                                <span>Auditoría</span>
                              </a>
                            </li>
                    <?php
                        }
                        if(permiso(2)||permiso(3)||permiso(4))
                        {
                        ?>
                            <li>
                                <a href="<?php echo base_url(); ?>Contratos">
                                    <i class="fa fa-key"></i>
                                    <span>Contratos</span>
                                </a>
                            </li>

                        <?php
                        }
                        ?>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js" charset="utf-8"></script>




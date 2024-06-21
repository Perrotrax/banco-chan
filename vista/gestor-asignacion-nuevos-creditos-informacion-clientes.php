<?php
// NO PERMITIR INGRESO SI PARAMETRO DE USUARIOS SE ENCUENTRA VACIO
if (empty($_GET['idusuario'])) {
    header('location:../controlador/cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
}
// NO PERMITIR INGRESO SI NO EXISTE INFORMACION QUE MOSTRAR
if (empty($Gestiones->getFotoDuiFrontalUsuarios())) {
    header('location:../controlador/cGestionesCashman.php?cashmanhagestion=redirecciones-sistema-cashmanha');
}
// SI LOS USUARIOS INICIAN POR PRIMERA VEZ, MOSTRAR PAGINA DONDE DEBERAN REALIZAR EL CAMBIO OBLIGATORIO DE SU CONTRASEÑA GENERADA AUTOMATICAMENTE
if ($_SESSION['comprobar_iniciosesion_primeravez'] == "si") {
    header('location:../controlador/cGestionesCashman.php?cashmanhagestion=gestiones-nuevos-usuarios-registrados');
    // CASO CONTRARIO, MOSTRAR PORTAL DE USUARIOS -> SEGUN ROL DE USUARIO ASIGNADO
} else {
?>
    <!-- 

░░░
░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░░

-->
    <!DOCTYPE html>
    <html lang="ES-SV" class="h-100">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>CashMan H.A. | Gestor de Nuevos Cr&eacute;ditos CashMan H.A</title>
        <!-- Favicon icon -->
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $UrlGlobal; ?>vista/images/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192" href="<?php echo $UrlGlobal; ?>vista/images/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $UrlGlobal; ?>vista/images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $UrlGlobal; ?>vista/images/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $UrlGlobal; ?>vista/images/favicon-16x16.png">
        <link rel="manifest" href="<?php echo $UrlGlobal; ?>vista/images/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php echo $UrlGlobal; ?>vista/images/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <link href="<?php echo $UrlGlobal; ?>vista/css/style.css" rel="stylesheet">
        <link href="<?php echo $UrlGlobal; ?>vista/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
        <!-- Alerts -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    </head>

    <body class="h-100">
        <div class="progress ">
            <div class="progress-bar bg-danger progress-animated" style="width: 25%; height:6px;" role="progressbar"></div>
        </div>
        <div class="authincation h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-md-10">
                        <div class="authincation-content">
                            <div class="row no-gutters">
                                <div class="col-xl-12">
                                    <div class="auth-form">
                                        <p style="display: flex; justify-content: flex-end;"><span class="badge badge-rounded badge-outline-light">Empleado: <?php echo $_SESSION['usuario_unico']; ?></span></p>
                                        <img class="logo-abbr logo-formulario" src="<?php echo $UrlGlobal; ?>vista/images/logo.png" alt="logo-simple">
                                        <h3 class="text-center mb-4">Gestor de Nuevos Cr&eacute;ditos</h3>
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="profile-photo">
                                                        <img src="<?php echo $UrlGlobal ?>vista/images/fotoperfil/<?php echo $Gestiones->getFotoUsuarios(); ?>" width="100" class="img-fluid rounded-circle" alt="">
                                                    </div>
                                                    <h3 class="mt-4 mb-1"><?php echo $Gestiones->getNombresUsuarios(); ?> <?php echo $Gestiones->getApellidosUsuarios(); ?></h3>
                                                    <p>Cliente CashMan H.A</p>
                                                    <p>Multimedia Documentos Personales Clientes CashMan H.A</p>
                                                </div><br>
                                                <div class="col-xl-12">
                                                    <!-- FOTO DUI CLIENTES -->
                                                    <button type="button" class="btn btn-light mb-2" data-toggle="modal" data-target="#fotoduiclientes">Fotograf&iacute;a Dui Cliente <span class="btn-icon-right"><i class="fa fa-file-image-o"></i></span></button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="fotoduiclientes">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Documento &Uacute;nico de Identidad</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h6><strong>Fotograf&iacute;a Dui Frontal Cliente.</strong></h6>
                                                                    <img class="img-fluid" src="<?php echo $UrlGlobal; ?>vista/images/fotoduifrontal/<?php echo $Gestiones->getFotoDuiFrontalUsuarios(); ?>">
                                                                    <h6><strong>Fotograf&iacute;a Dui Reverso Cliente.</strong></h6>
                                                                    <img class="img-fluid" src="<?php echo $UrlGlobal; ?>vista/images/fotoduireverso/<?php echo $Gestiones->getFotoDuiReversoUsuarios(); ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Cerrar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- FOTO NIT CLIENTES -->
                                                    <button type="button" class="btn btn-light mb-2" data-toggle="modal" data-target="#fotonitclientes">Fotograf&iacute;a Nit Cliente <span class="btn-icon-right"><i class="fa fa-file-image-o"></i></span></button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="fotonitclientes">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Documento de Identificaci&oacute;n Tributaria</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h6><strong>Fotograf&iacute;a Nit Cliente.</strong></h6>
                                                                    <img class="img-fluid" src="<?php echo $UrlGlobal; ?>vista/images/fotonit/<?php echo $Gestiones->getFotoNitUsuarios(); ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Cerrar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- FOTO FIRMAS CLIENTES -->
                                                    <button type="button" class="btn btn-light mb-2" data-toggle="modal" data-target="#fotofirmasclientes">Fotograf&iacute;a Firma Cliente <span class="btn-icon-right"><i class="fa fa-file-image-o"></i></span></button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="fotofirmasclientes">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Fotograf&iacute;a de Firma Adjunta de Cliente</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h6><strong>Fotograf&iacute;a Firma Registrada Cliente.</strong></h6>
                                                                    <img class="img-fluid" src="<?php echo $UrlGlobal; ?>vista/images/fotofirmas/<?php echo $Gestiones->getFotoFirmaUsuarios(); ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Cerrar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><br><br>
                                                    <h4 class="text-primary mb-4">Informaci&oacute;n Personal</h4>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Nombres <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php echo $Gestiones->getNombresUsuarios(); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Apellidos <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php echo  $Gestiones->getApellidosUsuarios(); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Correo Electr&oacute;nico <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php echo $Gestiones->getCorreoUsuarios(); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Dui <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php echo $Gestiones->getDuiUsuarios(); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Nit <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php echo $Gestiones->getNitUsuarios(); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Tel&eacute;fono Principal <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php if ($Gestiones->getTelefonoUsuarios() == "") {
                                                                                        echo "No Disponible";
                                                                                    } else {
                                                                                        echo $Gestiones->getTelefonoUsuarios();
                                                                                    } ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Celular <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php if ($Gestiones->getCelularUsuarios() == "") {
                                                                                        echo "No Disponible";
                                                                                    } else {
                                                                                        echo $Gestiones->getCelularUsuarios();
                                                                                    } ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Estado Civil <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php echo $Gestiones->getEstadoCivilUsuarios(); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">G&eacute;nero <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php if ($Gestiones->getGeneroUsuarios() == "m") {
                                                                                        echo "Hombre";
                                                                                    } else if ($Gestiones->getGeneroUsuarios() == "f") {
                                                                                        echo "Mujer";
                                                                                    } ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Direcci&oacute;n Completa <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php echo $Gestiones->getDireccionUsuarios(); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Empresa d&oacute;nde labora <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php echo $Gestiones->getEmpresaUsuarios(); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Cargo <span class="pull-right">:</span></h5>
                                                        </div>
                                                        <div class="col-9"><span><?php echo $Gestiones->getCargoEmpresaUsuarios(); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Direcci&oacute;n Trabajo <span class="pull-right">:</span></h5>
                                                        </div>
                                                        <div class="col-9"><span><?php echo $Gestiones->getDireccionTrabajoUsuarios(); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Tel&eacute;fono Trabajo <span class="pull-right">:</span></h5>
                                                        </div>
                                                        <div class="col-9"><span><?php if ($Gestiones->getTelefonoTrabajoUsuarios() == "") {
                                                                                        echo "No disponible";
                                                                                    } else {
                                                                                        echo $Gestiones->getTelefonoTrabajoUsuarios();
                                                                                    } ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Fecha Nacimiento <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-9"><span><?php $Fecha = $Gestiones->getFechaNacimientoUsuarios();
                                                                                    $FechaCompleta = strtotime($Fecha);
                                                                                    $ObtenerMes = date("m", $FechaCompleta);
                                                                                    $ObtenerDia = date("d", $FechaCompleta);
                                                                                    echo $ObtenerDia;
                                                                                    echo " de ";
                                                                                    // VALIDACIONES SEGUN MES OBTENIDO
                                                                                    if ($ObtenerMes == 1) {
                                                                                        echo "Enero";
                                                                                    } else if ($ObtenerMes == 2) {
                                                                                        echo "Febrero";
                                                                                    } else if ($ObtenerMes == 3) {
                                                                                        echo "Marzo";
                                                                                    } else if ($ObtenerMes == 4) {
                                                                                        echo "Abril";
                                                                                    } else if ($ObtenerMes == 5) {
                                                                                        echo "Mayo";
                                                                                    } else if ($ObtenerMes == 6) {
                                                                                        echo "Junio";
                                                                                    } else if ($ObtenerMes == 7) {
                                                                                        echo "Julio";
                                                                                    } else if ($ObtenerMes == 8) {
                                                                                        echo "Agosto";
                                                                                    } else if ($ObtenerMes == 9) {
                                                                                        echo "Septiembre";
                                                                                    } else if ($ObtenerMes == 10) {
                                                                                        echo "Octubre";
                                                                                    } else if ($ObtenerMes == 11) {
                                                                                        echo "Noviembre";
                                                                                    } else if ($ObtenerMes == 12) {
                                                                                        echo "Diciembre";
                                                                                    }
                                                                                    $ObtenerAnio = date("Y", $FechaCompleta);
                                                                                    echo " ";
                                                                                    echo $ObtenerAnio;
                                                                                    ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-3">
                                                            <h5 class="f-w-500">Edad <span class="pull-right">:</span></h5>
                                                        </div>
                                                        <div class="col-9"><span><?php // OBTENER FECHA COMPLETA REGISTRADA
                                                                                    $Fecha = $Gestiones->getFechaNacimientoUsuarios();
                                                                                    // CALCULAR EDAD ANTES DE CUMPLEAÑOS
                                                                                    $FechaCumpleanos = new DateTime($Fecha);
                                                                                    $Ahora = new DateTime();
                                                                                    // COMPRUEBA SEGUN AÑO -> MES -> DIA
                                                                                    $CalcularEdad = $Ahora->diff($FechaCumpleanos);
                                                                                    echo $CalcularEdad->y;
                                                                                    echo " A&ntilde;os";
                                                                                    ?></span>
                                                        </div>
                                                    </div>
                                                </div><br><br>
                                                <div class="col-xl-12">
                                                    <div class="alert alert-danger solid alert-dismissible fade show">
                                                        <div class="media">
                                                            <div class="media-body">
                                                                <h5 class="mt-1 mb-2 text-white"><i class="mdi mdi-alert"></i> Aviso de Confidencialidad</h5>
                                                                <p class="mb-0">Estimado(a) <?php $Nombre = $_SESSION['nombre_usuario'];
                                                                                            $PrimerNombre = explode(' ', $Nombre, 2);
                                                                                            print_r($PrimerNombre[0]); ?>, est&aacute; usted con total seguridad de iniciar una nueva gesti&oacute;n para el cliente con nombre <strong><?php echo $Gestiones->getNombresUsuarios(); ?> <?php echo $Gestiones->getApellidosUsuarios(); ?> </strong>con documento &uacute;nico de identidad (DUI) <strong><?php echo $Gestiones->getDuiUsuarios(); ?></strong> de <?php echo $CalcularEdad->y;  ?> a&ntilde;os de edad, y cumple con las siguientes cl&aacute;usulas que esta empresa estipula:</p><br>
                                                                <div class="basic-list-group">
                                                                    <ul class="list-group">
                                                                        <li class="list-group-item">Ser mayor de 18 a&ntilde;os y menor a 70 a&ntilde;os, presentar toda la informaci&oacute;n y documentaci&oacute;n solicitada previamente antes de iniciar una gesti&oacute;n con esta empresa, la informaci&oacute;n es ver&iacute;dica y todo coincide seg&uacute;n la documentaci&oacute;n en f&iacute;sico, no contar con cr&eacute;ditos inconclusos y/o en mora.</li>
                                                                    </ul>
                                                                </div><br><br>
                                                                <?php
                                                                // VALIDACION EDAD CLIENTES 
                                                                $EdadActualClientes = $CalcularEdad->y;
                                                                if ($EdadActualClientes >= 18 && $EdadActualClientes <= 70) {

                                                                ?>
                                                                    <p>Si cumple todo lo anterior, puede continuar con el tr&aacute;mite. Si dado un caso la informaci&oacute;n no coincide con la documentaci&oacute;n presentada, <strong>usted no puede iniciar un tr&aacute;mite con este cliente hasta solventar la situaci&oacute;n en las secciones espec&iacute;ficas dentro de nuestro portal.</strong> El no acatar lo anterior, es una acci&oacute;n penalizada, ya que su registro de asignaci&oacute;n queda guardado en nuestro sistema.</p>
                                                                    <h5 class="text-white">Para continuar, haga clic en una opci&oacute;n</h5><br>
                                                                    <a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=gestor-creditos-seleccion-producto-clientes&idusuario=<?php echo $Gestiones->getIdUsuarios(); ?>" class="btn light btn-light"><i class="fa fa-check-circle-o"></i> Continuar con el proceso</a>
                                                                <?php } else { ?>
                                                                    <h5 class="text-white">** Lo sentimos, este cliente no puede acceder a nuestras l&iacute;neas de cr&eacute;dito. No cumple con la edad requerida para solicitar los mismos.</h5><br>
                                                                <?php } ?>
                                                                <a href="<?php echo $UrlGlobal; ?>controlador/cGestionesCashman.php?cashmanhagestion=asignacion-nuevos-creditos-clientes" class="btn light btn-light"><i class="fa fa-trash"></i> Salir del proceso</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="text-center">&copy; Copyright <?php echo date('Y'); ?> CashMan H.A</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--**********************************
        Scripts
    ***********************************-->
                    <!-- Required vendors -->
                    <script src="<?php echo $UrlGlobal; ?>vista/vendor/global/global.min.js"></script>
                    <script src="<?php echo $UrlGlobal; ?>vista/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
                    <script src="<?php echo $UrlGlobal; ?>vista/js/custom.min.js"></script>
                    <script src="<?php echo $UrlGlobal; ?>vista/js/deznav-init.js"></script>
                    <!-- Jquery Validation -->
                    <script src="<?php echo $UrlGlobal; ?>vista/vendor/jquery-validation/jquery.validate.min.js"></script>
                    <!-- Form validate init -->
                    <script src="<?php echo $UrlGlobal; ?>vista/js/plugins-init/jquery.validate-init.js"></script>
                    <script src="<?php echo $UrlGlobal; ?>vista/js/comprobarcontrasenia.js"></script>
    </body>

    </html>
<?php } ?>
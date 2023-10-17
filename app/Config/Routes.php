<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('users', 'UserController::index');
$routes->get('users/usuarios','UserController::usuarios');
$routes->get('users/usuarios2','UserController::usuarios2');
$routes->get('users/usuarios3','UserController::usuarios3');

$routes->get('posts/ejercicio01','PostController::ejercicio01');
$routes->get('posts/ejercicio02','PostController::ejercicio02');
$routes->get('posts/ejercicio03','PostController::ejercicio03');
$routes->get('posts/ejercicio04','PostController::ejercicio04');
$routes->get('posts/ejercicio05','PostController::ejercicio05');
$routes->get('posts/ejercicio06','PostController::ejercicio06');
$routes->get('posts/ejercicio07','PostController::ejercicio07');
$routes->get('posts/ejercicio08','PostController::ejercicio08');
$routes->get('posts/ejercicio09','PostController::ejercicio09');
$routes->get('posts/ejercicio10','PostController::ejercicio10');

$routes->get('exportar/opciones','ExportarBDController::opciones');
$routes->get('exportar/csv_posts','ExportarBDController::exportar_CSV_Posts');
$routes->get('exportar/pdf_posts','ExportarBDController::exportar_PDF_Posts');
$routes->get('exportar/csv_categories','ExportarBDController::exportar_CSV_Categories');
$routes->get('exportar/pdf_categories','ExportarBDController::exportar_PDF_Categories');
$routes->get('exportar/csv_users','ExportarBDController::exportar_CSV_Users');
$routes->get('exportar/pdf_users','ExportarBDController::exportar_PDF_Users');
$routes->get('exportar/csv_comments','ExportarBDController::exportar_CSV_Comments');
$routes->get('exportar/pdf_comments','ExportarBDController::exportar_PDF_Comments');



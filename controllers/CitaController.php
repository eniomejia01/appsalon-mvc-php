<?php

namespace Controllers;

use MVC\Router;

class CitaController {
    
    public static function index ( Router $router ) {

        // session_start()

        isAuth(); // comprueba que el usuario este autentificado, sino, lo redirige a la pagina de inicio de sesión

        $router->render('cita/index', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id']
        ]);
    }
}
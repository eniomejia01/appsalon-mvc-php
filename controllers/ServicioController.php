<?php

namespace Controllers;

use Model\Servicio;
use MVC\Router;

class ServicioController {

    public static function index( Router $router ) {

        isAdmin(); // Verificar si el usuario es administrador

        $servicios = Servicio::all(); // Obtener todos los registros de la tabla servicios

        $router->render('servicios/index', [
            'nombre' => $_SESSION['nombre'],
            'servicios' => $servicios
        ]);
        
    }

    public static function crear( Router $router ) {

        isAdmin(); // Verificar si el usuario es administrador

        $servicio = new Servicio();
        $alertas = [];

        if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
            $servicio->sincronizar($_POST);

            $alertas = $servicio->validar();

            if( empty($alertas) ) { // Si no hay alertas
                $servicio->guardar(); // Guardar el servicio en la base de datos
                header('Location: /servicios'); // Redirigir al usuario a la pagina de servicios
            }

        }

        $router->render('servicios/crear', [
            'nombre' => $_SESSION['nombre'], // Pasar el nombre del usuario a la vista
            'servicio' => $servicio,
            'alertas' => $alertas
        ]);
        
    }

    public static function actualizar( Router $router ) { // Metodo para actualizar un servicio

        isAdmin(); // Verificar si el usuario es administrador

        if(!is_numeric( $_GET['id'] )) return; // Si el id no es un numero, terminar la ejecucion
        $servicio = Servicio::find($_GET['id']); // Buscar el servicio por el id
        $alertas = []; // Inicializar el arreglo de alertas

        if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
            $servicio->sincronizar($_POST); // Sincronizar los datos del formulario con el objeto

            $alertas = $servicio->validar(); // Validar los datos del formulario

            if( empty($alertas) ) { // Si no hay alertas
                $servicio->guardar(); // Guardar el servicio en la base de datos
                header('Location: /servicios'); // Redirigir al usuario a la pagina de servicios
            }
        }

        $router->render('servicios/actualizar', [
            'nombre' => $_SESSION['nombre'],
            'servicio' => $servicio,
            'alertas' => $alertas
        ]);
        
    }

    public static function eliminar( Router $router ) {

        isAdmin(); // Verificar si el usuario es administrador

        if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
            $id = $_POST['id']; // Obtener el id del servicio a eliminar
            $servicio = Servicio::find($id); // Buscar el servicio por el id
            $servicio->eliminar(); // Eliminar el servicio de la base de datos
            header('Location: /servicios'); // Redirigir al usuario a la pagina de servicios
        }
        
    }
}
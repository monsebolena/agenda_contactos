<?php
namespace Formacom\Core;
use Formacom\controllers\ContactoController;

class App {
    protected $controller = "Formacom\\controllers\\ContactoController";  // Controlador por defecto
    protected $method = "index";  // Método por defecto
    protected $params = [];  // Parámetros de la URL

    public function __construct() {
        $url = $this->parseUrl();  // Parsear la URL

       

        // Verificar el controlador
        if (file_exists('./app/controllers/' . ucfirst($url[0]) . 'Controller.php')) {
            $this->controller = "Formacom\\controllers\\" . ucfirst($url[0]) . 'Controller';  // Asignar el controlador de la URL
            unset($url[0]);  // Eliminar el primer parámetro (el controlador)
        }
        $this->controller = new $this->controller;  // Instanciar el controlador

        // Verificar el método
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];  // Asignar el método de la URL
                unset($url[1]);  // Eliminar el método de los parámetros
            }
        }

        // Parámetros
        $this->params = $url ? array_values($url) : [];  // Asignar los parámetros (si existen)

        // Llamar al método del controlador con los parámetros
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // Función para parsear la URL
    private function parseUrl() {
        if (isset($_GET['url'])) {
            // Sanear y separar la URL
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return ['contacto', 'index'];  // Si no se pasa una URL, asigna valores por defecto
    }
}
?>

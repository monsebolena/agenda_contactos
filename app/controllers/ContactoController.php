<?php
namespace Formacom\controllers;

use Formacom\Core\Controller;  // Clase base
use Formacom\Models\Contacto;  // Modelo Contacto

class ContactoController extends Controller {

    // Mostrar la lista de contactos
    public function index(...$params) {
        $contactos = Contacto::all();  // Obtiene todos los contactos
        $this->view("lista_contactos", $contactos);  // Renderiza la vista con los contactos
    }

    // Crear un nuevo contacto
    public function nuevo(...$params) {
        if (isset($_POST["nombre"])) {
            // Lógica para crear un nuevo contacto
            $contacto = new Contacto();
            $contacto->nombre = $_POST["nombre"];
            $contacto->email = $_POST["email"];
            $contacto->telefono = $_POST["telefono"];
            $contacto->save();  // Guarda el nuevo contacto

            // Redirigir a la lista de contactos después de guardar
            header("Location: /agenda_contactos");
            exit();
        } else {
            $this->view("nuevo_contacto");  // Muestra el formulario para nuevo contacto
        }
    }

    // Editar un contacto existente
    public function editar(...$params) {
        // Verifica que el parámetro contacto_id está siendo recibido correctamente
        if (isset($params[0])) {
            $contacto = Contacto::find($params[0]); // Asegúrate de que estás usando el nombre correcto del campo
            if ($contacto) {
                if (isset($_POST["nombre"])) {
                    // Lógica para editar el contacto
                    $contacto->nombre = $_POST["nombre"];
                    $contacto->email = $_POST["email"];
                    $contacto->telefono = $_POST["telefono"];
                    $contacto->direccion = $_POST["direccion"];
                    $contacto->save();  // Guarda los cambios

                    // Redirigir a la lista de contactos después de editar
                    header("Location: /agenda_contactos");
                    exit();
                } else {
                    // Muestra el formulario de edición con los datos del contacto
                    $this->view("editar_contacto",  $contacto);
                }
            } else {
                echo "Contacto no encontrado";  // Si no se encuentra el contacto
            }
        } else {
            echo "ID del contacto no proporcionado.";  // Si no se pasa el ID
        }
    }

    // Eliminar un contacto
    public function eliminar($id) {
        $contacto = Contacto::find($id);
        if ($contacto) {
            $contacto->delete();  // Elimina el contacto
            // Redirigir a la lista de contactos después de eliminar
            header("Location: /agenda_contactos");
            exit();
        } else {
            echo "Contacto no encontrado";  // Si no se encuentra el contacto
        }
    }
}
?>

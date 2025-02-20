<?php
namespace Formacom\controllers;  // Asegúrate de que el namespace sea correcto
use Formacom\Core\Controller;  // Usamos la clase base Controller
use Formacom\Models\Contacto;  // Usamos el modelo Contacto

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
            header("Location: /");
            exit();
        } else {
            $this->view("nuevo_contacto");  // Muestra el formulario para nuevo contacto
        }
    }

    // Editar un contacto existente
    public function editar(...$params) {
        // Obtener el contacto por su ID
        $contacto = Contacto::find($params[0]);
        
        if (isset($_POST["nombre"])) {
            // Lógica para editar un contacto
            $contacto->nombre = $_POST["nombre"];
            $contacto->email = $_POST["email"];
            $contacto->telefono = $_POST["telefono"];
            $contacto->save();  // Guarda los cambios

            // Redirigir a la lista de contactos después de editar
            header("Location: /");
            exit();
        } else {
            // Muestra el formulario de edición con los datos del contacto
            $this->view("editar_contacto", $contacto);
        }
    }

    // Eliminar un contacto
    public function eliminar($id) {
        $contacto = Contacto::find($id);
        if ($contacto) {
            $contacto->delete();  // Elimina el contacto
            // Redirigir a la lista de contactos después de eliminar
            header("Location: /");
            exit();
        } else {
            echo "Contacto no encontrado";  // Si no se encuentra el contacto
        }
    }

    // Crear un nuevo contacto (Formulario)
    public function create(...$params) {
        $this->view("nuevo_contacto");  // Muestra el formulario para crear un nuevo contacto
    }
}
?>

<?php
namespace Formacom\Models;  // Asegúrate de que el namespace sea correcto

use Illuminate\Database\Eloquent\Model;  // Usamos Eloquent para interactuar con la base de datos

class Contacto extends Model {
    // Nombre de la tabla en la base de datos
    protected $table = 'contactos';  // Asumiendo que la tabla en la base de datos se llama 'contactos'

    // Clave primaria (puede ser 'id' o cualquier otro nombre dependiendo de tu base de datos)
    protected $primaryKey = 'contacto_id';  // Asegúrate de que el nombre de la clave primaria coincida con el de tu tabla

    // Si no usas las columnas de timestamp (created_at y updated_at), puedes desactivarlas
    public $timestamps = false;  // Si no tienes campos de fecha en la base de datos, ponlo en false

    // Definir los campos que pueden ser asignados masivamente (para proteger contra asignación masiva)
    protected $fillable = [
        'nombre', 'email', 'telefono'
    ];

    // Método para obtener todos los contactos
    public static function getAllContactos() {
        return self::all();  // Esto devuelve todos los registros de la tabla contactos
    }

    // Método para obtener un contacto por ID
    public static function getContactoById($id) {
        return self::find($id);  // Devuelve el contacto que coincide con el ID
    }

    // Método para agregar un nuevo contacto
    public function saveContacto($nombre, $email, $telefono) {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->save();  // Guarda el contacto en la base de datos
    }

    // Método para actualizar un contacto existente
    public function updateContacto($id, $nombre, $email, $telefono) {
        $contacto = self::find($id);
        if ($contacto) {
            $contacto->nombre = $nombre;
            $contacto->email = $email;
            $contacto->telefono = $telefono;
            $contacto->save();
        }
    }

    // Método para eliminar un contacto
    public function deleteContacto($id) {
        $contacto = self::find($id);
        if ($contacto) {
            $contacto->delete();  // Elimina el contacto de la base de datos
        }
    }
}
?>

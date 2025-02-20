<?php

class Contact {
    private $conn;
    private $table_name = "contactos";

    public $id;
    public $nombre;
    public $telefono;
    public $email;
    public $direccion;
    public $fecha_creacion;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Obtener todos los contactos
    public function getAllContacts() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un contacto por ID
    public function getContactById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Crear un nuevo contacto
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (nombre, telefono, email, direccion) VALUES (:nombre, :telefono, :email, :direccion)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':direccion', $this->direccion);

        return $stmt->execute();
    }

    // Actualizar un contacto existente
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nombre = :nombre, telefono = :telefono, email = :email, direccion = :direccion WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':telefono', $this->telefono);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':direccion', $this->direccion);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }

    // Eliminar un contacto
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }
}
?>

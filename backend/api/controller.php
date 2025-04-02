<?php

require '../../config/config.php';
require 'cors.php';

class Controller {
    private $conn;
    private $table;

    public function __construct($conn, $table) {
        $this->conn = $conn;
        $this->table = $table;
    }

    public function create($data) {
        $columns = implode(", ", array_keys($data));
        $values = implode("', '", array_values($data));
        $sql = "INSERT INTO {$this->table} ($columns) VALUES ('$values')";

        if ($this->conn->query($sql)) {
            echo json_encode(["message" => "Ajout réussi"]);
        } else {
            echo json_encode(["error" => "Erreur d'ajout"]);
        }
    }

    public function read() {
        $sql = "SELECT * FROM {$this->table} WHERE date_suppression IS NULL";
        $result = $this->conn->query($sql);
        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode($data);
    }

    public function read_all() {
        $sql = "SELECT * FROM {$this->table}";
        $result = $this->conn->query($sql);
        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode($data);
    }

    public function read_one($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            echo json_encode($row);
        } else {
            echo json_encode(["error" => "Aucun enregistrement trouvé pour l'ID $id"]);
        }
    }

    public function update($id, $data) {
        $updates = "";
        foreach ($data as $key => $value) {
            $updates .= "$key = '$value', ";
        }
        $updates = rtrim($updates, ", ");
        $sql = "UPDATE {$this->table} SET $updates WHERE id = $id";

        if ($this->conn->query($sql)) {
            echo json_encode(["message" => "Mise à jour réussie"]);
        } else {
            echo json_encode(["error" => "Erreur de mise à jour"]);
        }
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET date_suppression = NOW() WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo json_encode(["message" => "Donnée supprimée avec succès"]);
        } else {
            echo json_encode(["error" => "Erreur lors de la suppression"]);
        }
    }

    public function forceDelete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = ?");
        $stmt->bind_param("i", $id);
    
        if ($stmt->execute()) {
            echo json_encode(["message" => "Suppression définitive réussie"]);
        } else {
            echo json_encode(["error" => "Erreur lors de la suppression définitive"]);
        }
    }
    

}

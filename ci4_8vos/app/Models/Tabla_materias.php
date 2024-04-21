<?php

namespace App\Models;

use CodeIgniter\Model;

class Tabla_materias extends Model {
    protected $table      = 'asignatura';
    protected $primaryKey = 'idAsignatura';
    protected $returnType = 'object';
    protected $allowedFields = ['idAsignatura', 'asignatura', 'acronimo', 'creditos'];

    // Crear una nueva asignatura
    public function create_data($data = []) {
        if (!empty($data)) {
            return $this->insert($data);
        } else {
            return false;
        }
    }

    // Obtener una asignatura por su ID
    public function get_asignatura($idAsignatura) {
        return $this->where($this->primaryKey, $idAsignatura)
                    ->get()
                    ->getRow();
    }

    // Obtener todas las asignaturas
    public function get_asignaturas() {
        $query = $this->findAll();
        echo $this->getLastQuery(); // Imprime la consulta generada
        var_dump($query); // Imprime los resultados obtenidos
        return $query;
    }
    

    // Actualizar datos de una asignatura
    public function update_data($idAsignatura, $data = []) {
        if (!empty($data)) {
            return $this->update($idAsignatura, $data);
        } else {
            return false;
        }
    }

    // Eliminar una asignatura por su ID
    public function delete_data($idAsignatura) {
        return $this->delete($idAsignatura);
    }
}

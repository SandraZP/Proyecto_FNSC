<?php

namespace App\Models;

use CodeIgniter\Model;

class Tabla_periodos extends Model
{
    protected $table = 'periodo';
    protected $primaryKey = 'idperiodo';
    protected $returnType = 'object';
    protected $allowedFields = ['idperiodo', 'nombreperiodo', 'acronimo', 'fecha_inicio', 'fecha_fin', 'estatus'];

    // Crear una nueva asignatura
    public function create_data($data = []) {
        if (!empty($data)) {
            return $this->insert($data);
        } else {
            return false;
        }
    }

    // Obtener una asignatura por su ID
    public function get_asignatura($idperiodo) {
        return $this->where($this->primaryKey, $idperiodo)
                    ->get()
                    ->getRow();
    }

    // Obtener todas las asignaturas
    public function get_periodos() {
        $query = $this->findAll();
        echo $this->getLastQuery(); // Imprime la consulta generada
        var_dump($query); // Imprime los resultados obtenidos
        return $query;
    }
    

    // Actualizar datos de una asignatura
    public function update_data($idperiodo, $data = []) {
        if (!empty($data)) {
            return $this->update($idperiodo, $data);
        } else {
            return false;
        }
    }

    // Eliminar una asignatura por su ID
    public function delete_data($idperiodo) {
        return $this->delete($idperiodo);
    }
}

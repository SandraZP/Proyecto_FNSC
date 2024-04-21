<?php

namespace App\Models;

use CodeIgniter\Model;

class Tabla_docentes extends Model {
    protected $table      = 'docente';
    protected $primaryKey = 'iddocente';
    protected $returnType = 'object';
    protected $allowedFields = ['iddocente', 'numero_empleado', 'grado_estudios', 'id_usuario','idpe'];

    // Crear una nueva asignatura
    public function create_data($data = []) {
        if (!empty($data)) {
            return $this->insert($data);
        } else {
            return false;
        }
    }

    // Obtener una asignatura por su ID
    public function get_docente($iddocente) {
        return $this->where($this->primaryKey, $iddocente)
                    ->get()
                    ->getRow();
    }

    // Obtener todas las asignaturas
    public function get_docentes() {
        $query = $this->findAll();
        echo $this->getLastQuery(); // Imprime la consulta generada
        var_dump($query); // Imprime los resultados obtenidos
        return $query;
    }
    

    // Actualizar datos de una asignatura
    public function update_data($iddocente, $data = []) {
        if (!empty($data)) {
            return $this->update($iddocente, $data);
        } else {
            return false;
        }
    }

    // Eliminar una asignatura por su ID
    public function delete_data($iddocente) {
        return $this->delete($iddocente);
    }
}

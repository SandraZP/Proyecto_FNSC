<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class Tabla_docentes extends Model {
        protected $table      = 'docente';
        protected $primaryKey = 'iddocente';
        protected $returnType = 'object';
        protected $allowedFields = [
                                    'iddocente', 'numero_empleado','grado_estudios','id_usuario','idpe'   
                                ];  

        //============================
        // Consultas epecificas o básicas
        // Create Read Update Delete
        //============================
        public function create_data($data = array()) {
            if (!empty($data)) {
                return $this
                    ->table($this->table)
                    ->insert($data);
            }//end if 
            else{
                return FALSE;
            }//end else
        }//end create_data

        public function get_user($contraints = array()){
            return $this
                ->table($this->table)
                ->where($contraints)
                ->get()
                ->getRow();
        }//get_user

        public function get_table(){
            return $this
                ->table($this->table)
                ->get()
                ->getResult();
        }//get_table

        public function update_data($id = 0, $data = array()){
            if (!empty($data)) {
                return $this
                    ->table($this->table)
                    ->where([$this->primaryKey => $id])
                    ->set($data)
                    ->update();
            }//end if
            else{
                return FALSE;
            }//end else
        }//update_data


        public function delete_data($iddocente = 0) {
            // Verificar si se proporcionó un ID de docente válido
            if ($iddocente <= 0) {
                return false; // ID no válido, no se puede eliminar
            }
        
            // Intentar eliminar el registro
            return $this->db
                        ->table($this->table)
                        ->where([$this->primaryKey => $iddocente])
                        ->delete();
        }
        
    }//end Tabla_usuarios
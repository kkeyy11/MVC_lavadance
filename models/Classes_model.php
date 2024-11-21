<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Classes_model extends Model {

    public function read(){
        return $this->db->table('dance_classes')->get_all();
    }

    public function create($class_name, $instructor_name, $class_time, $available_slots) {
        $data = array(
            'class_name' => $class_name,
            'instructor_name' => $instructor_name,
            'class_time' => $class_time,
            'available_slots' => $available_slots
        );
    
        return $this->db->table('dance_classes')->insert($data);
    }
    

	
}
?>

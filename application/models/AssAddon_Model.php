<?php 

class AssAddon_Model extends CI_Model {

    // !!--------------- General Functions --------------!!
    public function get()
    {
        $query = $this->db->order_by('ao_name', 'ASC')->get('assignment_addon');
        return $query->result();
    }

    public function getById($id)
    {
        $query = $this->db->where("ao_id =",$id)->get("assignment_addon");
        return $query->row();
    }

    public function create($data)
    {
       $this->db->insert("assignment_addon", $data);
       $result = $this->db->insert_id();
       return $result;
    } 

    public function update($data)
    {
        $id = $data['ao_id'];
        $this->db->where('ao_id', $id);
        $this->db->update('assignment_addon', $data);
        $result = $this->db->affected_rows();
        return $result;
    }

    public function delete($data)
    {
        $id = $data['ao_id'];
        $this->db->where('ao_id', $id);
        $this->db->delete('assignment_addon'); 
        return $this->db->affected_rows();
    }

    public function countOrder($id){
        // $where = "order_appraiser_id='$id' OR order_appraiser_id2='$id'";
        $this->db->where("order_assignment_id", $id); 
        return $this->db->count_all_results('orders');
    }

    

}

?>
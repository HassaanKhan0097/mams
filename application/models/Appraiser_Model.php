<?php 

class Appraiser_Model extends CI_Model {

    // !!--------------- General Functions --------------!!
    public function get()
    {
        $query = $this->db->get('appraiser');
        return $query->result();
    }

    public function getById($id)
    {
        $query = $this->db->where("app_id =",$id)->get("appraiser");
        return $query->row();
    }

    public function create($data)
    {
       $this->db->insert("appraiser", $data);
       $result = $this->db->insert_id();
       return $result;
    } 

    public function update($data)
    {
        $id = $data['app_id'];
        $this->db->where('app_id', $id);
        $this->db->update('appraiser', $data);
        $result = $this->db->affected_rows();
        return $result;
    }

    public function delete($data)
    {
        $id = $data['app_id'];
        $this->db->where('app_id', $id);
        $this->db->delete('appraiser'); 
        return $this->db->affected_rows();
    }

    

}

?>
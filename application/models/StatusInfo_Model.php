<?php 

class StatusInfo_Model extends CI_Model {

    // !!--------------- General Functions --------------!!
    public function get()
    {
        $query = $this->db->get('status_info');
        return $query->result();
    }

    public function getById($id)
    {
        $query = $this->db->where("st_id =",$id)->get("status_info");
        return $query->row();
    }

    public function create($data)
    {
       $this->db->insert("status_info", $data);
       $result = $this->db->insert_id();
       return $result;
    } 

    public function update($data)
    {
        $id = $data['st_id'];
        $this->db->where('st_id', $id);
        $this->db->update('status_info', $data);
        $result = $this->db->affected_rows();
        return $result;
    }

    public function delete($data)
    {
        $id = $data['st_id'];
        $this->db->where('st_id', $id);
        $this->db->delete('status_info'); 
        return $this->db->affected_rows();
    }

    

}

?>
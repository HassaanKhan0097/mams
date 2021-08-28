<?php 

class CompanyInfo_Model extends CI_Model {

    // !!--------------- General Functions --------------!!
    public function get()
    {
        $query = $this->db->get('company_info');
        return $query->result();
    }

    public function getById($id)
    {
        $query = $this->db->where("company_id =",$id)->get("company_info");
        return $query->row();
    }

    // public function create($data)
    // {
    //    $this->db->insert("assignment_types", $data);
    //    $result = $this->db->insert_id();
    //    return $result;
    // } 

    public function update($data)
    {
        $id = $data['company_id'];
        $this->db->where('company_id', $id);
        $this->db->update('company_info', $data);
        $result = $this->db->affected_rows();
        return $result;
    }

    // public function delete($data)
    // {
    //     $id = $data['at_id'];
    //     $this->db->where('at_id', $id);
    //     $this->db->delete('assignment_types'); 
    //     return $this->db->affected_rows();
    // }

    

}

?>
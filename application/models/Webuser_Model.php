
<?php 

class Webuser_Model extends CI_Model {

    // !!--------------- General Functions --------------!!
    public function get()
    {
        $query = $this->db->get('web_users');
        return $query->result();
    }

    public function getById($id)
    {
        $query = $this->db->where("web_id =",$id)->get("web_users");
        return $query->row();
    }

    public function create($data)
    {
       $this->db->insert("web_users", $data);
       $result = $this->db->insert_id();
       return $result;
    } 

    public function update($data)
    {
        $id = $data['web_id'];
        $this->db->where('web_id', $id);
        $this->db->update('web_users', $data);
        $result = $this->db->affected_rows();
        return $result;
    }

    public function delete($data)
    {
        $id = $data['web_id'];
        $this->db->where('web_id', $id);
        $this->db->delete('web_users'); 
        return $this->db->affected_rows();
    }

    

}

?>
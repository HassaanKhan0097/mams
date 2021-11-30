
<?php 

class Webuser_Model extends CI_Model {

    // !!--------------- General Functions --------------!!
    public function get()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('appraiser as app','app.app_id = users.user_app','left');
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        $query = $this->db->where("web_id =",$id)->get("web_users");
        return $query->row();
    }

    public function create($data)
    {
       $this->db->insert("users", $data);
       $result = $this->db->insert_id();
       return $result;
    } 

    public function update($data)
    {
        $id = $data['user_id'];
        $this->db->where('user_id', $id);
        $this->db->update('users', $data);
        $result = $this->db->affected_rows();
        return $result;
    }

    public function delete($data)
    {
        $id = $data['user_id'];
        $this->db->where('user_id', $id);
        $this->db->delete('users'); 
        return $this->db->affected_rows();
    }

    

}

?>
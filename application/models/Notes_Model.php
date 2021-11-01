
<?php 

class Notes_Model extends CI_Model {

    // !!--------------- General Functions --------------!!
    // public function get()
    // {
    //     $query = $this->db->get('order_types');
    //     return $query->result();
    // }

    public function getById($id)
    {
        $this->db->where('order_id', $id);
        $this->db->from('notes');
        $this->db->join('users','users.user_id = notes.user_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function create($data)
    {
       $this->db->insert("notes", $data);
       $result = $this->db->insert_id();
       return $result;
    } 

    public function update($data)
    {
        $id = $data['notes_id'];
        $this->db->where('notes_id', $id);
        $this->db->update('notes', $data);
        $result = $this->db->affected_rows();
        return $result;
    }

    public function delete($data)
    {
        $id = $data['notes_id'];
        $this->db->where('notes_id', $id);
        $this->db->delete('notes'); 
        return $this->db->affected_rows();
    }


    public function loanCreate($data)
    {
       $this->db->insert("notes", $data);
       $result = $this->db->insert_id();
       return $result;
    }
}

?>
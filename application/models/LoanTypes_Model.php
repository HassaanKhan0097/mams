
<?php 

class LoanTypes_Model extends CI_Model {

    // !!--------------- General Functions --------------!!
    public function get()
    {
        $query = $this->db->get('loan_types');
        return $query->result();
    }

    public function getById($id)
    {
        $query = $this->db->where("loan_id =",$id)->get("loan_types");
        return $query->row();
    }

    public function create($data)
    {
       $this->db->insert("loan_types", $data);
       $result = $this->db->insert_id();
       return $result;
    } 

    public function update($data)
    {
        $id = $data['loan_id'];
        $this->db->where('loan_id', $id);
        $this->db->update('loan_types', $data);
        $result = $this->db->affected_rows();
        return $result;
    }

    public function delete($data)
    {
        $id = $data['loan_id'];
        $this->db->where('loan_id', $id);
        $this->db->delete('loan_types'); 
        return $this->db->affected_rows();
    }


    public function countOrder($id){
        // $where = "order_appraiser_id='$id' OR order_appraiser_id2='$id'";
        $this->db->where("order_loan_type", $id); 
        return $this->db->count_all_results('order');
    }

    

}

?>
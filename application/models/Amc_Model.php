
<?php 

class Amc_Model extends CI_Model {

    // !!--------------- General Functions --------------!!
    public function get()
    {
        $query = $this->db->order_by('amc_name', 'ASC')->get('amc');
        return $query->result();
    }

    public function getById($id)
    {
        $query = $this->db->where("amc_id =",$id)->get("amc");
        return $query->row();
    }

    public function create($data)
    {
       $this->db->insert("amc", $data);
       $result = $this->db->insert_id();
       return $result;
    } 

    public function update($data)
    {
        $id = $data['amc_id'];
        $this->db->where('amc_id', $id);
        $this->db->update('amc', $data);
        $result = $this->db->affected_rows();
        return $result;
    }

    public function delete($data)
    {
        $id = $data['amc_id'];
        $this->db->where('amc_id', $id);
        $this->db->delete('amc'); 
        return $this->db->affected_rows();
    }

    public function countClient($id){
        // $where = "order_appraiser_id='$id' OR order_appraiser_id2='$id'";
        $this->db->where("cl_amc_id", $id); 
        return $this->db->count_all_results('client');
    }

    

}

?>
<?php 

class Client_Model extends CI_Model {

    // !!--------------- General Functions --------------!!
    public function get()
    {
        $this->db->select('*');
        $this->db->from('client');
        $this->db->join('amc','amc.amc_id = client.cl_amc_id', 'left');
        $this->db->join('city','city.city_id = client.cl_city', 'left');
        $this->db->order_by('cl_name', 'ASC');         
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('client');
        $this->db->join('amc','amc.amc_id = client.cl_amc_id', 'left');
        // $this->db->join('country','country.country_id = client.cl_country_id', 'left');
        $this->db->join('city','city.city_id = client.cl_city', 'left');  
        $this->db->where("cl_id =",$id);  
        $query = $this->db->get();
        return $query->result();  
    }

    public function create($data)
    {
       $this->db->insert("client", $data);
       $result = $this->db->insert_id();
       return $result;
    } 

    public function update($data)
    {
        $id = $data['cl_id'];
        $this->db->where('cl_id', $id);
        $this->db->update('client', $data);
        $result = $this->db->affected_rows();
        return $result;
    }

    public function delete($data)
    {
        $id = $data['cl_id'];
        $this->db->where('cl_id', $id);
        $this->db->delete('client'); 
        return $this->db->affected_rows();
    }

    public function countOrder($id){

        // $where = "order_appraiser_id='$id' OR order_appraiser_id2='$id'";
        $this->db->where("order_client_id", $id); 
        return $this->db->count_all_results('orders');
    }


    

}

?>
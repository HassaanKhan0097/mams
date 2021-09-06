<?php 

class Client_Model extends CI_Model {

    // !!--------------- General Functions --------------!!
    public function get()
    {
        $this->db->select('*');
        $this->db->from('client');
        $this->db->join('country','country.country_id = client.cl_country_id' );
        $this->db->join('city','city.city_id = client.cl_city_id' );        
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('client');
        $this->db->join('country','country.country_id = client.cl_country_id' );
        $this->db->join('city','city.city_id = client.cl_city_id' );  
        $this->db->where("cl_id =",$id);  
        $query = $this->db->get();
        return $query->result();  
    }
    public function getCountry(){
        $query = $this->db->get('country');
        return $query->result();
    }
    public function getCity(){
        $query = $this->db->get('city');
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

    

}

?>
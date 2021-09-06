<?php 

class Order_Model extends CI_Model {

    // !!--------------- General Functions --------------!!
    public function get()
    {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->join('appraiser','appraiser.app_id = order.order_appraiser_id' );
        $this->db->join('assignment_types','assignment_types.at_id = order.order_assignment_id' );        
        $this->db->join('city','city.city_id = order.order_city_id' );
        $this->db->join('client','client.cl_id = order.order_client_id' );
        $this->db->join('order_types','order_types.order_id = order.order_type_id' );
        $this->db->join('status_info','status_info.st_id = order.order_status_id' );
        
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
    public function getAppraiser(){
        $query = $this->db->get('appraiser');
        return $query->result();
    }
    public function getClient(){
        $query = $this->db->get('client');
        return $query->result();
    }
    public function getOrderTypes(){
        $query = $this->db->get('order_types');
        return $query->result();
    }
    public function getStatusInfo(){
        $query = $this->db->get('status_info');
        return $query->result();
    }
    public function getAssignmentTypes(){
        $query = $this->db->get('assignment_types');
        return $query->result();
    }


    public function create($data)
    {
       $this->db->insert("order", $data);
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
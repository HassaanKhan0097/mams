<?php 

class Order_Model extends CI_Model {

    // !!--------------- General Functions --------------!!
    public function get()
    {
        $this->db->select('*, at.at_id as at_id, at.at_name AS at_name, at2.at_id as at2_id, at2.at_name AS at2_name, at3.at_id AS at3_id, at3.at_name AS at3_name, cl.cl_id AS cl_id, cl.cl_name AS cl_name, cl2.cl_id AS cl2_id, cl2.cl_name AS cl2_name');
        $this->db->from('order');
        $this->db->join('appraiser','appraiser.app_id = order.order_appraiser_id', 'left');
        $this->db->join('assignment_types as at','at.at_id = order.order_assignment_id', 'left'); 
        $this->db->join('assignment_types as at2','at2.at_id = order.order_assignment_id2', 'left'); 
        $this->db->join('assignment_types as at3','at3.at_id = order.order_assignment_id3', 'left');        
        $this->db->join('city','city.city_id = order.order_city_id');
        $this->db->join('client as cl','cl.cl_id = order.order_client_id', 'left');
        $this->db->join('client as cl2','cl2.cl_id = order.order_client_id2', 'left');
        $this->db->join('order_types','order_types.order_id = order.order_type_id');
        $this->db->join('status_info','status_info.st_id = order.order_status_id');
        
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        $this->db->select('*');
        $this->db->from('client');
        $this->db->join('country','country.country_id = client.cl_country_id', 'left');
        $this->db->join('city','city.city_id = client.cl_city_id', 'left');  
        $this->db->where("cl_id =",$id);  
        $query = $this->db->get();
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



    // !!--------------- Utility Functions --------------!!


    public function getOrderNumbers()
    {
        $this->db->select('order_number');
        $this->db->from('order'); 
        $query = $this->db->get();
        return $query->result();  
    }

    

}

?>
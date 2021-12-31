<?php 

class Order_Model extends CI_Model {

    // !!--------------- General Functions --------------!!
    public function get()
    {
        $this->db->select('*, at.at_id as at_id, at.at_name AS at_name, at2.at_id as at2_id, at2.at_name AS at2_name, at3.at_id AS at3_id, at3.at_name AS at3_name, cl.cl_id AS cl_id, cl.cl_name AS cl_name, cl2.cl_id AS cl2_id, cl2.cl_name AS cl2_name');
        $this->db->from('orders');
        $this->db->join('appraiser','appraiser.app_id = orders.order_appraiser_id', 'left');
        $this->db->join('assignment_types as at','at.at_id = orders.order_assignment_id', 'left'); 
        $this->db->join('assignment_types as at2','at2.at_id = orders.order_assignment_id2', 'left'); 
        $this->db->join('assignment_types as at3','at3.at_id = orders.order_assignment_id3', 'left');        
        // $this->db->join('city','city.city_id = order.order_city_id');
        $this->db->join('city','city.city_id = orders.order_city', 'left');
        $this->db->join('client as cl','cl.cl_id = orders.order_client_id', 'left');
        $this->db->join('amc as a','a.amc_id = cl.cl_amc_id');
        $this->db->join('client as cl2','cl2.cl_id = orders.order_client_id2', 'left');
        $this->db->join('order_types','order_types.order_id = orders.order_type_id');
        $this->db->join('status_info','status_info.st_id = orders.order_status_id');
        
        $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        $this->db->select("*, DATE_FORMAT(order_duedate,'%m/%d/%Y') as order_duedate, 
        DATE_FORMAT(order_date,'%m/%d/%Y') as order_date, 
        DATE_FORMAT(order_appointmentdate,'%m/%d/%Y') as order_appointmentdate, 
        DATE_FORMAT(order_completedate,'%m/%d/%Y') as order_completedate, 
        at.at_id as at_id, 
        at.at_name AS at_name, 
        at2.at_id as at2_id, 
        at2.at_name AS at2_name, 
        at3.at_id AS at3_id, 
        at3.at_name AS at3_name, 
        cl.cl_id AS cl_id, 
        cl.cl_name AS cl_name,        
        cl.cl_email AS cl_email, 
        cl.cl_email2 AS cl_email2,
        cl.cl_contact AS cl_contact, 
        cl.cl_address AS cl_address, 
        c2.city_name AS cl_city, 
        city.city_name AS cl_order_city, 
        cl.cl_state AS cl_state, 
        cl.cl_zipcode AS cl_zipcode, 
        cl.cl_website AS cl_website, 
        a.amc_name AS amc_name,
        l.loan_name AS loan_name,
        cl2.cl_id AS cl2_id, 
        cl2.cl_name AS cl2_name,
        
        
        ");

        // cl.cl_amc_id AS cl_amc_id, 
        $this->db->from('orders');
        $this->db->join('appraiser','appraiser.app_id = orders.order_appraiser_id', 'left');
        $this->db->join('assignment_types as at','at.at_id = orders.order_assignment_id', 'left'); 
        $this->db->join('assignment_types as at2','at2.at_id = orders.order_assignment_id2', 'left'); 
        $this->db->join('assignment_types as at3','at3.at_id = orders.order_assignment_id3', 'left');
        $this->db->join('appraiser as app2','app2.app_id = orders.order_appraiser_id2', 'left');
        // $this->db->join('vouchers as v','v.v_number = orders.order_v_client', 'left');
        // c
        $this->db->join('city','city.city_id = orders.order_city', 'left');
        $this->db->join('client as cl','cl.cl_id = orders.order_client_id', 'left');
        $this->db->join('city as c2','c2.city_id = cl.cl_city', 'left'); 
        $this->db->join('loan_types as l','l.loan_id = orders.order_loan_type', 'left') ;
        $this->db->join('amc as a','a.amc_id = cl.cl_amc_id') ;
        $this->db->join('client as cl2','cl2.cl_id = orders.order_client_id2', 'left');
        $this->db->join('order_types','order_types.order_id = orders.order_type_id');
        $this->db->join('status_info','status_info.st_id = orders.order_status_id');
        $this->db->where("order_number =",$id);

        $query = $this->db->get();
        return $query->result();  
    }
    
    public function getClientVoucher($id){
        $query = $this->db->where("v_number =",$id)->get("vouchers");
        return $query->row();
    }
    public function getAppraiserVoucher($id){
        $query = $this->db->where("v_number =",$id)->get("vouchers");
        return $query->row();
    }
    public function checkId($id)
    {
        $query = $this->db->where("order_number =",$id)->get("orders");
        // return $query->row();
        return $query->num_rows();
        //   ->count_all_results()

    }
    public function create($data)
    {
        // echo "<pre>";
        // echo "Create";
        // print_r($data);

       $this->db->insert("order", $data);
       $result = $this->db->insert_id();

        //This working is because primary key is our own, not auto incremented
        $result = $this->db->affected_rows() > 0;
        if ($result) { return 1; } else { return 0; }
    } 

    public function update($data)
    {
        $id = $data['order_number'];
        $this->db->where('order_number', $id);
        $this->db->update('orders', $data);
        $result = $this->db->affected_rows();
        return $result;
    }

    public function delete($data)
    {
        $id = $data['order_number'];
        $this->db->where('order_number', $id);
        $this->db->delete('orders'); 
        return $this->db->affected_rows();
    }

    public function getNotesById($id)
    {
        $this->db->where('order_id', $id);
        $this->db->from('notes');
        $this->db->join('users','users.user_id = notes.user_id');
        $query = $this->db->get();
        return $query->result();
    }



    // !!--------------- Utility Functions --------------!!


    public function getOrderNumbers()
    {
        $this->db->select('order_number');
        $this->db->from('orders')->limit(5)->order_by('order_number',"DESC"); 
        $query = $this->db->get();
        return $query->result();  
    }

    public function getByFilter($filter)
    {
        $this->db->select("*, DATE_FORMAT(order_duedate,'%m/%d/%Y') as order_duedate, DATE_FORMAT(order_date,'%m/%d/%Y') as order_date, DATE_FORMAT(order_appointmentdate,'%m/%d/%Y') as order_appointmentdate, DATE_FORMAT(order_completedate,'%m/%d/%Y') as order_completedate, at.at_id as at_id, at.at_name AS at_name, at2.at_id as at2_id, at2.at_name AS at2_name, at3.at_id AS at3_id, at3.at_name AS at3_name, cl.cl_id AS cl_id, cl.cl_name AS cl_name, cl2.cl_id AS cl2_id, cl2.cl_name AS cl2_name");
        $this->db->from('orders');
        $this->db->join('appraiser','appraiser.app_id = orders.order_appraiser_id', 'left');
        $this->db->join('assignment_types as at','at.at_id = orders.order_assignment_id', 'left'); 
        $this->db->join('assignment_types as at2','at2.at_id = orders.order_assignment_id2', 'left'); 
        $this->db->join('assignment_types as at3','at3.at_id = orders.order_assignment_id3', 'left');        
        // $this->db->join('city','city.city_id = order.order_city_id');
        $this->db->join('client as cl','cl.cl_id = orders.order_client_id', 'left');
        $this->db->join('client as cl2','cl2.cl_id = orders.order_client_id2', 'left');
        $this->db->join('order_types','order_types.order_id = orders.order_type_id');
        $this->db->join('status_info','status_info.st_id = orders.order_status_id');
        $this->db->where($filter['key']." =",$filter['value']);

        $query = $this->db->get();
        return $query->result();  
    }

    public function advanceSearch($data){

        // echo "Reached";
        // SELECT * FROM `order` WHERE order_city like '%3%' AND order_client_id like '%%'
        $this->db->select('*, at.at_id as at_id, at.at_name AS at_name, at2.at_id as at2_id, at2.at_name AS at2_name, at3.at_id AS at3_id, at3.at_name AS at3_name, cl.cl_id AS cl_id, cl.cl_name AS cl_name, cl2.cl_id AS cl2_id, cl2.cl_name AS cl2_name');
        $this->db->from('orders');
        // $this->db->where('order_number',  "12348");
        $this->db->join('appraiser','appraiser.app_id = orders.order_appraiser_id', 'left');
        $this->db->join('assignment_types as at','at.at_id = orders.order_assignment_id', 'left'); 
        $this->db->join('assignment_types as at2','at2.at_id = orders.order_assignment_id2', 'left'); 
        $this->db->join('assignment_types as at3','at3.at_id = orders.order_assignment_id3', 'left');        
        // $this->db->join('city','city.city_id = order.order_city_id');
        $this->db->join('city','city.city_id = orders.order_city', 'left');
        $this->db->join('client as cl','cl.cl_id = orders.order_client_id', 'left');
        $this->db->join('amc as a','a.amc_id = cl.cl_amc_id');
        $this->db->join('client as cl2','cl2.cl_id = orders.order_client_id2', 'left');
        $this->db->join('order_types','order_types.order_id = orders.order_type_id');
        $this->db->join('status_info','status_info.st_id = orders.order_status_id');

        // $order_number = $data['order_number'];
        // $order_number =  "12348";
        // $this->db->like('order_number',  "12348");

        // $this->db->where("order_number =",$id);

        // $array = ['order_number' => $order_number];
        
        $this->db->like('order_number', $data['order_number']);
        $this->db->like('order_address', $data['order_address']);
        $this->db->like('order_client_id', $data['order_client_id']);
        $this->db->like('order_city', $data['order_city']);
        $this->db->like('order_borrower', $data['order_borrower']);
        $this->db->like('order_appraiser_id', $data['order_appraiser_id']);
        $this->db->like('order_zipcode', $data['order_zipcode']);
        $this->db->like('order_appointmentdate', $data['order_appointmentdate']);

        // $builder->like($array);


        $query = $this->db->get();  
        return $query->result();  
    }


    
    

}

?>
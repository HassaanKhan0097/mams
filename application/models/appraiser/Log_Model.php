<?php 

class Log_Model extends CI_Model {

    // !!--------------- General Functions --------------!!
  
    public function getLog($id)
    {
        // $this->db->select("*, DATE_FORMAT(order_duedate,'%m/%d/%Y') as order_duedate, DATE_FORMAT(order_date,'%m/%d/%Y') as order_date, DATE_FORMAT(order_appointmentdate,'%m/%d/%Y') as order_appointmentdate, DATE_FORMAT(order_completedate,'%m/%d/%Y') as order_completedate, at.at_id as at_id, at.at_name AS at_name, at2.at_id as at2_id, at2.at_name AS at2_name, at3.at_id AS at3_id, at3.at_name AS at3_name, cl.cl_id AS cl_id, cl.cl_name AS cl_name, cl2.cl_id AS cl2_id, cl2.cl_name AS cl2_name");
        // $this->db->from('order');
        // $this->db->join('appraiser','appraiser.app_id = order.order_appraiser_id', 'left');
        // $this->db->join('assignment_types as at','at.at_id = order.order_assignment_id', 'left'); 
        // $this->db->join('assignment_types as at2','at2.at_id = order.order_assignment_id2', 'left'); 
        // $this->db->join('assignment_types as at3','at3.at_id = order.order_assignment_id3', 'left');        
        // // $this->db->join('city','city.city_id = order.order_city_id');
        // $this->db->join('client as cl','cl.cl_id = order.order_client_id', 'left');
        // $this->db->join('client as cl2','cl2.cl_id = order.order_client_id2', 'left');
        // $this->db->join('order_types','order_types.order_id = order.order_type_id');
        // $this->db->join('status_info','status_info.st_id = order.order_status_id');
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
        app2.app_name as app2_name,
        appraiser.app_name as app_name,
        cl2.cl_name AS cl2_name");
        $this->db->from('orders');
        // $this->db->join('appraiser as app','app.app_id = order.order_appraiser_id', 'left');
        // $this->db->join('appraiser as app2','app2.app_id = order.order_appraiser_id2', 'left');
        // $this->db->join('assignment_types as at','at.at_id = order.order_assignment_id', 'left'); 
        // $this->db->join('assignment_types as at2','at2.at_id = order.order_assignment_id2', 'left'); 
        // $this->db->join('assignment_types as at3','at3.at_id = order.order_assignment_id3', 'left');        
        // // $this->db->join('city','city.city_id = order.order_city_id');
        // $this->db->join('client as cl','cl.cl_id = order.order_client_id', 'left');
        // $this->db->join('client as cl2','cl2.cl_id = order.order_client_id2', 'left');


        $this->db->join('appraiser','appraiser.app_id = orders.order_appraiser_id', 'left');
        $this->db->join('appraiser as app2','app2.app_id = orders.order_appraiser_id2', 'left');
        $this->db->join('assignment_types as at','at.at_id = orders.order_assignment_id', 'left'); 
        $this->db->join('assignment_types as at2','at2.at_id = orders.order_assignment_id2', 'left'); 
        $this->db->join('assignment_types as at3','at3.at_id = orders.order_assignment_id3', 'left');        
        // $this->db->join('city','city.city_id = order.order_city_id');
        $this->db->join('city','city.city_id = orders.order_city');
        $this->db->join('client as cl','cl.cl_id = orders.order_client_id', 'left');
        $this->db->join('city as c2','c2.city_id = cl.cl_city', 'left'); 
        $this->db->join('loan_types as l','l.loan_id = orders.order_loan_type', 'left') ;
        $this->db->join('amc as a','a.amc_id = cl.cl_amc_id') ;
        $this->db->join('client as cl2','cl2.cl_id = orders.order_client_id2', 'left');


        $this->db->join('order_types','order_types.order_id = orders.order_type_id');
        $this->db->join('status_info','status_info.st_id = orders.order_status_id');
        $this->db->where("order_appraiser_id =",$id);
        $this->db->where("order_status_id IN (15,16)");
        $query = $this->db->get();
        return $query->result();
    }

    public function getByOrderNumber($on)
    {
        //$this->db->select("*, DATE_FORMAT(order_duedate,'%m/%d/%Y') as order_duedate, DATE_FORMAT(order_date,'%m/%d/%Y') as order_date, DATE_FORMAT(order_appointmentdate,'%m/%d/%Y') as order_appointmentdate, DATE_FORMAT(order_completedate,'%m/%d/%Y') as order_completedate, app.app_id as app_id,app.app_name as app_name,app2.app_id as app2_id,app2.app_name as app2_name, at.at_id as at_id, at.at_name AS at_name, at2.at_id as at2_id, at2.at_name AS at2_name, at3.at_id AS at3_id, at3.at_name AS at3_name, cl.cl_id AS cl_id, cl.cl_name AS cl_name, cl2.cl_id AS cl2_id, cl2.cl_name AS cl2_name");
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
        app2.app_name as app2_name,
        appraiser.app_name as app_name,
        cl2.cl_name AS cl2_name");
        $this->db->from('orders');
        // $this->db->join('appraiser as app','app.app_id = order.order_appraiser_id', 'left');
        // $this->db->join('appraiser as app2','app2.app_id = order.order_appraiser_id2', 'left');
        // $this->db->join('assignment_types as at','at.at_id = order.order_assignment_id', 'left'); 
        // $this->db->join('assignment_types as at2','at2.at_id = order.order_assignment_id2', 'left'); 
        // $this->db->join('assignment_types as at3','at3.at_id = order.order_assignment_id3', 'left');        
        // // $this->db->join('city','city.city_id = order.order_city_id');
        // $this->db->join('client as cl','cl.cl_id = order.order_client_id', 'left');
        // $this->db->join('client as cl2','cl2.cl_id = order.order_client_id2', 'left');


        $this->db->join('appraiser','appraiser.app_id = orders.order_appraiser_id', 'left');
        $this->db->join('appraiser as app2','app2.app_id = orders.order_appraiser_id2', 'left');
        $this->db->join('assignment_types as at','at.at_id = orders.order_assignment_id', 'left'); 
        $this->db->join('assignment_types as at2','at2.at_id = orders.order_assignment_id2', 'left'); 
        $this->db->join('assignment_types as at3','at3.at_id = orders.order_assignment_id3', 'left');        
        // $this->db->join('city','city.city_id = orders.order_city_id');
        $this->db->join('city','city.city_id = orders.order_city');
        $this->db->join('client as cl','cl.cl_id = orders.order_client_id', 'left');
        $this->db->join('city as c2','c2.city_id = cl.cl_city', 'left'); 
        $this->db->join('loan_types as l','l.loan_id = orders.order_loan_type', 'left') ;
        $this->db->join('amc as a','a.amc_id = cl.cl_amc_id') ;
        $this->db->join('client as cl2','cl2.cl_id = orders.order_client_id2', 'left');


        $this->db->join('order_types','order_types.order_id = orders.order_type_id');
        $this->db->join('status_info','status_info.st_id = orders.order_status_id');
        $this->db->where("order_number =",$on);
        // $this->db->where("order_appraiser_id =",$id);
        $query = $this->db->get();
        return $query->result();
    }


}

?>
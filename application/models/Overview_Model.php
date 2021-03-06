<?php 

class Overview_Model extends CI_Model {

    // !!--------------- General Functions --------------!!
    public function getByAppraiser()
    {
        $query = $this->db->query("SELECT app.app_id, app.app_name, COUNT(*) as files from `orders` ord LEFT JOIN `appraiser` app on ord.order_appraiser_id = app.app_id where ord.order_status_id not in (10,15,16) GROUP BY ord.order_appraiser_id");
        return $query->result();
    }

    public function getByClient()
    {
        $query = $this->db->query("SELECT cl.cl_id, cl.cl_name, COUNT(*) as files from `orders` ord LEFT JOIN `client` cl on ord.order_client_id = cl.cl_id where ord.order_status_id not in (10,15,16) GROUP BY ord.order_client_id");
        return $query->result();
    }

    public function getByStatus()
    {
        $query = $this->db->query("SELECT st.st_id, st.st_name, COUNT(*) as files from `orders` ord LEFT JOIN `status_info` st on ord.order_status_id = st.st_id GROUP BY ord.order_status_id order by st.st_id");
        return $query->result();
    }
    
    public function getByDueDate()
    {
        // $query = $this->db->query("SELECT order_duedate, COUNT(*) as files FROM `orders` WHERE DATE(order_duedate) >= DATE(NOW()) GROUP By order_duedate");

        // $query = $this->db->query("SELECT COUNT(*) as files, order_duedate FROM orders where order_status_id not in (10,15,16)GROUP BY order_duedate");

        $query = $this->db->query("SELECT order_duedate, order_status_id, order_client_id, order_appraiser_id FROM orders where order_status_id not in (10,15,16) ");


       
        return $query->result();
    }

    public function getByActionRequired()
    {
        $query = $this->db->query("SELECT order_number from `orders` where order_action = 'Yes'");
        return $query->result();
    }
    

    

}

?>
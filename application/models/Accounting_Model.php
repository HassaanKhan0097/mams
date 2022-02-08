
<?php 

class Accounting_Model extends CI_Model {

    // !!--------------- General Functions --------------!!

    // select o.order_number, o.order_client_id, o.order_duedate, o.order_revenue, c.cl_name from orders as o inner join client as c ON o.order_client_id=c.cl_id order by o.order_client_id

    public function getAccClient()
    {
        $where = 'o.order_v_client = "" OR o.order_v_client is null';
        $this->db->select('o.order_number, o.order_client_id, o.order_duedate, o.order_revenue, c.cl_name')->from('orders as o')->join('client as c','c.cl_id = o.order_client_id')->where($where)->order_by('o.order_client_id', 'ASC');
        $query = $this->db->get();
        return $query->result();  
    }

    public function getAccClientById($id){
        $where = '(o.order_v_client = "" OR o.order_v_client is null) AND o.order_client_id = ' . $id;
        $this->db->select('o.order_number, o.order_revenue, o.order_address, o.order_paymentmethod, o.order_city, ci.city_name, o.order_borrower, o.order_appraiser_id, a.app_name')->from('orders as o')->join('client as c','c.cl_id = o.order_client_id')->join('city as ci','ci.city_id = o.order_city')->join('appraiser as a','a.app_id = o.order_appraiser_id')->where($where);
        $query = $this->db->get();
        return $query->result();  
    }

    public function createAccClient($data)
    {
       $this->db->insert("vouchers", $data);
       $result = $this->db->insert_id();
       return $result;
    } 

    public function updateAcc($data){
        $id = $data['order_number'];
        $order = $data['order_v_client'];
        $this->db->set('order_v_client', $order);
        $this->db->where('order_number', $id);
        $this->db->update('orders');
        $result = $this->db->affected_rows();
        return $result;
    }

    public function getVoucher()
    {
        $query = $this->db->select("v.*, c.cl_name")->from('vouchers as v')->join('client as c','c.cl_id = v.v_cl_id')->get();
        return $query->result();
    }

    public function getSearchVoucher($data)
    {
        $query = $this->db->select("v.*, c.cl_name")->from('vouchers as v')->join('client as c','c.cl_id = v.v_cl_id')->like('v.v_number', $data['v_number'])->like('v.v_desc', $data['v_desc'])->like('v.v_cl_id', $data['v_cl_id'])->like('v.v_date', $data['v_date'])->get();
        return $query->result();
    }

    public function getVoucherById($id)
    {
        $query = $this->db->where("v_cl_id =",$id)->get("vouchers");
        return $query->result();
    }

    public function getSingleVoucher($v_number){
        $query = $this->db->where("v_number =",$v_number)->get("vouchers");
        return $query->row();
    }

    public function getSingleVoucherDetail($v_number){
        // $where = "o.order_v_client = '" . $v_number . "'";
        $where = "o.order_v_client = '" . $v_number . "'";
        $this->db->select("o.order_number , o.order_client_id, c.cl_name, o.order_address, o.order_city, ci.city_name, o.order_borrower, o.order_status_id, s.st_name, o.order_revenue")->from('orders as o')->join('client as c','c.cl_id = o.order_client_id')->join('city as ci','ci.city_id = o.order_city','left')->join('status_info as s','s.st_id = o.order_status_id')->where($where);
        $query = $this->db->get();
        return $query->result();  
    }

    public function deleteVoucher($id){
        $this->db->where('v_number', $id);
        $this->db->delete('vouchers'); 
        return $this->db->affected_rows();
    }

    public function resetOrderClient($v_number){
        $this->db->set('order_v_client', "");
        $this->db->where('order_v_client', $v_number);
        $this->db->update('orders');
        $result = $this->db->affected_rows();
        return $result;
    }
   


    /* Apprasier */


    public function getAccAppraiser()
    {
        // $where = 'o.order_v_appraiser = "" OR o.order_v_appraiser is null ';
        $where = '(o.order_v_appraiser = "" OR o.order_v_appraiser is null) AND o.order_status_id in (14,15)';
        $this->db->select('o.order_appraiser_id, sum(o.order_expense) as total_owed, count(*) as total_orders,a.app_name')->from('orders as o')->join('appraiser as a','a.app_id = o.order_appraiser_id')->where($where)->order_by('o.order_appraiser_id', 'ASC')->group_by('o.order_appraiser_id');
        $query = $this->db->get();
        return $query->result();  
    }

    public function getAccAppById($id){
        $where = '(o.order_v_appraiser = "" OR o.order_v_appraiser is null) AND o.order_status_id in (14,15) AND o.order_appraiser_id = ' . $id ;
        //$this->db->select('o.order_number, o.order_revenue, o.order_expense, o.order_address, o.order_city, ci.city_name, o.order_borrower, o.order_appraiser_id, a.app_name, o.order_v_client, o.order_client_id, c.cl_name')->from('orders as o')->join('client as c','c.cl_id = o.order_client_id')->join('city as ci','ci.city_id = o.order_city')->join('appraiser as a','a.app_id = o.order_appraiser_id')->where($where);


        $this->db->select('o.order_number, o.order_revenue, o.order_expense, o.order_address, o.order_city, o.order_borrower, o.order_appraiser_id, o.order_v_client, o.order_client_id, a.app_name, c.cl_name , ci.city_name')->from('orders as o')->join('client as c','c.cl_id = o.order_client_id')->join('city as ci','ci.city_id = o.order_city')->join('appraiser as a','a.app_id = o.order_appraiser_id')->where($where);


        $query = $this->db->get();
        return $query->result();  
    }


    public function getVoucherAppById($id)
    {
        $query = $this->db->where("v_app_id =",$id)->get("vouchers");
        return $query->result();
    }


    public function createAccApp($data)
    {
       $this->db->insert("vouchers", $data);
       $result = $this->db->insert_id();
       return $result;
    } 

    public function updateAccApp($data){
        $id = $data['order_number'];
        $order = $data['order_v_appraiser'];
        $this->db->set('order_v_appraiser', $order);
        $this->db->where('order_number', $id);
        $this->db->update('orders');
        $result = $this->db->affected_rows();
        return $result;
    }

    public function getVoucherApp()
    {
        $query = $this->db->select("v.*, a.app_name")->from('vouchers as v')->join('appraiser as a','a.app_id = v.v_app_id')->get();
        return $query->result();
    }

    public function getSearchVoucherApp($data)
    {
        $query = $this->db->select("v.*, a.app_name")->from('vouchers as v')->join('appraiser as a','a.app_id = v.v_app_id')->like('v.v_number', $data['v_number'])->like('v.v_desc', $data['v_desc'])->like('v.v_app_id', $data['v_app_id'])->like('v.v_date', $data['v_date'])->get();
        return $query->result();
    }

    
    // public function getSingleVoucher($v_number){
    //     $query = $this->db->where("v_number =",$v_number)->get("vouchers");
    //     return $query->row();
    // }

    public function getSingleVoucherAppDetail($v_number){
        $where = "o.order_v_appraiser = '" . $v_number . "'";
        $this->db->select("o.order_number , o.order_client_id,  o.order_address, o.order_city,  o.order_borrower, o.order_status_id, o.order_expense, c.cl_name, ci.city_name, s.st_name")->from('orders as o')->join('client as c','c.cl_id = o.order_client_id')->join('city as ci','ci.city_id = o.order_city')->join('status_info as s','s.st_id = o.order_status_id')->where($where);
        $query = $this->db->get();
        return $query->result();  
    }

    // public function deleteVoucher($id){
    //     $this->db->where('v_number', $id);
    //     $this->db->delete('vouchers'); 
    //     return $this->db->affected_rows();
    // }

    public function resetOrderApp($v_number){
        $this->db->set('order_v_appraiser', "");
        $this->db->where('order_v_appraiser', $v_number);
        $this->db->update('orders');
        $result = $this->db->affected_rows();
        return $result;
    }
    

    

   

    

}

?>
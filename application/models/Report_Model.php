
<?php 

class Report_Model extends CI_Model {

    // !!--------------- General Functions --------------!!

    public function accountingStatement($id){

        
        $where = '(o.order_v_client = "" OR o.order_v_client is null) AND o.order_client_id = ' . $id;
        $this->db->select('o.order_number, o.order_date, o.order_duedate, o.order_address, o.order_zipcode, o.order_city, ci.city_name, o.order_borrower,  o.order_revenue, o.order_appraiser_id, a.app_name')->from('orders as o')->join('client as c','c.cl_id = o.order_client_id')->join('city as ci','ci.city_id = o.order_city')->join('appraiser as a','a.app_id = o.order_appraiser_id')->where($where);
        $query = $this->db->get();
        return $query->result(); 
        // $query = $this->db->where("cl_id =",$id)->get('client');
        // return $query->result();
    }

    // public function 

    public function singleInvoice($id){


        // $where = 'o.order_number = ' . $id;
        $this->db->select('o.order_number, o.order_address, o.order_borrower, o.order_assignment_id, ass.at_name , o.order_type_id, ot.order_name , o.order_paymentmethod,o.order_appointmentdate, o.order_appointment_time , o.order_completedate, o.order_status_id, st.st_name, o.order_v_client, o.order_city, c.cl_name, c.cl_address,c.cl_city,c.cl_zipcode, ci.city_name,  o.order_revenue, o.order_appraiser_id, a.app_name')->from('orders as o')->join('assignment_types as ass','ass.at_id = o.order_assignment_id')->join('order_types as ot','ot.order_id = o.order_type_id')->join('status_info as st','st.st_id = o.order_status_id')->join('client as c','c.cl_id = o.order_client_id')->join('city as ci','ci.city_id = c.cl_city')->join('appraiser as a','a.app_id = o.order_appraiser_id')->where('o.order_number', $id);
        $query = $this->db->get();
        return $query->result();


        // $query = $this->db->where("order_number =",$id)->get('orders');
        // return $query->result();
    }

    public function pipelineByPaymentMethod(){
        // ord.order_v_client = '' OR  ord.order_v_client is null
        $query = $this->db->query("SELECT order_paymentmethod, COUNT(*) as files, SUM(order_revenue) as amount from `orders`  where order_status_id NOT IN (10,15,16) GROUP BY order_paymentmethod");
        return $query->result();        
    }

    public function pipelineByStatus(){
        // ord.order_v_client = '' OR  ord.order_v_client is null
        $query = $this->db->query("SELECT st.st_id, st.st_name, COUNT(*) as files, SUM(ord.order_revenue) as amount from `orders` ord LEFT JOIN `status_info` st on ord.order_status_id = st.st_id where ord.order_status_id NOT IN (10,15,16) GROUP BY ord.order_status_id");
        return $query->result();        
    }

    public function pipelineByCODStatus(){
        // ord.order_v_client = '' OR  ord.order_v_client is null
        $query = $this->db->query("SELECT st.st_id, st.st_name, COUNT(*) as files, SUM(ord.order_revenue) as amount from `orders` ord LEFT JOIN `status_info` st on ord.order_status_id = st.st_id where ord.order_status_id IN (10,15,16) GROUP BY ord.order_status_id");
        return $query->result();        
    }

    

    public function pipelineByAppraiser(){

        $query = $this->db->query("SELECT app.app_id, app.app_name, COUNT(*) as files, SUM(ord.order_revenue) as amount from `orders` ord LEFT JOIN `appraiser` app on ord.order_appraiser_id = app.app_id where ord.order_status_id NOT IN (10,15,16) GROUP BY ord.order_appraiser_id");
        return $query->result();        
    }

    public function pipelineByClient(){

        $query = $this->db->query("SELECT cl.cl_id, cl.cl_name, COUNT(*) as files, SUM(ord.order_revenue) as amount from `orders` ord LEFT JOIN `client` cl on ord.order_client_id = cl.cl_id where ord.order_status_id NOT IN (10,15,16) GROUP BY ord.order_client_id");
        return $query->result();        
    }

    public function legacyByOffice(){
        $query = $this->db->query("SELECT SUM(ord.order_revenue) as revenue, SUM(ord.order_expense) as expense, ord.order_date, COUNT(ord.order_date) as total from `orders` ord where ord.order_status_id !=16 GROUP BY ord.order_date ORDER BY ord.order_date DESC" );
        return $query->result(); 
    }

    public function legacyByOfficeByWeek(){        
        // YEARWEEK(ord.order_date) as week
        $query = $this->db->query("SELECT SUM(ord.order_revenue) as revenue, SUM(ord.order_expense) as expense,str_to_date(concat(yearweek(ord.order_date,2),'1'), '%X%V%w') as order_date,  COUNT(ord.order_date) as total from `orders` ord where ord.order_status_id !=16 GROUP BY YEARWEEK(ord.order_date) ORDER BY YEARWEEK(ord.order_date) DESC");
        return $query->result(); 
    }


    public function legacyByOfficeByMonth(){        
        // YEARWEEK(ord.order_date) as week
        $query = $this->db->query("SELECT SUM(ord.order_revenue) as revenue, SUM(ord.order_expense) as expense,ord.order_date as order_date,  COUNT(ord.order_date) as total from `orders` ord where ord.order_status_id !=16 GROUP BY YEAR(ord.order_date), month(ord.order_date) ORDER BY YEAR(ord.order_date) DESC, month(ord.order_date) DESC");
        return $query->result(); 
    }

    public function legacyByOfficeByQuarter(){        
        $query = $this->db->query("SELECT SUM(ord.order_revenue) as revenue, SUM(ord.order_expense) as expense,ord.order_date as order_date,  COUNT(ord.order_date) as total from `orders` ord where ord.order_status_id !=16 GROUP BY YEAR(ord.order_date), quarter(ord.order_date) ORDER BY YEAR(ord.order_date) DESC, quarter(ord.order_date) DESC");
        return $query->result(); 
    }

    public function legacyByOfficeByYear(){        
        $query = $this->db->query("SELECT SUM(ord.order_revenue) as revenue, SUM(ord.order_expense) as expense,ord.order_date as order_date,  COUNT(ord.order_date) as total from `orders` ord where ord.order_status_id !=16 GROUP BY YEAR(ord.order_date) ORDER BY YEAR(ord.order_date) DESC");
        return $query->result(); 
    }

    public function legacyByApp($id){
        $query = $this->db->query("SELECT SUM(ord.order_revenue) as revenue, SUM(ord.order_expense) as expense, ord.order_date, COUNT(ord.order_date) as total from `orders` ord where ord.order_appraiser_id = '$id' GROUP BY ord.order_date ORDER BY ord.order_date DESC");
        return $query->result(); 
    }

    public function legacyByAppByWeek($id){        
        // YEARWEEK(ord.order_date) as week
        $query = $this->db->query("SELECT SUM(ord.order_revenue) as revenue, SUM(ord.order_expense) as expense,str_to_date(concat(yearweek(ord.order_date,2),'1'), '%X%V%w') as order_date,  COUNT(ord.order_date) as total from `orders` ord where ord.order_status_id !=16 AND ord.order_appraiser_id = '$id' GROUP BY YEARWEEK(ord.order_date) ORDER BY YEARWEEK(ord.order_date) DESC");
        return $query->result(); 
    }


    public function legacyByAppByMonth($id){        
        // YEARWEEK(ord.order_date) as week
        $query = $this->db->query("SELECT SUM(ord.order_revenue) as revenue, SUM(ord.order_expense) as expense,ord.order_date as order_date,  COUNT(ord.order_date) as total from `orders` ord where ord.order_status_id !=16  AND ord.order_appraiser_id = '$id' GROUP BY YEAR(ord.order_date), month(ord.order_date) ORDER BY YEAR(ord.order_date) DESC, month(ord.order_date) DESC");
        return $query->result(); 
    }

    public function legacyByAppByQuarter($id){        
        $query = $this->db->query("SELECT SUM(ord.order_revenue) as revenue, SUM(ord.order_expense) as expense,ord.order_date as order_date,  COUNT(ord.order_date) as total from `orders` ord where ord.order_status_id !=16 AND ord.order_appraiser_id = '$id'  GROUP BY YEAR(ord.order_date), quarter(ord.order_date) ORDER BY YEAR(ord.order_date) DESC, quarter(ord.order_date) DESC");
        return $query->result(); 
    }

    public function legacyByAppByYear($id){        
        $query = $this->db->query("SELECT SUM(ord.order_revenue) as revenue, SUM(ord.order_expense) as expense,ord.order_date as order_date,  COUNT(ord.order_date) as total from `orders` ord where ord.order_status_id !=16 AND ord.order_appraiser_id = '$id'  GROUP BY YEAR(ord.order_date) ORDER BY YEAR(ord.order_date) DESC");
        return $query->result(); 
    }



    public function legacyByClient($id){
        $query = $this->db->query("SELECT SUM(ord.order_revenue) as revenue, SUM(ord.order_expense) as expense, ord.order_date, COUNT(ord.order_date) as total from `orders` ord where ord.order_client_id = '$id' GROUP BY ord.order_date ORDER BY ord.order_date DESC");
        return $query->result(); 
    }

    public function legacyByClientByWeek($id){        
        // YEARWEEK(ord.order_date) as week
        $query = $this->db->query("SELECT SUM(ord.order_revenue) as revenue, SUM(ord.order_expense) as expense,str_to_date(concat(yearweek(ord.order_date,2),'1'), '%X%V%w') as order_date,  COUNT(ord.order_date) as total from `orders` ord where ord.order_status_id !=16 AND ord.order_client_id = '$id' GROUP BY YEARWEEK(ord.order_date) ORDER BY YEARWEEK(ord.order_date) DESC");
        return $query->result(); 
    }


    public function legacyByClientByMonth($id){        
        // YEARWEEK(ord.order_date) as week
        $query = $this->db->query("SELECT SUM(ord.order_revenue) as revenue, SUM(ord.order_expense) as expense,ord.order_date as order_date,  COUNT(ord.order_date) as total from `orders` ord where ord.order_status_id !=16  AND ord.order_client_id = '$id' GROUP BY YEAR(ord.order_date), month(ord.order_date) ORDER BY YEAR(ord.order_date) DESC, month(ord.order_date) DESC");
        return $query->result(); 
    }

    public function legacyByClientByQuarter($id){        
        $query = $this->db->query("SELECT SUM(ord.order_revenue) as revenue, SUM(ord.order_expense) as expense,ord.order_date as order_date,  COUNT(ord.order_date) as total from `orders` ord where ord.order_status_id !=16 AND ord.order_client_id = '$id'  GROUP BY YEAR(ord.order_date), quarter(ord.order_date) ORDER BY YEAR(ord.order_date) DESC, quarter(ord.order_date) DESC");
        return $query->result(); 
    }

    public function legacyByClientByYear($id){        
        $query = $this->db->query("SELECT SUM(ord.order_revenue) as revenue, SUM(ord.order_expense) as expense,ord.order_date as order_date,  COUNT(ord.order_date) as total from `orders` ord where ord.order_status_id !=16 AND ord.order_client_id = '$id'  GROUP BY YEAR(ord.order_date) ORDER BY YEAR(ord.order_date) DESC");
        return $query->result(); 
    }
    


    public function get()
    {
        $query = $this->db->get('client');
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
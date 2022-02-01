<?php 

class Users_Model extends CI_Model {

    // !!--------------- General Functions --------------!!
    public function get()
    {
            $query = $this->db->get('users');
            return $query->result();
    }

    public function getById($id)
    {
        $query = $this->db->where("user_id =",$id)->get("users");
        return $query->row();
    }









    // !!--------------- Util Functions --------------!!
    public function login($data)
    {
        $query = $this->db->where("user_username=",$data['user_username'])->get("users");
        if($query->num_rows() > 0) {

            // var_dump($query->row());
            $user = $query->result_array()[0];
            // if( password_verify($data['user_pass'], $user['user_pass']) ) {
            if( $data['user_pass'] == $user['user_pass'] ) {
                
                return $user;

            } else {

                return "Wrong Password";

            }

        } else {

            return "No User Found";

        }
    }

    public function updateLogin($data)
    {
        // $id = $data['notes_id'];
        $this->db->where('user_id ', $data['user_id']);
        $this->db->update('users', $data);
        $result = $this->db->affected_rows();
        return $result;
    }

    

}

?>
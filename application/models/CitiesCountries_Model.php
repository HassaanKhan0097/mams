<?php 

class CitiesCountries_Model extends CI_Model {

    // !!--------------- General Functions --------------!!
    public function getCountry()
    {
        $query = $this->db->get('country');
        return $query->result();
    }

    public function getById($id)
    {
        $query = $this->db->where("country_id =",$id)->get("country");
        return $query->row();
    }

    public function createCountry($data)
    {
       $this->db->insert("country", $data);
       $result = $this->db->insert_id();
       return $result;
    } 

    public function updateCountry($data)
    {
        $id = $data['country_id'];
        $this->db->where('country_id', $id);
        $this->db->update('country', $data);
        $result = $this->db->affected_rows();
        return $result;
    }

    public function deleteCountry($data)
    {
        $id = $data['country_id'];
        $this->db->where('country_id', $id);
        $this->db->delete('country'); 
        return $this->db->affected_rows();
    }

    public function getCity()
    {
        $this->db->select('city_id,city_country_id,country_name,city_name');
        $this->db->from('city');
        $this->db->join('country','country.country_id = city.city_country_id');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function createCity($data)
    {
       $this->db->insert("city", $data);
       $result = $this->db->insert_id();
       return $result;
    } 

    public function updateCity($data)
    {
        $id = $data['city_id'];
        $this->db->where('city_id', $id);
        $this->db->update('city', $data);
        $result = $this->db->affected_rows();
        return $result;
    }

    public function deleteCity($data)
    {
        $id = $data['city_id'];
        $this->db->where('city_id', $id);
        $this->db->delete('city'); 
        return $this->db->affected_rows();
    }

    

}

?>
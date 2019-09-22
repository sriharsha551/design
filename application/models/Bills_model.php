<?php

class Bills_model extends CI_Model
{
    function __consruct()
    {
        parent::__construct();
    }

    function get_all_bills_count()
    {
        $this->db->from('act_bills');
        $this->db->where(array('delete_status'=>'0'));
        return $this->db->count_all_results();
    }
    
    function get_all_bills()
    {
        $this->db->from('act_bills');
        $this->db->where(array('delete_status'=>'0'));
        return $this->db->get()->result_array();
    }

    function get_sup()
    {
        $this->db->from('suppliers');
        $this->db->select('id,name,email_id,address,contact_no_1');
        return $this->db->get()->result();
    }

    function get_bills($id)
    {
        return $this->db->get_where('act_bills',array('id'=>$id,"delete_status"=>'0'))->row_array();
    }

    function add_bill($params)
    {
        $params['created_at'] = date("Y-m-d H:i:s");

        $this->db->insert('act_bills',$params);
        return $this->db->insert_id();
    }

    function update_bills($id,$params)
    {
        $params['updated_at'] = date("Y-m-d H:i:s");
        $this->db->where('id',$id);
        return $this->db->update('act_bills',$params);
    }

    function delete_bills($id)
    {
        $params['deleted_at'] = date("Y-m-d H:i:s");
        $this->db->set(array('delete_status'=>'1'));
        $this->db->where('id',$id);
        return $this->db->update('act_bills');

    }
}
?>
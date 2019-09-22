<?php

class Invoice_model extends CI_Model
{
    function __consruct()
    {
        parent::__construct();
    }

    function get_all_invoice_count()
    {
        $this->db->from('act_invoices');
        $this->db->where(array('lock_st'=>'0'));
        return $this->db->count_all_results();
    }
    
    function get_all_Invoice()
    {
        $this->db->from('act_invoices');
        $this->db->where(array('lock_st'=>'0'));
        return $this->db->get()->result_array();
    }

    function get_cut()
    {
        $this->db->from('suppliers');
        $this->db->select('id,name,email_id,address,contact_no_1');
        return $this->db->get()->result();
    }

    function get_invoice($id)
    {
        return $this->db->get_where('act_invoices',array('id'=>$id,"lock_st"=>'0'))->row_array();
    }

    function add_invoice($params)
    {
        $params['created_at'] = date("Y-m-d H:i:s");

        $this->db->insert('act_invoices',$params);
        return $this->db->insert_id();
    }

    function update($id,$params)
    {
        $params['updated_at'] = date("Y-m-d H:i:s");
        $this->db->where('id',$id);
        return $this->db->update('act_invoices',$params);
    }

    function delete($id)
    {
        $params['deleted_at'] = date("Y-m-d H:i:s");
        $this->db->set(array('lock_st'=>'1'));
        $this->db->where('id',$id);
        return $this->db->update('act_invoices');

    }
}
?>

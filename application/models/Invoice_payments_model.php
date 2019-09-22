<?php

class Invoice_payments_model extends CI_Model
{
    function __consruct()
    {
        parent::__construct();
    }

    function get_all_invoice_count()
    {
        $this->db->from('act_inv_payment');
        $this->db->where(array('delete_status'=>'0'));
        return $this->db->count_all_results();
    }
    
    function get_all_invoice()
    {
        $this->db->from('act_inv_payment');
        $this->db->where(array('delete_status'=>'0'));
        return $this->db->get()->result_array();
    }

    function get_invoice($id)
    {
        return $this->db->get_where('act_inv_payment',array('id'=>$id,"delete_status"=>'0'))->row_array();
    }

    function get_inv_ids()
    {
        $this->db->select('id');
        $this->db->from('act_invoices');
        return $this->db->get()->result();
    }

    function get_coa_ids()
    {
        $this->db->select('id');
        $this->db->from('act_coa');
        return $this->db->get()->result();
    }

    function add_invoice($params)
    {
        $params['created_at'] = date("Y-m-d H:i:s");

        $this->db->insert('act_inv_payment',$params);
        return $this->db->insert_id();
    }

    function add_transaction($params)
    {
        $data = array(
            'date_transaction' => $params['paid_dt'],
            'coa_id' => $params['coa_id'],
            'inv_id' => $params['inv_id'],
            'cr_amt' => $params['amount'],
            'remarks' => $params['remarks'],

            'created_at' => date("Y-m-d H:i:s")
    );
        
        $this->db->insert('act_transaction',$data);
    }

    function update_invoice($id,$params)
    {
        $params['updated_at'] = date("Y-m-d H:i:s");
        $this->db->where('id',$id);
        return $this->db->update('act_inv_payment',$params);
    }

    function delete_invoice($id)
    {
        $params['deleted_at'] = date("Y-m-d H:i:s");
        $this->db->set(array('delete_status'=>'1'));
        $this->db->where('id',$id);
        return $this->db->update('act_inv_payment');

    }
}
?>
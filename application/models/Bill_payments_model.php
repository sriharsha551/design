<?php

class Bill_payments_model extends CI_Model
{
    function __consruct()
    {
        parent::__construct();
    }

    function get_all_bill_pay_count()
    {
        $this->db->from('act_bill_payment');
        $this->db->where(array('delete_status'=>'0'));
        return $this->db->count_all_results();
    }
    
    function get_all_bill_pay()
    {
        $this->db->from('act_bill_payment');
        $this->db->where(array('delete_status'=>'0'));
        return $this->db->get()->result_array();
    }

    function get_bill_pay($id)
    {
        return $this->db->get_where('act_bill_payment',array('id'=>$id,"delete_status"=>'0'))->row_array();
    }

    function get_bill_ids()
    {
        $this->db->select('id');
        $this->db->from('act_bills');
        return $this->db->get()->result();
    }

    function get_coa_ids()
    {
        $this->db->select('id');
        $this->db->from('act_coa');
        return $this->db->get()->result();
    }

    function add_bill_pay($params)
    {
        $params['created_at'] = date("Y-m-d H:i:s");

        $this->db->insert('act_bill_payment',$params);
        return $this->db->insert_id();
    }

    function add_transaction($params)
    {
        $data = array(
            'date_transaction' => $params['paid_dt'],
            'coa_id' => $params['coa_id'],
            'bill_id' => $params['bill_id'],
            'db_amt' => $params['amount'],
            'remarks' => $params['remarks'],

            'created_at' => date("Y-m-d H:i:s")
    );
        
        $this->db->insert('act_transaction',$data);
    }


    function update_bill_pay($id,$params)
    {
        $params['updated_at'] = date("Y-m-d H:i:s");
        $this->db->where('id',$id);
        return $this->db->update('act_bill_payment',$params);
    }

    function delete_bill_pay($id)
    {
        $params['deleted_at'] = date("Y-m-d H:i:s");
        $this->db->set(array('delete_status'=>'1'));
        $this->db->where('id',$id);
        return $this->db->update('act_bill_payment');

    }
}
?>
<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class  Invoice_items_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_all_invoice_items($params = array())
    {
        $this->db->order_by('t1.id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->where('t1.lock_st', '0');
        $this->db->select('t1.id,t1.item_name,t1.price,t1.quality');    
        $this->db->from('act_inv_items as t1');
        $query = $this->db->get();
        return $query->result_array();
    }

function add_invoice_items($params)
{
    $params['created_at'] = date('Y-m-d H:i:s');
    $this->db->insert('act_inv_items',$params);
    return $this->db->insert_id();
}
function get_invoice_items($id)
{
    return $this->db->get_where('act_inv_items',array('id'=>$id))->row_array();
}
function update_invoice_items($id,$params)
{
    $params['updated_at'] = date('Y-m-d H:i:s');
    $this->db->where('id',$id);
    return $this->db->update('act_inv_items',$params);
}
function delete($id)
    {
        $this->db->where('id',$id);
        return $this->db->update('act_inv_items',array('deleted_at'=> date('Y-m-d H:i:s'), 'lock_st' => '1'));

    }
}
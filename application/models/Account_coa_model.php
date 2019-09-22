<?php

class Account_coa_model extends CI_Model
{
    function __construct()
    {
        parent :: __construct();
    }

    function get_act_coa_count() 
    {
        $this->db->where('deleted_at', null);
        $this->db->from('act_coa');
        return $this->db->count_all_results();
    }

    function get_cat_list()
    {
        $this->db->where('deleted_at', null);
        $this->db->select('id, name');
        $query = $this->db->get('act_coa_category');
        return $query->result_array();
    }

    function get_all_act_coa($params = array())
    {
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->select('t1.id ,t2.name as cat_name, t1.name, t1.enabled');    
        $this->db->from('act_coa as t1');
        $this->db->join('act_coa_category as t2', 't1.coa_cat_id = t2.id');
        $this->db->where('t1.deleted_at', null);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_act_coa_detail($id)
    {
        $this->db->where(array('t1.id' => $id, 't1.deleted_at' => null));
        $this->db->select('t1.id ,t2.name as cat_name, t1.name, t1.enabled, t1.coa_cat_id');    
        $this->db->from('act_coa as t1');
        $this->db->join('act_coa_category as t2', 't1.coa_cat_id = t2.id');
        $query = $this->db->get('act_coa');
        return $query->row_array();
    }

    function add_act_coa($params)
    {
        $params['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('act_coa',$params);
        return $this->db->insert_id();
    }

    function edit_act_coa($id,$params)
    {
        $params['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id',$id);
        return $this->db->update('act_coa',$params);
    }

    function delete_act_coa($id)
    {
        $params['deleted_at'] = date('Y-m-d H:i:s');
        return $this->db->update('act_coa',$params);
    } 
}

?>
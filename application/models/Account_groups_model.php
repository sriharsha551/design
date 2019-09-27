<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Account_groups_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get Account_groups by id
     */
    function get_Account_groups($id)
    {
        return $this->db->get_where('act_groups',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all Account_groups count
     */
    function get_all_Account_groups_count()
    {
        $this->db->where('deleted_at',null);
        $this->db->from('act_groups');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all Account_groups
     */
    function get_all_Account_groups($params = array())
    {
        $this->db->where('deleted_at',null);
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('act_groups')->result_array();
    }
        
    /*
     * function to add new Account_groups
     */
    function add_Account_groups($params)
    {
        $this->db->insert('act_groups',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update Account_groups
     */
    function update_Account_groups($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('act_groups',$params);
    }

    function get_safe_delete($id) 
    {
        $this->db->where(array('deleted_at' => null, 'group_id' => $id));
        $query = $this->db->from('act_types');
        if($this->db->count_all_results() > 0)
            return FALSE;
        else
            return TRUE;
    }
    
    /*
     * function to delete Account_groups
     */
    function delete_Account_groups($id)
    {
        $this->db->where('id',$id);
        $params['deleted_at'] = date('Y-m-d H:i:s');
        return $this->db->update('act_groups',$params);
    }
}

<?php

class Design_ddrawings_model extends CI_Model {
    public function __construct() {
        parent :: __construct();
    }

    function get_design_ddrawings($id)
    {
        return $this->db->get_where('prj_dsg_ddrawings',array('id'=>$id))->row_array();
    }

    function get_all_project_list() {
        $this->db->select('id, name');
        $this->db->from('prj_list');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_design_stage() {
        $this->db->select('id, design_stage' );
        $this->db->from('prj_dsg_stage');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_review_status() {
        $this->db->select('id, review_status_name');
        $this->db->from('prj_review_status');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function get_all_design_ddrawings_count()
    {
        $this->db->from('prj_dsg_ddrawings');
        return $this->db->count_all_results();
    }

    function get_all_design_ddrawings($params = array())
    {
        $this->db->order_by('t1.id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->where('t1.delete_status', '0');
        $this->db->select('t1.name as dsg_ddrawing_name, t2.name as proj_name, t1.id, t3.design_stage, t1.attach_name, t1.percentage, t1.review_status, t1.revisions, t1.remarks, t4.review_status_name');    
        $this->db->from('prj_dsg_ddrawings as t1');
        $this->db->join('prj_list as t2', 't1.prj_id = t2.id');
        $this->db->join('prj_dsg_stage as t3', 't1.design_stage_id = t3.id');
        $this->db->join('prj_review_status as t4', 't1.review_status = t4.id');
        $query = $this->db->get();
        return $query->result_array();
    }
        
    /*
     * function to add new Design Detailed Drawing
     */
    function add_design_ddrawings($params)
    {
        $params['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert('prj_dsg_ddrawings',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update Design Detailed Drawing
     */
    function update_design_ddrawings($id,$params)
    {
        $params['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id',$id);
        return $this->db->update('prj_dsg_ddrawings',$params);
    }
    
    /*
     * function to delete design Detailed Drawing
     */
    function delete_design_ddrawings($id)
    {
        $this->db->where('id',$id);
        return $this->db->update('prj_dsg_ddrawings',array('deleted_at'=> date('Y-m-d H:i:s'), 'delete_status' => '1'));
    }
}

?>
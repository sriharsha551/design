<?php

class Prj_dsg_concept_model extends CI_Model
{
    function __consruct()
    {
        parent::__construct();
    }

    function get_prj_names()
    {
        $this->db->select('id,name');
        $this->db->from('prj_list');
        return $this->db->get()->result();
    }

    function get_dsg_names()
    {
        $this->db->select('id,design_stage');
        $this->db->from('prj_dsg_stage');
        return $this->db->get()->result();
    }

    function get_all_concepts($params = array())
    {
        $this->db->order_by('prj_dsg_concept.id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->select('prj_dsg_concept.*,prj_list.name as prj_name,prj_dsg_stage.design_stage as design_stage');
        $this->db->join('prj_list', 'prj_list.id = prj_dsg_concept.prj_id', 'inner');
        $this->db->join('prj_dsg_stage','prj_dsg_stage.id=prj_dsg_concept.design_stage_id','inner');
        return $this->db->get_where('Prj_dsg_concept',array('prj_dsg_concept.delete_status'=>'0'))->result_array();
    }

    function get_all_concepts_count()
    {
        $this->db->from('prj_dsg_concept');
        $this->db->where(array('delete_status'=>'0'));
        return $this->db->count_all_results();
    }

    function get_concept($id)
    {
        return $this->db->get_where('prj_dsg_concept',array('id'=>$id,"delete_status"=>'0'))->row_array();
    }

    function add_concept($params)
    {
        $params['created_at'] =  $timestamp =date("Y-m-d H:i:s");
        $this->db->insert('prj_dsg_concept',$params);
        return $this->db->insert_id();
    }

    function update_concept($id,$params)
    {
        $params['updated_at'] = date("Y-m-d H:i:s");
        $this->db->where('id',$id);
        return $this->db->update('prj_dsg_concept',$params);
    }

    function delete_concept($id)
    {
        $params['deleted_at'] =  $timestamp =date("Y-m-d H:i:s");
        $this->db->set(array('delete_status'=>'1'));
        $this->db->where('id',$id);
        return $this->db->update('prj_dsg_concept');

    }
}
?>
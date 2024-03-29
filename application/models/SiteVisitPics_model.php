<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class SiteVisitPics_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get SiteVisitPics by id
     */
    function get_SiteVisitPics($id)
    {
        return $this->db->get_where('prj_site_pics',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all SiteVisitPics count
     */
    function get_all_SiteVisitPics_count()
    {
        $this->db->from('prj_site_pics');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all SiteVisitPics
     */
    function get_all_SiteVisitPics($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        $this->db->where('t1.delete_status', '0');
        $this->db->select('t1.id as id, t2.id as prj_id, t2.name as project_name, t1.name, t1.remarks');    
        $this->db->from('prj_site_pics as t1');
        $this->db->join('prj_list as t2', 't1.project_id = t2.id');
        return($this->db->get()->result_array());
    }
        
    /*
     * function to add new SiteVisitPics
     */
    function add_SiteVisitPics($params)
    {
        $this->db->insert('prj_site_pics',$params);
        return $this->db->insert_id();
    }
    public function select()  
      {  
		$this->db->select("id,name");
		$this->db->from('prj_list'); 
        $query = $this->db->get();
		return $query->result();
	  }  
      function get_name($id){
          
        $this->db->where('id',$id);
        $this->db->select('name');
        $this->db->from('prj_list');
        $query= $this->db->get();

         return (get_object_vars($query->result()[0])['name']);
    } 
    
    /*
     * function to update SiteVisitPics
     */
    function update_SiteVisitPics($id,$params)
    { 
        print_r($params);
        $this->db->where('id',$id);
        return($this->db->update('prj_site_pics',$params));
    }
    function update_SiteVisitPic($id,$params)
    { 
        $this->db->set('remarks',$params['remarks']);
        $this->db->where('id',$id);
        return($this->db->update('prj_site_pics',$params));
    }
    
    /*
     * function to delete SiteVisitPics
     */
    function delete_SiteVisitPics($id)
    {
        $this->db->where('id',$id);
        return $this->db->update('prj_site_pics',array('delete_status' => '1'));
    }
}

<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class SiteVisitPics extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('SiteVisitPics_model');
         /* Title Page :: Common */
         $this->page_title->push('SiteVisitPics');
         $this->data['pagetitle'] = $this->page_title->show();
 
         /* Breadcrumbs :: Common */
         $this->breadcrumbs->unshift(1, 'SiteVisitPics', 'SiteVisitPics');
    } 

    /*
     * Listing of SiteVisitPics
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('SiteVisitPics/index?');
        $config['total_rows'] = $this->SiteVisitPics_model->get_all_SiteVisitPics_count();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['sitevisitPics'] = $this->SiteVisitPics_model->get_all_SiteVisitPics($params);
        
        $this->template->public_render('SiteVisitPics/index', $this->data);

   
    }

    /*
     * Adding a new SiteVisitPics
     */
    function add()
    {   
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');

        // $this->form_validation->set_rules('files','files',count($_FILES['files']['name'])!=0);
        $query = $this->SiteVisitPics_model->select(); 
         $this->data['PROJECTS'] = null;
         if($query){
          $this->data['PROJECTS'] =  $query;
         }
         
         if (empty($_FILES['attach_name']['name']))
        {
            $this->form_validation->set_rules('attach_name', 'Document', 'required');
        }
        $config = array(
            'upload_path' => "./upload/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "5000",
            'max_width' => "5000"
        );
        $this->load->library('upload', $config);
		if(!empty($_FILES['attach_name']['name']) && $this->upload->do_upload('attach_name'))     
        {   
            $data = $this->input->post();
            $data['name'] = $this->upload->data()['file_name'];
            $Design_layout_id = $this->SiteVisitPics_model->add_SiteVisitPics($data);
            redirect('SiteVisitPics/index');
        }
        else
        {   
            if($this->form_validation->run())
               print_r(' ');
            
            $error = array('error' => $this->upload->display_errors());
            $this->template->public_render('SiteVisitPics/add', $this->data);      
           
        }
    }  

    /*
     * Editing a SiteVisitPics
     */
    function edit($id)
    {
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');
        $this->data['sitevisitPics'] = $this->SiteVisitPics_model->get_SiteVisitPics($id);
        $this->data['sitevisitPics']['project_name'] = $this->SiteVisitPics_model->get_name($this->data['sitevisitPics']['project_id']);
        // $this->form_validation->set_rules('files','files',count($_FILES['files']['name'])!=0);
        $query = $this->SiteVisitPics_model->select(); 
         $this->data['PROJECTS'] = null;
         if($query){
          $this->data['PROJECTS'] =  $query;
         }
         
         if (empty($_FILES['attach_name']['name']))
        {
            $this->form_validation->set_rules('attach_name', 'Document', 'required');
        }
        $config = array(
            'upload_path' => "./upload/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "5000",
            'max_width' => "5000"
        );
        $this->load->library('upload', $config);
		if(!empty($_FILES['attach_name']['name'])&&$this->upload->do_upload('attach_name'))     
        {   
            $data = $this->input->post();
            // print_r($data);
            $data['name'] = $this->upload->data()['file_name'];
            $Design_layout_id = $this->SiteVisitPics_model->update_SiteVisitPics($id,$data);
            redirect('SiteVisitPics/index');
        }
        else
        {   
           
            
            $error = array('error' => $this->upload->display_errors());
            $this->template->public_render('SiteVisitPics/edit', $this->data);      
           
        }
    }

    function image_view($id) {

        $this->breadcrumbs->unshift(2, 'Image View', 'image view');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['SiteVisitPics'] = $this->SiteVisitPics_model->get_SiteVisitPics($id);
        $this->data['imagepath'] = "upload/".$this->data['SiteVisitPics']['name'];
        $this->data['id'] = $id;
        $this->template->public_render('SiteVisitPics/image_view', $this->data);

    }
    /*
     * Deleting SiteVisitPics
     */
    function remove($id)
    {
        $SiteVisitPics = $this->SiteVisitPics_model->get_SiteVisitPics($id);

        // check if the SiteVisitPics exists before trying to delete it
        if(isset($SiteVisitPics['id']))
        {
            $this->SiteVisitPics_model->delete_SiteVisitPics($id);
            redirect('SiteVisitPics/index');
        }
        else
            show_error('The SiteVisitPics you are trying to delete does not exist.');
    }
    function update_remarks($id) {
        $this->SiteVisitPics_model->update_SiteVisitPic($id,$this->input->post());            
        redirect('SiteVisitPics/index');

    }
    
}

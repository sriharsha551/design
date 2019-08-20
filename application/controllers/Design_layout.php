<?php

class Design_layout extends Admin_Controller {

     function __construct() {
        parent :: __construct();

        $this->load->model('Design_layout_model');
        /* Title Page :: Common */
        $this->page_title->push('Design Layout');
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, 'Design Layout', 'Design_layout');        
    }

    public function index() {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Design_layout/index?');
        $config['total_rows'] = $this->Design_layout_model->get_all_design_layout_count();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['design_layout'] = $this->Design_layout_model->get_all_design_layout($params);
        $this->template->public_render('Design_layout/index', $this->data);

    }

    public function add() {
        $this->data['proj_list'] = $this->Design_layout_model->get_all_project_list();
        $this->data['design_stages'] = $this->Design_layout_model->get_all_design_stage();
        $this->data['review_statuses'] = $this->Design_layout_model->get_all_review_status();
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        $this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('prj_id','Project','required');
        $this->form_validation->set_rules('design_stage_id','Design Stage','required');
        // $this->form_validation->set_rules('attach_name','Attachment','required');
        if (empty($_FILES['attach_name']['name']))
        {
            $this->form_validation->set_rules('attach_name', 'Document', 'required');
        }
        $this->form_validation->set_rules('review_status','Review Status','required');
        $this->form_validation->set_rules('percentage','Percentage','required');
        $this->form_validation->set_rules('remarks','Remarks','required');
        $this->form_validation->set_rules('revisions','Revision','required');

        $config = array(
            'upload_path' => "./upload/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "5000",
            'max_width' => "5000"
        );
        $this->load->library('upload', $config);
		if($this->form_validation->run() && $this->upload->do_upload('attach_name'))     
        {   
            $data = $this->input->post();
            $data['attach_name'] = $this->upload->data()['file_name'];
            $Design_layout_id = $this->Design_layout_model->add_design_layout($data);
            redirect('Design_layout/index');
        }
        else
        {   
            $error = array('error' => $this->upload->display_errors());
            $this->template->public_render('Design_layout/add', $this->data);      
           
        }
    }

    function edit($id)
    {   
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        // check if the Design layout exists before trying to edit it
        $this->data['Design_layout'] = $this->Design_layout_model->get_design_layout($id);
        $this->data['proj_list'] = $this->Design_layout_model->get_all_project_list();
        $this->data['design_stages'] = $this->Design_layout_model->get_all_design_stage();
        $this->data['review_statuses'] = $this->Design_layout_model->get_all_review_status();

        $config = array(
            'upload_path' => "./upload/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "5000",
            'max_width' => "5000"
        );
        $this->load->library('upload', $config);
        if(isset($this->data['Design_layout']['id']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('name','Name','required');
            $this->form_validation->set_rules('prj_id','Project','required');
            $this->form_validation->set_rules('design_stage_id','Design Stage','required');
            // $this->form_validation->set_rules('attach_name','Attachment','required');
            $this->form_validation->set_rules('review_status','Review Status','required');
            $this->form_validation->set_rules('percentage','Percentage','required');
            $this->form_validation->set_rules('remarks','Remarks','required');
            $this->form_validation->set_rules('revisions','Revision','required');
			
		
			if($this->form_validation->run() && $this->upload->do_upload('attach_name'))     
            {   
                $data = $this->input->post();
                $data['attach_name'] = $this->upload->data()['file_name'];
                $this->Design_layout_model->update_design_layout($id,$data);            
                redirect('Design_layout/index');
            }
            else
            {
                $this->template->public_render('Design_layout/edit', $this->data); 
            }
        }
        else
            show_error('The Design layout you are trying to edit does not exist.');
    } 

    function remove($id)
    {
        $Design_layout = $this->Design_layout_model->get_design_layout($id);

        // check if the Design layout exists before trying to delete it
        if(isset($Design_layout['id']))
        {
            $this->Design_layout_model->delete_design_layout($id);
            redirect('Design_layout/index');
        }
        else
            show_error('The Design layout you are trying to delete does not exist.');
    }

    function image_view($id) {

        $this->breadcrumbs->unshift(2, 'Image View', 'image_view');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $Design_layout = $this->Design_layout_model->get_design_layout($id);
        $this->data['imagepath'] = "upload/".$Design_layout['attach_name'];
        $this->data['id'] = $id;
        $this->template->public_render('Design_layout/image_view', $this->data);

    }

    function update_remarks($id) {
        $this->Design_layout_model->update_design_layout($id,$this->input->post());            
        redirect('Design_layout/index');

    }
}

?>
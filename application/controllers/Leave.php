<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Leave extends User_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Leave_model');
        $this->load->model('Leave_type_model');
        /* Title Page :: Common */
        $this->page_title->push('Leaves');
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, 'Leave', 'leave');
    } 

    /*
     * Listing of leaves
     */
    function index()
    {
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        
        $this->data['leaves'] = $this->Leave_model->get_all_leaves_with_type();
        //print_r($this->data['leaves']); exit;
        
        $this->template->public_render('Leave/index', $this->data);
    }

    /*
     * Adding a new leave
     */
    function apply()
    {   //print_r($this->session->userdata);  
        
        $this->breadcrumbs->unshift(2, 'Create', 'Leave/apply');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');

		$this->form_validation->set_rules('LeaveType','LeaveType','required');
		$this->form_validation->set_rules('ToDate','ToDate','required');
		$this->form_validation->set_rules('FromDate','FromDate','required');
		$this->form_validation->set_rules('Description','Description','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'LeaveType' => $this->input->post('LeaveType'),
				'ToDate' => date("Y-m-d",strtotime($this->input->post('ToDate'))),
				'FromDate' => date("Y-m-d",strtotime($this->input->post('FromDate'))),
                'Description' => $this->input->post('Description'),
                'empid' => $this->session->userdata["user_id"],
            );
            
            $leave_id = $this->Leave_model->add_leave($params);
            redirect('Leave/index');
        }
        else
        {            
            $this->data["leave_types"]=$this->Leave_type_model->get_all_leave_type();
            $this->template->public_render('Leave/add', $this->data);
        }
    }  

    /*
     * Editing a leave
     */
    function edit($id)
    {   
        $this->breadcrumbs->unshift(2, 'Edit', 'Leave/edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        // check if the leave exists before trying to edit it
        $this->data['leave'] = $this->Leave_model->get_leave($id);
        
        if(isset($this->data['leave']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('LeaveType','LeaveType','required');
			$this->form_validation->set_rules('ToDate','ToDate','required');
			$this->form_validation->set_rules('FromDate','FromDate','required');
			$this->form_validation->set_rules('Description','Description','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'LeaveType' => $this->input->post('LeaveType'),
					'ToDate' => $this->input->post('ToDate'),
					'FromDate' => $this->input->post('FromDate'),
					'Description' => $this->input->post('Description'),
                );

                $this->Leave_model->update_leave($id,$params);            
                redirect('Leave/index');
            }
            else
            {
                $this->template->public_render('Leave/edit', $this->data);
            }
        }
        else
            show_error('The leave you are trying to edit does not exist.');
    }

    function details($id)
    {
        $this->breadcrumbs->unshift(2, 'Details', 'Leave/details/');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['leave'] = $this->Leave_model->get_leave($id);
        $this->template->public_render('Leave/view', $this->data);
    }

    function history()
    {
        $this->breadcrumbs->unshift(2, 'History', 'Leave/history');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        
        $this->data['leaves'] = $this->Leave_model->get_leaves_by_user($this->session->userdata["user_id"]);
        //print_r($this->data['leaves']); exit;
        
        $this->template->public_render('Leave/index', $this->data);
    }
}

<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Interview_evaluation extends User_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Interview_evaluation_model');

         /* Title Page :: Common */
         $this->page_title->push('Interview Evaluation');
         $this->data['pagetitle'] = $this->page_title->show();
 
         /* Breadcrumbs :: Common */
         $this->breadcrumbs->unshift(1, 'Interview Evaluation', 'interview_evaluation');
    } 

    /*
     * Listing of interview_evaluation
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('interview_evaluation/index?');
        $config['total_rows'] = $this->Interview_evaluation_model->get_all_interview_evaluation_count();
        $this->pagination->initialize($config);

        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        $this->data['interview_evaluation'] = $this->Interview_evaluation_model->get_all_interview_evaluation($params);

        /* Load Template */
        $this->template->public_render('interview_evaluation/index', $this->data);
    }

    /*
     * Adding a new interview_evaluation
     */
    function add()
    {   
        $this->breadcrumbs->unshift(2, 'Create', 'interview_evaluation/create');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('candidate_name','Candidate Name','required');
        $this->form_validation->set_rules('date_of_interview','Date Of Interview','required');
		$this->form_validation->set_rules('job_title','Job Title','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'date_of_interview' => date("Y-m-d",strtotime($this->input->post('date_of_interview'))),
				'job_knowledge' => $this->input->post('job_knowledge'),
				'maturity' => $this->input->post('maturity'),
				'experience' => $this->input->post('experience'),
				'resilience' => $this->input->post('resilience'),
				'leadership' => $this->input->post('leadership'),
				'communication' => $this->input->post('communication'),
				'motivation' => $this->input->post('motivation'),
				'intelligence' => $this->input->post('intelligence'),
				'personality' => $this->input->post('personality'),
				'candidate_name' => $this->input->post('candidate_name'),
				'job_title' => $this->input->post('job_title'),
				'name_of_interviewer' => $this->input->post('name_of_interviewer'),
				'interview_status' => $this->input->post('interview_status'),
				'strong_areas_in_candidate' => $this->input->post('strong_areas_in_candidate'),
				'weak_areas_in_candidate' => $this->input->post('weak_areas_in_candidate'),
				'comments_of_interviewer' => $this->input->post('comments_of_interviewer'),
            );
            
            $interview_evaluation_id = $this->Interview_evaluation_model->add_interview_evaluation($params);
            redirect('Interview_evaluation/index');
        }
        else
        {     
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));       
            //$data['_view'] = 'interview_evaluation/add';
            $this->template->public_render('interview_evaluation/add', $this->data);
            //$this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a interview_evaluation
     */
    function edit($id)
    {   
        // check if the interview_evaluation exists before trying to edit it
        $this->breadcrumbs->unshift(2, 'Edit', '/interview_evaluation/create');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['interview_evaluation'] = $this->Interview_evaluation_model->get_interview_evaluation($id);
        //print_r($this->data['interview_evaluation']); exit;
        
        if(isset($this->data['interview_evaluation']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('candidate_name','Candidate Name','required');
            $this->form_validation->set_rules('date_of_interview','Date Of Interview','required');
            $this->form_validation->set_rules('job_title','Job Title','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'date_of_interview' => date("Y-m-d",strtotime($this->input->post('date_of_interview'))),
					'job_knowledge' => $this->input->post('job_knowledge'),
					'maturity' => $this->input->post('maturity'),
					'experience' => $this->input->post('experience'),
					'resilience' => $this->input->post('resilience'),
					'leadership' => $this->input->post('leadership'),
					'communication' => $this->input->post('communication'),
					'motivation' => $this->input->post('motivation'),
					'intelligence' => $this->input->post('intelligence'),
					'personality' => $this->input->post('personality'),
					'candidate_name' => $this->input->post('candidate_name'),
					'job_title' => $this->input->post('job_title'),
					'name_of_interviewer' => $this->input->post('name_of_interviewer'),
					'interview_status' => $this->input->post('interview_status'),
					'strong_areas_in_candidate' => $this->input->post('strong_areas_in_candidate'),
					'weak_areas_in_candidate' => $this->input->post('weak_areas_in_candidate'),
					'comments_of_interviewer' => $this->input->post('comments_of_interviewer'),
                );

                $this->Interview_evaluation_model->update_interview_evaluation($id,$params);            
                redirect('Interview_evaluation/index');
            }
            else
            {
                $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));       
                $this->template->public_render('interview_evaluation/edit', $this->data);   
            }
        }
        else
            show_error('The interview evaluation you are trying to edit does not exist.');
    } 

    /*
     * Deleting interview_evaluation
     */
    function remove($id)
    {
        $interview_evaluation = $this->Interview_evaluation_model->get_interview_evaluation($id);

        // check if the interview_evaluation exists before trying to delete it
        if(isset($interview_evaluation['id']))
        {
            $this->Interview_evaluation_model->delete_interview_evaluation($id);
            redirect('Interview_evaluation/index');
        }
        else
            show_error('The interview_evaluation you are trying to delete does not exist.');
    }

    function statusUpdate($id,$val)
    {
        $params = array(
            'interview_status' => $val,
        );       
        echo $this->Interview_evaluation_model->update_interview_evaluation($id,$params);
         exit;
    }
    
}

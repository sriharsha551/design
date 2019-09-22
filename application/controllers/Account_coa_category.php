<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Account_coa_category extends Admin_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Account_coa_category_model');
         /* Title Page :: Common */
         $this->page_title->push('Chartered Account Category');
         $this->data['pagetitle'] = $this->page_title->show();
 
         /* Breadcrumbs :: Common */
         $this->breadcrumbs->unshift(1, 'Chartered_account_category', 'Account_coa_category');
    } 

    /*
     * Listing of Account_coa_category
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Account_coa_category/index?');
        $config['total_rows'] = $this->Account_coa_category_model->get_all_Account_coa_category_count();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['Account_coa_category'] = $this->Account_coa_category_model->get_all_Account_coa_category($params);
        
        $this->template->public_render('Account_coa_category/index', $this->data);

   
    }

    /*
     * Adding a new Account_coa_category
     */
    function add()
    {   
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->load->library('form_validation');

		$this->form_validation->set_rules('name','Name','required|max_length[255]');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'name' => $this->input->post('name'),
            );
            
            $Account_coa_category_id = $this->Account_coa_category_model->add_Account_coa_category($params);
            redirect('Account_coa_category/index');
        }
        else
        {      
            $this->template->public_render('Account_coa_category/add', $this->data);      
           
        }
    }  

    /*
     * Editing a Account_coa_category
     */
    function edit($id)
    {   
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        // check if the Account_coa_category exists before trying to edit it
        $this->data['Account_coa_category'] = $this->Account_coa_category_model->get_Account_coa_category($id);
        
        if(isset($this->data['Account_coa_category']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('name','Name','required|max_length[255]');
		
			if($this->form_validation->run())     
            {   
                $params = array(
                    'name' => $this->input->post('name'),
                    'enabled' => $this->input->post('enabled'),
                    'updated_at' => date("Y-m-d H:i:s"),
                );
                $this->Account_coa_category_model->update_Account_coa_category($id,$params);            
                redirect('Account_coa_category/index');
            }
            else
            {
                $this->template->public_render('Account_coa_category/edit', $this->data); 
            }
        }
        else
            show_error('The Account_coa_category you are trying to edit does not exist.');
    } 

    /*
     * Deleting Account_coa_category
     */
    function remove($id)
    {
        $Account_coa_category = $this->Account_coa_category_model->get_Account_coa_category($id);

        // check if the Account_coa_category exists before trying to delete it
        if(isset($Account_coa_category['id']))
        {
            $params = array(
                'deleted_at' => date("Y-m-d H:i:s"),
                'delete_status'=> '1',
            );
            $this->Account_coa_category_model->delete_Account_coa_category($id,$params);
            redirect('Account_coa_category/index');
        }
        else
            show_error('The Account_coa_category you are trying to delete does not exist.');
    }
    
}
<?php

class Account_coa extends Admin_Controller
{
    public function __construct()
    {
        parent :: __construct();
        $this->load->model('Account_coa_model');
        $this->page_title->push('Accounts COA');
        $this->data['pagetitle'] = $this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, 'Account COA', 'Account_coa');
    }

    public function index() 
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Account_coa/index?');
        $config['total_rows'] = $this->Account_coa_model->get_act_coa_count();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['coa_details'] = $this->Account_coa_model->get_all_act_coa($params);
        $this->template->public_render('Account_coa/index', $this->data);
    }

    public function add()
    {
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->form_validation->set_rules('name', 'Account COA Name', 'required');
        $this->form_validation->set_rules('enabled', 'Enabled', 'required');
        $this->form_validation->set_rules('coa_cat_id', 'Category', 'required');
        $this->data['cat_list'] = $this->Account_coa_model->get_cat_list();
        if($this->form_validation->run())
        {
            $this->Account_coa_model->add_act_coa($this->input->post());
            redirect('Account_coa/index');
        }
        else
        {
            $this->template->public_render('Account_coa/add', $this->data);
        }
    }

    public function edit($id) 
    {
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->form_validation->set_rules('name', 'Account COA Name', 'required');
        $this->form_validation->set_rules('enabled', 'Enabled', 'required');
        $this->form_validation->set_rules('coa_cat_id', 'Category', 'required');
        $this->data['cat_list'] = $this->Account_coa_model->get_cat_list();

        if($this->form_validation->run())
        {
            $this->Account_coa_model->edit_act_coa($id, $this->input->post());
            redirect('Account_coa/index');
        }
        else
        {
            $this->data['coa_detail'] = $this->Account_coa_model->get_act_coa_detail($id);
            $this->template->public_render('Account_coa/edit', $this->data);
        }
    }

    public function remove($id)
    {
        $type = $this->Account_coa_model->get_act_coa_detail($id);

        // check if the Design layout exists before trying to delete it
        if (isset($type['id'])) {
            $this->Account_coa_model->delete_act_coa($id);
            redirect('Account_coa/index');
        } else {
            show_error('The Account COA you are trying to delete does not exist.');
        }
    }
}

?>
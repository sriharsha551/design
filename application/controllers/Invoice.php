

<?php

class Invoice extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Invoice_model');

        $this->page_title->push('invoices');
        $this->data['pagetitle'] = $this->page_title->show();

        $this->breadcrumbs->unshift(1, 'Invoice', 'Invoice');
    }

    public function index()
    {
        $params['limit'] = RECORDS_PER_PAGE;
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('Invoice/index?');
        $config['total_rows'] = $this->Invoice_model->get_all_invoice_count();
        $this->pagination->initialize($config);
        /* Breadcrumbs */
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['invoice'] = $this->Invoice_model->get_all_Invoice($params);
        $this->template->public_render('Invoice/index', $this->data);
    }

    public function add()
    {
        $this->breadcrumbs->unshift(2, 'Add', 'add');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();
        $this->data['Customers'] = $this->Invoice_model->get_cut();
        $this->data['credit'] = $this->Invoice_model->get_credit();
        $this->data['tax'] = $this->Invoice_model->get_tax();
        $this->data['invoice_item'] = $this->Invoice_model->get_Invoice_items();
        $this->data['inv_status'] = $this->Invoice_model->get_inv_status();
        $this->data['order_num'] = $this->Invoice_model->get_order();
        $this->load->library('form_validation');

   
        $this->form_validation->set_rules('remarks', 'Remarks', 'required');
      

        if ($this->form_validation->run()) {
            $params = $this->input->post();
            $concept_id = $this->Invoice_model->add_invoice($params);
            redirect('Invoice/index');
        } else {
            $_SESSION['error'] = true;
            $this->template->public_render('Invoice/add', $this->data);
        }
    }

    public function edit($id)
    {
        $this->breadcrumbs->unshift(2, 'Edit', 'edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        $this->data['invoices'] = $this->Invoice_model->get_invoice($id);
        $this->data['Customers'] = $this->Invoice_model->get_cut();
        $this->data['credit'] = $this->Invoice_model->get_credit();
        $this->data['tax'] = $this->Invoice_model->get_tax();
        $this->data['invoice_item'] = $this->Invoice_model->get_invoice_items();
        $this->data['invoice_status'] = $this->Invoice_model->get_inv_status();
        $this->data['order_num'] = $this->Invoice_model->get_order();
        $this->load->library('form_validation');

        if (isset($this->data['invoices']['id'])) {
        
  
        $this->form_validation->set_rules('remarks', 'Remarks', 'required');
    

            if ($this->form_validation->run()) {
                $params = $this->input->post();
                $this->Invoice_model->update($id, $params);
                redirect('Invoice/index');
            } else {
                $_SESSION['edit_error'] = true;
                $this->template->public_render('Invoice/edit', $this->data);
            }
        } else {
            show_error('The bills you are trying to edit does not exist.');
        }

    }

    public function delete($id) 
    {
        $this->Invoice_model->delete($id);
        redirect("Invoice/");
    }

}

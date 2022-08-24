<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brand extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (empty($this->session->userdata('email'))) {
      redirect('sign-in');
    }
    $this->data['user'] = $this->user_model->getUserByEmail($this->session->userdata('email'))->row();
  }

  public function index($action = '', $id = '')
  {
    $this->form_validation->set_rules('brand_name', elang('Brand Name'), 'required', [
      'required' => '%s ' . elang('Brand Name') . '*',
    ]);

    if ($this->form_validation->run() == FALSE) {
      $this->data['action'] = $action;
      $this->data['title'] = elang('Brand');
      $this->data['brand'] = $this->brand->getBrandAll()->result();
      if ($action == 'edit' && $id !== '') {
        $this->data['b'] = $this->brand->getBrandById($id)->row();
      }
      $this->template->load('admin/template', 'admin/brand/brand', $this->data);
    } else {
      if ($action == 'add') {
        $this->add();
      } else if ($action == 'edit') {
        $this->edit($id);
      }
    }
  }

  private function add()
  {
    $config['upload_path'] = './assets/images/brand-logo/';
    $config['allowed_types'] = 'gif|png|jpg|jpeg';
    $config['max_size'] = '800';
    $this->upload->initialize($config);
    $photo =  'brand_logo';
    if (!$this->upload->do_upload($photo)) {
      $this->data['action'] = 'add';
      $this->data['title'] = elang('Brand');
      $this->data['brand'] = $this->brand->getBrandAll()->result();
      $this->data['error_upload'] = $this->upload->display_errors();
      $this->template->load('admin/template', 'admin/brand/brand', $this->data);
    } else {
      $upload_data = array('brand_logo' => $this->upload->data());
      $config['image_library'] = 'gd2';
      $config['source_image'] = './assets/images/brand-logo/' . $upload_data['brand_logo']['file_name'];
      $this->load->library('image_lib', $config);
      $data = [
        'brand_seo' => strtolower(url_title($this->input->post('brand_seo', TRUE))),
        'brand_name' => htmlspecialchars($this->input->post('brand_name', TRUE)),
        'brand_logo' => $upload_data['brand_logo']['file_name'],
        'created' => date('Y-m-d H:i:s'),
      ];
      $this->brand->addBrand($data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      ' . elang('Added Successfully') . '!</div>');
      redirect('a-brand');
    }
  }

  private function edit($id)
  {
    $config['upload_path'] = './assets/images/brand-logo/';
    $config['allowed_types'] = 'gif|png|jpg|jpeg';
    $config['max_size'] = '800';
    $this->upload->initialize($config);
    $photo =  'brand_logo';
    if (!$this->upload->do_upload($photo)) {
      $this->data['action'] = 'edit';
      $this->data['title'] = elang('Brand');
      $this->data['brand'] = $this->brand->getBrandAll()->result();
      if ($action == 'edit' && $id !== '') {
        $this->data['b'] = $this->brand->getBrandById($id)->row();
      }
      $this->template->load('admin/template', 'admin/brand/brand', $this->data);
    } else {
      // DELETE IMAGE
      $brand = $this->brand->getBrandById($id)->row();
      if ($brand->brand_logo != "") {
        unlink('./assets/images/brand-logo/' . $brand->brand_logo);
      }
      $upload_data = array('brand_logo' => $this->upload->data());
      $config['image_library'] = 'gd2';
      $config['source_image'] = './assets/images/brand-logo/' . $upload_data['brand_logo']['file_name'];
      $this->load->library('image_lib', $config);
      $data = [
        'brand_seo' => strtolower(url_title($this->input->post('brand_seo', TRUE))),
        'brand_name' => htmlspecialchars($this->input->post('brand_name', TRUE)),
        'brand_logo' => $upload_data['brand_logo']['file_name'],
      ];
      $this->brand->editBrand($id, $data);
      $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
      ' . elang('Edited Successfully') . '!</div>');
      redirect('a-brand');
    }
    $data = [
      'brand_seo' => strtolower(url_title($this->input->post('brand_seo', TRUE))),
      'brand_name' => htmlspecialchars($this->input->post('brand_name', TRUE)),
    ];
    $this->brand->editBrand($id, $data);
    $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
    ' . elang('Edited Successfully') . '!</div>');
    redirect('a-brand');
  }

  public function delete($id)
  {
    $brand = $this->brand->getBrandById($id)->row();
    if ($brand->brand_photo != '') {
      unlink('./assets/images/brand-logo/' . $brand->brand_logo);
    }
    $this->brand->deleteBrand($id);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    ' . elang('Deleted Successfully') . '!</div>');
    redirect('a-brand');
  }
}


/* End of file Brand.php */
/* Location: ./application/controllers/Brand.php */
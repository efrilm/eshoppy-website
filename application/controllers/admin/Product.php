<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Product
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Product extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (empty($this->session->userdata('email'))) {
      redirect('sign-in');
    }
    $this->data['user'] = $this->user_model->getUserByEmail($this->session->userdata('email'))->row();
  }

  public function index($action = '')
  {

    $this->data['title'] =  elang('Product');
    $this->data['action'] = $action;
    $this->data['product'] =  $this->product_model->getProductAll()->result();
    $this->template->load('admin/template', 'admin/product/product', $this->data);
  }

  public function add()
  {
    $this->form_validation->set_rules('product_name', elang('Product Name'), 'required', [
      'required' => "%s " . elang('Required') . "*",
    ]);
    $this->form_validation->set_rules('product_category', elang('Product Category'), 'required', [
      'required' => "%s " . elang('Required') . "*",
    ]);
    $this->form_validation->set_rules('product_price', elang('Product Price'), 'required', [
      'required' => "%s " . elang('Required') . "*",
    ]);
    $this->form_validation->set_rules('product_description', elang('Product Description'), 'required', [
      'required' => "%s " . elang('Required') . "*",
    ]);
    $this->form_validation->set_rules('product_weight', elang('Product Weight'), 'required', [
      'required' => "%s " . elang('Required') . "*",
    ]);
    $this->form_validation->set_rules('brand_id', elang('Brand'), 'required', [
      'required' => "%s " . elang('Required') . "*",
    ]);
    $this->form_validation->set_rules('stok', elang('Stok'), 'required', [
      'required' => "%s " . elang('Required') . "*",
    ]);

    if ($this->form_validation->run() == TRUE) {
      $config['upload_path'] = './assets/images/product/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg|icon';
      $config['max_size'] = '1000';
      $this->upload->initialize($config);
      $product_photo = 'product_photo';
      if (!$this->upload->do_upload($product_photo)) {
        $this->data['title'] = elang('Add New Product');
        $this->data['category'] = $this->cat / egory_model->getCategoryAll()->result();
        $this->data['brand'] = $this->brand->getBrandAll()->result();
        $this->data['error_upload'] = $this->upload->display_errors();
        $this->template->load('admin/template', 'admin/product/add_product', $this->data);
      } else {
        $upload_data = array('product_photo' => $this->upload->data());
        $config['image_library '] = 'gd2';
        $config['source_image'] = './assets/images/product/' . $upload_data['product_photo']['file_name'];
        $this->load->library('image_lib', $config);
        $data = array(
          'product_name' => htmlspecialchars($this->input->post('product_name', TRUE)),
          'product_seo' => strtolower(url_title($this->input->post('product_name'))),
          'product_price' => htmlspecialchars($this->input->post('product_price', TRUE)),
          'category_id' => htmlspecialchars($this->input->post('product_category', TRUE)),
          'product_description' => htmlspecialchars($this->input->post('product_description', TRUE)),
          'product_weight' => htmlspecialchars($this->input->post('product_weight',  TRUE)),
          'brand_id' => htmlspecialchars($this->input->post('brand_id',  TRUE)),
          'stok' => htmlspecialchars($this->input->post('stok',  TRUE)),
          'product_photo' => $upload_data['product_photo']['file_name'],
          'created' => date('Y-m-d H:i:s'),
          'date_created' => date('Y-m-d'),
          'time_created' => date('H:i:s'),
          'is_active' => '1',
        );
        $this->product_model->addProduct($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        ' . elang('Added Successfully') . '!</div>');
        redirect('product');
      }
    }

    $this->data['title'] = elang('Add New Product');
    $this->data['category'] = $this->category_model->getCategoryAll()->result();
    $this->data['brand'] = $this->brand->getBrandAll()->result();
    $this->template->load('admin/template', 'admin/product/add_product', $this->data);
  }

  public function edit($id = NULL)
  {
    $this->form_validation->set_rules('product_name', elang('Product Name'), 'required', [
      'required' => "%s " . elang('Required') . "*",
    ]);
    $this->form_validation->set_rules('product_category', elang('Product Category'), 'required', [
      'required' => "%s " . elang('Required') . "*",
    ]);
    $this->form_validation->set_rules('product_price', elang('Product Price'), 'required', [
      'required' => "%s " . elang('Required') . "*",
    ]);
    $this->form_validation->set_rules('product_description', elang('Product Description'), 'required', [
      'required' => "%s " . elang('Required') . "*",
    ]);
    $this->form_validation->set_rules('product_weight', elang('Product Weight'), 'required', [
      'required' => "%s " . elang('Required') . "*",
    ]);
    $this->form_validation->set_rules('brand_id', elang('Brand'), 'required', [
      'required' => "%s " . elang('Required') . "*",
    ]);
    $this->form_validation->set_rules('stok', elang('Stok'), 'required', [
      'required' => "%s " . elang('Required') . "*",
    ]);

    if ($this->form_validation->run() == TRUE) {
      $config['upload_path'] = './assets/images/product/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg|icon';
      $config['max_size'] = '1000';
      $this->upload->initialize($config);
      $product_photo = 'product_photo';
      if (!$this->upload->do_upload($product_photo)) {
        $this->data['title'] = elang('Edit Product');
        $this->data['category'] = $this->category_model->getCategoryAll()->result();
        $this->data['product'] =  $this->product_model->getProductById($id);
        $this->data['brand'] = $this->brand->getBrandAll()->result();
        $this->data['error_upload'] = $this->upload->display_errors();
        $this->template->load('admin/template', 'admin/product/edit_product', $this->data);
      } else {
        // DELETE IMAGE
        $product =  $this->product_model->getProductById($id);
        if ($product->product_photo != "") {
          unlink('./assets/images/product/' . $product->product_photo);
        }
        $upload_data = array('product_photo' => $this->upload->data());
        $config['image_library '] = 'gd2';
        $config['source_image'] = './assets/images/product/' . $upload_data['product_photo']['file_name'];
        $this->load->library('image_lib', $config);
        $id_product = $this->input->post('id_product');
        $data = array(
          'product_name' => htmlspecialchars($this->input->post('product_name', TRUE)),
          'product_price' => htmlspecialchars($this->input->post('product_price', TRUE)),
          'category_id' => htmlspecialchars($this->input->post('product_category', TRUE)),
          'product_description' => htmlspecialchars($this->input->post('product_description', TRUE)),
          'product_weight' => htmlspecialchars($this->input->post('product_weight', TRUE)),
          'brand_id' => htmlspecialchars($this->input->post('brand_id', TRUE)),
          'stok' => htmlspecialchars($this->input->post('stok', TRUE)),
          'product_photo' => $upload_data['product_photo']['file_name'],
          'update_date' => date('Y-m-d H:i:s'),
        );
        $this->product_model->editProduct($data, $id_product);
        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
        ' . elang('Edited Successfully') . '!</div>');
        redirect('product');
      }
      $id_product = $this->input->post('id_product');
      $data = array(
        'product_name' => htmlspecialchars($this->input->post('product_name', TRUE)),
        'product_price' => htmlspecialchars($this->input->post('product_price', TRUE)),
        'category_id' => htmlspecialchars($this->input->post('product_category', TRUE)),
        'product_description' => htmlspecialchars($this->input->post('product_description', TRUE)),
        'product_weight' => htmlspecialchars($this->input->post('product_weight', TRUE)),
        'brand_id' => htmlspecialchars($this->input->post('brand_id', TRUE)),
        'stok' => htmlspecialchars($this->input->post('stok', TRUE)),
        'update_date' => date('Y-m-d H:i:s'),
      );

      $this->product_model->editProduct($data, $id_product);
      $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
      ' . elang('Edited Successfully') . '!</div>');
      redirect('product');
    }

    $this->data['title'] = elang('Edit Product');
    $this->data['category'] = $this->category_model->getCategoryAll()->result();
    $this->data['product'] =  $this->product_model->getProductById($id);
    $this->data['brand'] = $this->brand->getBrandAll()->result();
    $this->template->load('admin/template', 'admin/product/edit_product', $this->data);
  }

  public function delete($id = NULL)
  {
    // DELETE IMAGE
    $product =  $this->product_model->getProductById($id);
    if ($product->product_photo != "") {
      unlink('./assets/images/product/' . $product->product_photo);
    }

    $this->product_model->deleteProduct($id);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    ' . elang('Deleted Successfully') . '!</div>');
    redirect('product');
  }

  public function numberOfImages($id_product)
  {
    $this->data['title'] = elang('Add Images');
    $this->data['id'] = $id_product;
    $this->data['count'] =  $this->input->post('count');
    $this->template->load('admin/template', 'admin/product/add_images', $this->data);
  }

  public function detailProduct($seo)
  {
    $this->data['product']  = $this->product_model->getProductBySeo($seo);
    $this->data['title'] =  $this->data['product']->product_name;
    $this->data['color'] = $this->variant->getColour($this->data['product']->id_product)->result();
    $this->data['size'] = $this->variant->getSize($this->data['product']->id_product)->result();
    $this->template->load('admin/template', 'admin/product/detail_product', $this->data);
  }

  public function active($seo)
  {
    $this->product_model->activeProduct($seo);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    ' . elang('Product has been activated successfully') . '!</div>');
    redirect('a-detail-product/' . $seo);
  }

  public function deactive($seo)
  {
    $this->product_model->deactiveProduct($seo);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    ' . elang('Product deactivated successfully') . '!</div>');
    redirect('a-detail-product/' . $seo);
  }

  public function generate($id)
  {
    $this->data['id'] = $id;
    $this->data['title'] = elang('Generate Variant');
    $this->template->load('admin/template', 'admin/product/generate', $this->data);
  }
}



/* End of file Product.php */
/* Location: ./application/controllers/Product.php */
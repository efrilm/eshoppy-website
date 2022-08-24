<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Category
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

class Category extends CI_Controller
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

    $this->form_validation->set_rules('category_name', 'Category Name', 'required', [
      "required" => "%s" . elang('Required') . "",
    ]);

    if ($this->form_validation->run() == FALSE) {
      $this->data['title'] = elang('Category');
      $this->data['action'] = $action;
      $this->data['category']  =  $this->category_model->getCategoryAll()->result();

      if ($action == 'edit' && $id !== '') {
        $this->data['eC'] = $this->category_model->getCategoryById($id)->row();
      }

      $this->template->load('admin/template', 'admin/category/category', $this->data);
    } else {
      if ($action == "add") {
        $category_name = htmlspecialchars($this->input->post('category_name', TRUE));
        $data = [
          'category_name' => $category_name,
          'created' => date("Y-m-d H:i:s"),
        ];
        $this->category_model->addCategory($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        ' . elang('Added Successfully') . '!</div>');
        redirect('category');
      } else if ($action == "edit") {
        $category_name = htmlspecialchars($this->input->post('category_name', TRUE));
        $data = [
          'category_name' => $category_name,
        ];
        $this->category_model->editCategory($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
        ' . elang('Edited Successfully') . '!</div>');
        redirect('category');
      }
    }
  }

  public function delete($id)
  {
    $this->category_model->deleteCategory($id);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    ' . elang('Deleted Successfully') . '!</div>');
    redirect('category');
  }
}


/* End of file Category.php */
/* Location: ./application/controllers/Category.php */
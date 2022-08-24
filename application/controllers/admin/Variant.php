<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Variant
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

class Variant extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (empty($this->session->userdata('email'))) {
      redirect('sign-in');
    }
    $this->data['user'] = $this->user_model->getUserByEmail($this->session->userdata('email'))->row();
  }

  public function addVariant($id)
  {
    $this->data['title'] =  elang('Add Variant');
    $this->data['count'] = $this->input->post('count_add');
    $this->data['id'] = $id;
    $this->data['subVariant'] = $this->variant->getSubVariantAll()->result();
    $this->template->load('admin/template', 'admin/variant/add_variant', $this->data);
  }

  public function process()
  {
    $total = $this->input->post('count');
    $id = $this->input->post('id');
    for ($i = 1; $i <= $total; $i++) {
      $variantname = htmlspecialchars($this->input->post('variant_name_' . $i));
      $subVariant = htmlspecialchars($this->input->post('sub_variant_' . $i));
      $data = array(
        'variant_name' => $variantname,
        'sub_variant_id' => $subVariant,
        'product_id' => $id,
      );x
      $response = $this->db->insert('tb_variant', $data);
    }
    $error = $this->db->error();
    if ($response) {
      $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
      ' .  elang('Added Successfully') . '!</div>');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      ' . $error . elang('Gagal') . '!</div>');
    }
    redirect('product');
  }

  public function subVariant($action = '', $id = '')
  {

    $this->form_validation->set_rules('sub_variant_name', elang('Sub Variant'), 'required|trim', [
      'required' => '%s ' . elang('Required') . '*',
    ]);

    if ($this->form_validation->run() == FALSE) {
      $this->data['title'] = elang('Sub Variant');
      $this->data['action'] =  $action;
      if ($action == 'edit' && $id !== '') {
        $this->data['sv'] = $this->variant->getSubVariantById($id)->row();
      }
      $this->data['subVariant'] = $this->variant->getSubVariantAll()->result();
      $this->template->load('admin/template', 'admin/variant/sub_variant', $this->data);
    } else {
      if ($action == 'add') {
        $this->addSubVariant();
      } else if ($action == 'edit') {
        $this->editSubVariant($id);
      }
    }
  }

  private function addSubVariant()
  {
    $data = [
      'sub_variant_name' => htmlspecialchars($this->input->post('sub_variant_name', TRUE)),
    ];
    $this->variant->addSubVariant($data);
    $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
    ' . elang('Added Successfully') . '!</div>');
    redirect('sub-variant');
  }

  private function editSubVariant($id)
  {
    $data = [
      'sub_variant_name' => htmlspecialchars($this->input->post('sub_variant_name', TRUE)),
    ];
    $this->variant->editSubVariant($id, $data);
    $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
    ' . elang('Updated Successfully') . '!</div>');
    redirect('sub-variant');
  }

  public function deleteSubVariant($id)
  {
    $this->variant->deleteSubVariant($id);
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    ' . elang('Ddeleted Successfully') . '!</div>');
    redirect('sub-variant');
  }
}



/* End of file Variant.php */
/* Location: ./application/controllers/Variant.php */
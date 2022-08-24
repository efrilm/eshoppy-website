<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Web_config
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

class Web_config extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->data['user'] = $this->user_model->getUserByEmail($this->session->userdata('email'))->row();
  }

  public function index()
  {

    $this->form_validation->set_rules('city', elang('City'), 'required', [
      'required' => "%s " . elang('Required') . "*",
    ]);

    $this->form_validation->set_rules('shop_name', elang('Shop Name'), 'required', [
      'required' => "%s " . elang('Required') . "*",
    ]);

    $this->form_validation->set_rules('shop_address', elang('Address'), 'required', [
      'required' => "%s " . elang('Required') . "*",
    ]);

    $this->form_validation->set_rules('no_phone', elang('No. Phone'), 'required', [
      'required' => "%s " . elang('Required') . "*",
    ]);

    $this->form_validation->set_rules('no_whatsapp', elang('No. Whatsapp'), 'required', [
      'required' => "%s " . elang('Required') . "*",
    ]);

    if ($this->form_validation->run() == FALSE) {
      $this->data['title'] = elang('Website Configuration');
      $this->data['setting'] = $this->setting_model->getSetting();
      $this->template->load('admin/template', 'admin/web_config/config', $this->data);
    } else {
      $id = $this->input->post('id');
      $data = array(
        'location' => $this->input->post('city'),
        'shop_name' => $this->input->post('shop_name'),
        'address' => $this->input->post('shop_address'),
        'no_phone' => $this->input->post('no_phone'),
        'no_whatsapp' => $this->input->post('no_whatsapp'),
      );
      $this->setting_model->edit($id, $data);
      $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
        ' . elang('Edited Successfully') . '!</div>');
      redirect('web-config');
    }
  }

  public function address()
  {
    $this->data['title'] = elang('Address');
    $this->template->load('admin/template', 'admin/web_config/address', $this->data);
  }
}


/* End of file Web_config.php */
/* Location: ./application/controllers/Web_config.php */
<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Account
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

class Account extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (empty($this->session->userdata('email'))) {
      redirect('sign-in');
    }
  }

  public function index()
  {
    $this->data['title'] =  elang('My Account');
    $this->data['account'] = $this->user_model->getUserByEmail($this->session->userdata('email'))->row();
    $this->template->load('frontend/template', 'frontend/account/my_account', $this->data);
  }
}


/* End of file Account.php */
/* Location: ./application/controllers/Account.php */
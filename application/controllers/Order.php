<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller My_order
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

class Order extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (empty($this->session->userdata('email'))) {
      redirect('sign-in');
    }
  }

  public function my_order()
  {
    $this->data['title'] = elang('My Orders');
    $this->data['order'] = $this->transaction->getTransactionByStatusPaymentAndUserId('0', $this->session->userdata('id_user'))->result();
    $this->data['processed'] = $this->transaction->getTransactionByStatusOrderAndUserId(1, $this->session->userdata('id_user'))->result();
    $this->template->load('frontend/template', 'frontend/order/my_order', $this->data);
  }
}


/* End of file My_order.php */
/* Location: ./application/controllers/My_order.php */
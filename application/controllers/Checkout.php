<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Checkout
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

class Checkout extends CI_Controller
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
    $this->form_validation->set_rules('province', elang('Province'), 'required', [
      'required' => '%s ' . elang('Required') . '*',
    ]);
    $this->form_validation->set_rules('city', elang('city'), 'required', [
      'required' => '%s ' . elang('Required') . '*',
    ]);
    $this->form_validation->set_rules('shipping', elang('Shipping'), 'required', [
      'required' => '%s ' . elang('Required') . '*',
    ]);
    $this->form_validation->set_rules('package', elang('Package'), 'required', [
      'required' => '%s ' . elang('Required') . '*',
    ]);
    $this->form_validation->set_rules('recipient_name', elang('Recipient Name'), 'required', [
      'required' => '%s ' . elang('Required') . '*',
    ]);
    $this->form_validation->set_rules('no_phone', elang('No. Phone'), 'required', [
      'required' => '%s ' . elang('Required') . '*',
    ]);
    $this->form_validation->set_rules('postal_code', elang('Postal Code'), 'required', [
      'required' => '%s ' . elang('Required') . '*',
    ]);
    $this->form_validation->set_rules('address', elang('Address'), 'required', [
      'required' => '%s ' . elang('Required') . '*',
    ]);

    if ($this->form_validation->run() ==  FALSE) {
      $this->data['title'] = elang('Checkout');
      $this->data['cart'] = $this->cart_model->getCartByUser($this->session->userdata('id_user'))->result();
      $this->template->load('frontend/template', 'frontend/order/checkout', $this->data);
    } else {
      $data = [
        "no_order" => htmlspecialchars($this->input->post('no_order', TRUE)),
        'user_id' => $this->session->userdata('id_user'),
        "date_order" => date('Y-m-d'),
        "time_order" => date('H:i:s'),
        'recipient_name' => htmlspecialchars($this->input->post('recipient_name', TRUE)),
        'no_phone' => htmlspecialchars($this->input->post('no_phone', TRUE)),
        'province' => htmlspecialchars($this->input->post('province', TRUE)),
        'city' => htmlspecialchars($this->input->post('city', TRUE)),
        'postal_code' => htmlspecialchars($this->input->post('postal_code', TRUE)),
        'address' => htmlspecialchars($this->input->post('address', TRUE)),
        'shipping' => htmlspecialchars($this->input->post('shipping', TRUE)),
        'package' => htmlspecialchars($this->input->post('package', TRUE)),
        'estimation' => htmlspecialchars($this->input->post('estimation', TRUE)),
        'weight' => htmlspecialchars($this->input->post('weight', TRUE)),
        'shipping_cost' => htmlspecialchars($this->input->post('shipping_cost', TRUE)),
        'grand_total' => htmlspecialchars($this->input->post('grand_total', TRUE)),
        'total_payment' => htmlspecialchars($this->input->post('total_payment', TRUE)),
        'status_payment' => '0',
        'status_order' => '0',
      ];
      $this->transaction->addTransaction($data);
      $cart = $this->cart_model->getCartByUser($this->session->userdata('id_user'))->result();
      $no = 1;
      foreach ($cart as $c) {
        $dataDetail = array(
          "no_order" => htmlspecialchars($this->input->post('no_order', TRUE)),
          'product_id' => $c->product_id,
          'user_id' => $this->session->userdata('id_user'),
          "qty" => htmlspecialchars($this->input->post('qty' . $no++, TRUE)),
        );
        $this->transaction->addTransactionDetail($dataDetail);
      }
      $this->cart_model->deleteCartByUser($this->session->userdata('id_user'));
      $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
        ' . elang('Your Order Has Been Successfully Ordered') . '!</div>');
      redirect('/');
    }
  }
}


/* End of file Checkout.php */
/* Location: ./application/controllers/Checkout.php */
<?php

use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;

defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Transaction
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

class Transaction extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (empty($this->session->userdata('email'))) {
      redirect('sign-in');
    }
    $this->data['user'] = $this->user_model->getUserByEmail($this->session->userdata('email'))->row();
  }

  public function notYetPaid()
  {
    $this->data['title'] = elang('Orders');
    $this->data['order'] = $this->transaction->getTransactionByStatusPayment('0')->result();
    $this->template->load('admin/template', 'admin/transaction/not_yet_paid', $this->data);
  }

  public function beingProcessed()
  {
    $this->data['title'] = elang('Being processed');
    $this->data['order'] = $this->transaction->getTransactionByStatusOrder(1)->result();
    $this->template->load('admin/template', 'admin/transaction/being_processed', $this->data);
  }

  public function onDelivery()
  {
    $this->data['title'] = elang('On Delivery');
    $this->data['order'] = $this->transaction->getTransactionByStatusOrder(2)->result();
    $this->template->load('admin/template', 'admin/transaction/on_delivery', $this->data);
  }

  public function finished()
  {
    $this->data['title'] = elang('Order Finished');
    $this->data['order'] = $this->transaction->getTransactionByStatusOrder(3)->result();
    $this->template->load('admin/template', 'admin/transaction/finished', $this->data);
  }

  public function detailOrder($noOrder)
  {
    $this->data['title'] = elang('Order Detail') . ' #' . $noOrder;
    $this->data['trans'] = $this->transaction->getTransactionByOrderId($noOrder)->row();
    $this->data['detail'] = $this->transaction->getTransactionDetailByNoOrder($noOrder)->result();
    $this->template->load('admin/template', 'admin/transaction/detail_order', $this->data);
  }

  public function confirmPayment($noOrder)
  {
    $data = [
      'status_payment' => 1,
      'status_order' => 1,
      'update_date' => date('Y-m-d'),
      'update_time' => date('H:i:s'),
    ];
    $this->transaction->updateTransaction($noOrder, $data);
    $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
    ' . elang('Confirm Payment Successfully') . '!</div>');
    redirect('a-detail-order/' . $noOrder);
  }

  public function sendProduct($noOrder)
  {
    $data = [
      'no_resi' => strtoupper(htmlspecialchars($this->input->post('no_resi'))),
      'status_order' => 2,
      'update_date' => date('Y-m-d'),
      'update_time' => date('H:i:s'),
    ];
    $this->transaction->updateTransaction($noOrder, $data);

    $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
    ' . elang('Sent Product Successfully') . '!</div>');
    redirect('being-processed');
  }

  public function processAccepted($noOrder)
  {
    $data = [
      'status_order' => 3,
      'update_date' => date('Y-m-d'),
      'update_time' => date('H:i:s'),
    ];
    $this->transaction->updateTransaction($noOrder, $data);
    $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
    ' . elang('Sent Product Successfully') . '!</div>');
    redirect('on-delivery');
  }

  public function invoice($noOrder)
  {
    $this->data['title'] =  elang('Invoice');
    $this->data['trans'] = $this->transaction->getTransactionByOrderId($noOrder)->row();
    $this->data['detail'] = $this->transaction->getTransactionDetailByNoOrder($noOrder)->result();
    $this->template->load('admin/template', 'admin/invoice/invoice', $this->data);
  }
}


/* End of file Transaction.php */
/* Location: ./application/controllers/Transaction.php */
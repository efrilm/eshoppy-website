<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Cart
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

class Cart extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->data['title'] = elang('Cart');
    $this->data['cart'] = $this->cart_model->getCartByUser($this->session->userdata('id_user'));
    $this->template->load('frontend/template', 'frontend/cart/cart', $this->data);
  }

  public function add()
  {
    $data = array(
      'user_id' => $this->session->userdata('id_user'),
      'product_id'      => $this->input->post('id'),
      'qty'     => $this->input->post('qty'),
      'price'   => $this->input->post('price'),
      'name'    => $this->input->post('name'),
    );
    $this->cart_model->addCart($data);

    $redirect = $this->input->post('redirect_page');
    redirect($redirect, 'refresh');
  }

  public function update()
  {
    $id = $this->input->post('id');
    $data = [
      'qty' => htmlspecialchars($this->input->post('qty', TRUE)),
    ];
    $this->cart_model->editCart($id, $data);
    redirect('cart', 'refresh');
  }

  public function delete($id)
  {
    $this->cart_model->deleteCart($id);
    redirect('/', 'refresh');
  }
}


/* End of file Cart.php */
/* Location: ./application/controllers/Cart.php */
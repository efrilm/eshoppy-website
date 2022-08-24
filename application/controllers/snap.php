<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-pz_TXR4B5o9BnHNlKwvgFWIT', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('frontend/midtrains/checkout_snap');
	}

	public function token()
	{

		$no_order = $this->input->post('no_order');
		$province = $this->input->post('province');
		$city = $this->input->post('city');
		$shipping = $this->input->post('shipping');
		$package = $this->input->post('package');
		$recipient_name = $this->input->post('recipient_name');
		$no_phone = $this->input->post('no_phone');
		$postal_code = $this->input->post('postal_code');
		$address = $this->input->post('address');
		$no_order = $this->input->post('no_order');
		$estimation = $this->input->post('estimation');
		$shipping_cost = $this->input->post('shipping_cost');
		$grand_total = $this->input->post('grand_total');
		$total_payment = $this->input->post('total_payment');
		$weight = $this->input->post('weight');

		$cart = $this->cart_model->getCartByUser($this->session->userdata('id_user'))->result();

		// Required
		$transaction_details = array(
			'order_id' => $no_order,
			'gross_amount' => $total_payment, // no decimal allowed for creditcard
		);

		// Optional

		// // Optional
		// $item2_details = array(
		// 	'id' => $shipping,
		// 	'price' => $shipping_cost,
		// 	'quantity' => 1,
		// 	'name' => 'Ongkos Kirim',
		// );


		// // Optional
		// $item_details = array(
		// 	$result,
		// 	$item2_details,
		// );

		// // Optional
		// $billing_address = array(
		// 	'first_name'    => "Andri",
		// 	'last_name'     => "Litani",
		// 	'address'       => "Mangga 20",
		// 	'city'          => "Jakarta",
		// 	'postal_code'   => "16602",
		// 	'phone'         => "081122334455",
		// 	'country_code'  => 'IDN'
		// );

		// // Optional
		// $shipping_address = array(
		// 	'first_name'    => "Obet",
		// 	'last_name'     => "Supriadi",
		// 	'address'       => "Manggis 90",
		// 	'city'          => "Jakarta",
		// 	'postal_code'   => "16601",
		// 	'phone'         => "08113366345",
		// 	'country_code'  => 'IDN'
		// );

		// Optional
		$customer_details = array(
			'first_name'    => $recipient_name,
			'phone'         => $no_phone,
			// 'billing_address'  => $billing_address,
			// 'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'minute',
			'duration'  => 120
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			// 'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finish()
	{
		$result = json_decode($this->input->post('result_data'), true);
		// echo 'RESULT <br><pre>';
		// var_dump($result);
		// echo '</pre>';

			$no_order = $this->input->post('no_order');
		$province = $this->input->post('province');
		$city = $this->input->post('city');
		$shipping = $this->input->post('shipping');
		$package = $this->input->post('package');
		$recipient_name = $this->input->post('recipient_name');
		$no_phone = $this->input->post('no_phone');
		$postal_code = $this->input->post('postal_code');
		$address = $this->input->post('address');
		$payment_type = $result['payment_type'];
		$no_order = $this->input->post('no_order');
		$estimation = $this->input->post('estimation');
		$shipping_cost = $this->input->post('shipping_cost');
		$grand_total = $this->input->post('grand_total');
		$total_payment = $this->input->post('total_payment');
		$weight = $this->input->post('weight');

		// add to database 
		$data = [
			"no_order" => $no_order,
			"user_id" => $this->session->userdata('id_user'),
			"date_order" => date('Y-m-d'),
			'time_order' => date('H:i:s'),
			'update_date' => date('Y-m-d'),
			'update_time' => date('H:i:s'),
			'recipient_name' => $recipient_name,
			'no_phone' => $no_phone,
			"province" => $province,
			"city" => $city,
			"postal_code" => $postal_code,
			"address" => $address,
			"shipping" => $shipping,
			"package" => $package,
			"estimation" => $estimation,
			"weight" => $weight,
			"shipping_cost" => $shipping_cost,
			"grand_total" => $grand_total,
			"total_payment" => $total_payment,
			"status_payment" => '1',
			"status_order" =>  '1',
			'payment_type' => $payment_type,
			'id_bank' => $result['va_numbers'][0]['bank'],
		];
		$this->transaction->addTransaction($data);
		$cart = $this->cart_model->getCartByUser($this->session->userdata('id_user'))->result();
		foreach ($cart as $c => $value) {
			$dataDetail = array(
				"no_order"  => $no_order,
				"product_id" => $value->product_id,
				"user_id" => $this->session->userdata('id_user'),
				"qty" => $value->qty,
			);
			$this->transaction->addTransactionDetail($dataDetail);
			$product = $this->product_model->getProductByIdSold($value->product_id)->result();
			foreach ($product as $p) {
				$sold = $p->sold + 1;
				$this->product_model->addSold($p->id_product, $sold);
			}
		}
		$this->cart_model->deleteCartByUser($this->session->userdata('id_user'));
		redirect('/');
	}
}

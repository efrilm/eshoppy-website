<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Home
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

class Home extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->data['title'] = 'eShoppy E-Commerce';
    $this->data['newArrivals'] = $this->product_model->getNewArrivals(8);
    $this->data['getCart'] = $this->cart_model->getCartAll();
    $this->data['bestSeller'] = $this->product_model->getBestSeller(8);
    $this->data['brand'] =  $this->brand->getBrandAll()->result();
    $this->template->load('frontend/template', 'frontend/home/home', $this->data);
  }

  public function category($id)
  {
    $this->data['category'] = $this->category_model->getCategoryById($id)->row();
    $this->data['title'] = elang('Category') . " " . $this->data['category']->category_name;
    $this->data['allCategory'] =  $this->category_model->getCategoryAll()->result();
    $this->data['products'] = $this->product_model->getProductByCategory($id)->result();
    $this->data['recentProducts'] = $this->product_model->getNewArrivals(3);

    $this->template->load('frontend/template', 'frontend/category/category', $this->data);
  }



  public function detailProduct($seo)
  {
    $this->data['product'] = $this->product_model->getProductBySeo($seo);
    $this->data['title'] = $this->data['product']->product_name;
    $this->data['alsoLike'] = $this->product_model->getProductByCategory($this->data['product']->category_id)->result();

    $view = $this->data['product']->views + 1;
    $this->product_model->addView($seo, $view);
    $this->template->load('frontend/template', 'frontend/product/detail_product', $this->data);
  }
}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
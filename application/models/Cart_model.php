<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Cart_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Cart_model extends CI_Model
{

  protected $table = 'tb_cart';

  public function __construct()
  {
    parent::__construct();
  }

  public function getCartAll()
  {
    $this->db->join('tb_product', 'tb_product.id_product = tb_cart.product_id', 'left');
    return $this->db->get('tb_cart');
  }

  public function getCartById($id)
  {
    $this->db->where('id_cart', $id);
    return $this->db->get($this->table);
  }

  public function getCartByUser($id)
  {
    $this->db->where('user_id', $id);
    $this->db->join('tb_product', 'tb_product.id_product = tb_cart.product_id', 'left');
    return $this->db->get('tb_cart');
  }

  public function getCartByUserAndId($idUser, $id)
  {
    $this->db->where('user_id', $idUser);
    $this->db->where('product_id', $id);
    $this->db->join('tb_product', 'tb_product.id_product = tb_cart.product_id', 'left');
    return $this->db->get('tb_cart');
  }

  public function addCart($value)
  {
    return $this->db->insert($this->table, $value);
  }

  public function editCart($id, $value)
  {
    $this->db->where('id_cart', $id);
    $query = $this->db->update($this->table, $value);
    return $query;
  }

  public function deleteCart($id)
  {
    $this->db->where('id_cart', $id);
    $query = $this->db->delete($this->table);
    return $query;
  }

  public function deleteCartByUser($idUser)
  {
    $this->db->where('user_id', $idUser);
    $query = $this->db->delete($this->table);
    return $query;
  }
}

/* End of file Cart_model.php */
/* Location: ./application/models/Cart_model.php */
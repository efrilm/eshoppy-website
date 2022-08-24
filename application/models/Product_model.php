<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Product_model
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

class Product_model extends CI_Model
{

  protected $table = 'tb_product';
  protected $primaryId = 'id_product';

  public function __construct()
  {
    parent::__construct();
  }

  public function getProductAll()
  {
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->join('tb_category', 'tb_category.id = tb_product.category_id', 'left');
    $this->db->join('tb_brand', 'tb_brand.id_brand = tb_product.brand_id');
    $this->db->order_by($this->primaryId, 'desc');
    return $this->db->get();
  }

  public function getProductById($id)
  {
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->join('tb_category', 'tb_category.id = tb_product.category_id', 'left');
    $this->db->join('tb_brand', 'tb_brand.id_brand = tb_product.brand_id');
    $this->db->where($this->primaryId, $id);
    return $this->db->get()->row();
  }

  public function getProductByIdSold($id)
  {
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->join('tb_category', 'tb_category.id = tb_product.category_id', 'left');
    $this->db->join('tb_brand', 'tb_brand.id_brand = tb_product.brand_id');
    $this->db->where($this->primaryId, $id);
    return $this->db->get();
  }

  public function getProductBySeo($seo)
  {
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->join('tb_category', 'tb_category.id = tb_product.category_id', 'left');
    $this->db->join('tb_brand', 'tb_brand.id_brand = tb_product.brand_id');
    $this->db->where("tb_product.product_seo", $seo);
    return $this->db->get()->row();
  }

  public function getProductLimit($limit)
  {
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->join('tb_category', 'tb_category.id = tb_product.category_id', 'left');
    $this->db->join('tb_brand', 'tb_brand.id_brand = tb_product.brand_id');
    $this->db->order_by('tb_product.created', 'desc');
    $this->db->limit($limit);
    return $this->db->get()->result();
  }

  public function getNewArrivals($limit = null)
  {
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->join('tb_category', 'tb_category.id = tb_product.category_id', 'left');
    $this->db->join('tb_brand', 'tb_brand.id_brand = tb_product.brand_id');
    $this->db->where('is_active', '1');
    if ($limit) {
      $this->db->limit($limit);
    }
    $this->db->order_by('tb_product.created', 'desc');
    return $this->db->get()->result();
  }

  public function getBestSeller($limit = null)
  {
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->join('tb_category', 'tb_category.id = tb_product.category_id', 'left');
    $this->db->join('tb_brand', 'tb_brand.id_brand = tb_product.brand_id');
    $this->db->where('is_active', '1');
    if ($limit) {
      $this->db->limit($limit);
    }
    $this->db->order_by('tb_product.sold', 'DESC');
    return  $this->db->get()->result();
  }

  public function getProductByCategory($id)
  {
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->join('tb_category', 'tb_category.id = tb_product.category_id', 'left');
    $this->db->join('tb_brand', 'tb_brand.id_brand = tb_product.brand_id');
    $this->db->order_by('tb_product.created', 'DESC');
    $this->db->where("tb_product.category_id", $id);
    return $this->db->get();
  }

  public function addProduct($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function editProduct($data, $id)
  {
    $this->db->where($this->primaryId, $id);
    return $this->db->update($this->table, $data);
  }

  public function deleteProduct($id)
  {
    $this->db->where($this->primaryId, $id);
    return $this->db->delete($this->table);
  }

  public function countProductThisMonth()
  {
    $bln = date('m');
    $query = $this->db->query("SELECT * FROM tb_product WHERE MONTH(created) = '" . $bln . "'")->num_rows();
    return $query;
  }

  public function addView($seo, $view)
  {
    $this->db->where('product_seo', $seo);
    $query =  $this->db->update($this->table, array('views' => $view));
    return $query;
  }

  public function addSold($id, $sold)
  {
    $this->db->where('id_product', $id);
    $query = $this->db->update($this->table, array('sold' => $sold));
    return $query;
  }

  public function activeProduct($seo)
  {
    $this->db->where('product_seo', $seo);
    $query = $this->db->update($this->table, array('is_active' => 1));
    return $query;
  }

  public function deactiveProduct($seo)
  {
    $this->db->where("product_seo", $seo);
    $query = $this->db->update($this->table, array('is_active' => 0));
    return $query;
  }
}

/* End of file Product_model.php */
/* Location: ./application/models/Product_model.php */
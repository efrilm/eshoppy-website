<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Brand_model
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

class Brand_model extends CI_Model
{

  protected $table = 'tb_brand';

  public function __construct()
  {
    parent::__construct();
  }

  public function getBrandAll()
  {
    $query = $this->db->get($this->table);
    return $query;
  }

  public function getBrandById($id)
  {
    $this->db->where('id', $id);
    $query = $this->db->get($this->table);
    return $query;
  }

  public function addBrand($data)
  {
    $query = $this->db->insert($this->table, $data);
    return $query;
  }

  public function editBrand($id, $data)
  {
    $this->db->where('id', $id);
    $query = $this->db->update($this->table, $data);
    return $query;
  }

  public function deleteBrand($id)
  {
    $this->db->where('id', $id);
    $query = $this->db->delete($this->table);
    return $query;
  }
}

/* End of file Brand_model.php */
/* Location: ./application/models/Brand_model.php */
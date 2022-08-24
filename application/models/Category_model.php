<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Category_model
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

class Category_model extends CI_Model
{


  protected $table = 'tb_category';
  protected $primaryId = "id";

  public function __construct()
  {
    parent::__construct();
  }

  public function getCategoryAll()
  {
    $query = $this->db->get($this->table);
    return $query;
  }

  public function getCategoryById($id)
  {
    $this->db->where($this->primaryId, $id);
    $query = $this->db->get($this->table);
    return $query;
  }

  public function addCategory($value)
  {
    $query = $this->db->insert($this->table, $value);
    return $query;
  }

  public function editCategory($value, $id)
  {
    $this->db->where($this->primaryId, $id);
    $query = $this->db->update($this->table, $value);
    return $query;
  }

  public function deleteCategory($id)
  {
    $this->db->where($this->primaryId, $id);
    $query = $this->db->delete($this->table);
    return $query;
  }
}

/* End of file Category_model.php */
/* Location: ./application/models/Category_model.php */
<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Variant_model
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

class Variant_model extends CI_Model
{

  protected $tableSub = 'tb_sub_variant';
  protected $table = 'tb_variant';

  public function __construct()
  {
    parent::__construct();
  }

  public function addVariant($data)
  {
    $query = $this->db->insert($this->table, $data);
    return $query;
  }

  public function getColour($id)
  {
    $this->db->where('sub_variant_id', '3');
    $this->db->where('product_id', $id);
    $query = $this->db->get($this->table);
    return $query;
  }

  public function getSize($id)
  {
    $this->db->where('sub_variant_id', '4');
    $this->db->where('product_id', $id);
    $query = $this->db->get($this->table);
    return $query;
  }

  public function getSubVariantAll()
  {
    $query =  $this->db->get($this->tableSub);
    return $query;
  }

  public function addSubVariant($data)
  {
    $query = $this->db->insert($this->tableSub, $data);
    return $query;
  }

  public function getSubVariantById($id)
  {
    $this->db->where('id', $id);
    $query = $this->db->get($this->tableSub);
    return $query;
  }

  public function editSubVariant($id, $data)
  {
    $this->db->where('id', $id);
    $query = $this->db->update($this->tableSub, $data);
    return $query;
  }

  public function deleteSubVariant($id)
  {
    $this->db->where('id', $id);
    $query = $this->db->delete($this->tableSub);
    return $query;
  }
}

/* End of file Variant_model.php */
/* Location: ./application/models/Variant_model.php */
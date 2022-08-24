<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Role_model
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

class Role_model extends CI_Model
{

  protected $table = 'tb_role';

  public function __construct()
  {
    parent::__construct();
  }

  public function getRoleAll()
  {
    $query = $this->db->get($this->table);
    return $query;
  }

  public  function getRoleById($id)
  {
    $this->db->where('id', $id);
    $query = $this->db->get($this->table);
    return $query;
  }

  public function addRole($value)
  {
    $query = $this->db->insert($this->table, $value);
    return $query;
  }

  public function deleteRole($id)
  {
    $this->db->where('id', $id);
    $query = $this->db->delete($this->table);
    return $query;
  }

  public function editRole($value, $id)
  {
    $query = $this->db->update($this->table, $value, ['id' => $id]);
    return $query;
  }
}

/* End of file Role_model.php */
/* Location: ./application/models/Role_model.php */
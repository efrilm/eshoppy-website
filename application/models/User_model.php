
<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model User_model
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

class User_model extends CI_Model
{

  protected $table = "tb_user";
  protected $email = 'email';
  protected $descOrderBy = "DESC";
  protected $idUser = 'id_user';

  public function checkEmailUser($emailUser)
  {
    $this->db->where($this->email, $emailUser);
    return $this->db->get($this->table)->row();
  }

  public function getUserById($id)
  {
    $this->db->where($this->idUser, $id);
    return $this->db->get($this->table)->row();
  }

  public function getUserByEmail($email)
  {
    $this->db->where($this->email, $email);
    return $this->db->get($this->table);
  }

  public function getUserByRole($role)
  {
    $this->db->where('role_id', $role);
    $this->db->order_by('created', 'DESC');
    return $this->db->get($this->table);
  }

  public function getUserLimit($limit)
  {
    $this->db->limit($limit);
    $this->db->join('tb_role', 'tb_role.id = tb_user.role_id', 'left');
    $this->db->order_by('created', 'DESC');
    $query = $this->db->get($this->table);
    return $query;
  }

  public function getUserActive()
  {
    $this->db->where('is_active', '1');
    $this->db->join('tb_role', 'tb_role.id = tb_user.role_id', 'left');
    $this->db->order_by('created', 'DESC');
    $query = $this->db->get($this->table);
    return $query;
  }

  public function addUser($data)
  {
    $query = $this->db->insert($this->table, $data);
    return $query;
  }

  public function deleteUserById($id)
  {
    $this->db->where('id_user', $id);
    return $this->db->delete('tb_user');
  }



  public function countUserThisMonth()
  {
    $bln = date('m');
    $query = $this->db->query("SELECT * FROM tb_user WHERE MONTH(created) = '" . $bln . "'")->num_rows();
    return $query;
  }
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
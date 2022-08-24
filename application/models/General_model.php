<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model General_model
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

class General_model extends CI_Model
{


  public function __construct()
  {
    parent::__construct();
  }

  public function getDataWhere($table, $where)
  {
    return $this->db->select()->from($table)->where($where)->get();
  }
}

/* End of file General_model.php */
/* Location: ./application/models/General_model.php */
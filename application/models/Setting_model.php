<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Setting_model
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

class Setting_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function getSetting()
  {
    $this->db->select('*');
    $this->db->from('tb_web_config');
    $this->db->where('id', 1);
    return $this->db->get()->row();
  }

  public function edit($id, $value)
  {
    $this->db->where('id', $id);
    $query =  $this->db->update('tb_web_config', $value);
    return $query;
  }
}

/* End of file Setting_model.php */
/* Location: ./application/models/Setting_model.php */
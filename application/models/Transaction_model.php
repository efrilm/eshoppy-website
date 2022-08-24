<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Transaction_model
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

class Transaction_model extends CI_Model
{

  protected $tableTrans = 'tb_transaction';
  protected $tableTransDet = 'tb_transaction_detail';

  public function addTransaction($data)
  {
    $this->db->insert($this->tableTrans, $data);
  }

  public function addTransactionDetail($data)
  {
    $this->db->insert($this->tableTransDet, $data);
  }

  public function getTransactionAll()
  {
    $query = $this->db->get($this->tableTrans);
    return $query;
  }

  public function getTransactionByStatusPaymentAndUserId($status, $idUser)
  {
    $this->db->select('*');
    $this->db->from($this->tableTrans);
    $this->db->where('status_payment', $status);
    $this->db->where('user_id', $idUser);
    $this->db->order_by('date_order', 'DESC');
    return $this->db->get();
  }

  public function getTransactionByStatusOrderAndUserId($status, $idUser)
  {
    $this->db->select('*');
    $this->db->from($this->tableTrans);
    $this->db->where('status_payment', 1);
    $this->db->where('status_order', $status);
    $this->db->where('user_id', $idUser);
    $this->db->order_by('date_order', 'DESC');
    return $this->db->get();
  }

  public function getTransactionToday()
  {
    $date = date('Y-m-d');
    $this->db->like('date_order', $date);
    $query = $this->db->get($this->tableTrans);
    return $query;
  }

  public function getTransactionByLimit($limit)
  {
    $this->db->limit($limit);
    $this->db->order_by('time_order', 'DESC');
    $this->db->order_by('date_order', 'DESC');
    $query = $this->db->get($this->tableTrans);
    return $query;
  }

  public function getTransactionByOrderId($noOrder)
  {
    $this->db->select('*');
    $this->db->from($this->tableTrans);
    $this->db->where('no_order', $noOrder);
    $query = $this->db->get();
    return $query;
  }

  public function getTransactionByStatusPayment($status)
  {
    $this->db->select('*');
    $this->db->from($this->tableTrans);
    $this->db->where('status_payment', $status);
    $this->db->order_by('date_order', 'DESC');
    return $this->db->get();
  }

  public function getTransactionByStatusOrder($status)
  {
    $this->db->from($this->tableTrans);
    $this->db->where('status_payment', 1);
    $this->db->where('status_order', $status);
    $this->db->order_by('update_date', 'DESC');
    return $this->db->get();
  }

  public function getTransactionDetailByNoOrder($noOrder)
  {
    $this->db->select('*');
    $this->db->from($this->tableTransDet);
    $this->db->join('tb_transaction', 'tb_transaction.no_order=tb_transaction_detail.no_order', 'left');
    $this->db->join('tb_product', 'tb_product.id_product=tb_transaction_detail.product_id', 'left');
    $this->db->where('tb_transaction_detail.no_order', $noOrder);
    $query = $this->db->get();
    return $query;
  }

  public function updateTransaction($orderId, $data)
  {
    $this->db->where('no_order', $orderId);
    $query = $this->db->update($this->tableTrans, $data);
    return $query;
  }
}

/* End of file Transaction_model.php */
/* Location: ./application/models/Transaction_model.php */
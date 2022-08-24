<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller User
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class User extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (empty($this->session->userdata('email'))) {
      redirect('sign-in');
    }
    $this->data['user'] = $this->user_model->getUserByEmail($this->session->userdata('email'))->row();
  }

  public function getAdmin($action = '', $id = '')
  {

    $this->form_validation->set_rules('first_name', elang('First Name'), 'required', [
      'required' => '%s ' . elang('Required') . '*',
    ]);

    $this->form_validation->set_rules('last_name', elang('Last Name'), 'required', [
      'required' => '%s ' . elang('Required') . '*',
    ]);

    $this->form_validation->set_rules('email', "Email", 'required|trim|valid_email|is_unique[tb_user.email]', [
      'required' => '%s ' . elang('Required') . '*',
      'is_unique' =>   elang('Email already registered'),
      'valid_email' =>  elang('The email field must contain a valid email address'),
    ]);

    $this->form_validation->set_rules('password', elang('Password'), 'required|min_length[8]', [
      'required' => '%s ' . elang('Required') . '*',
    ]);

    if ($this->form_validation->run() == FALSE) {
      $this->data['title'] = elang('Data Admininistration');
      $this->data['admin'] =  $this->user_model->getUserByRole('2')->result();
      $this->data['action'] =  $action;
      $this->template->load('admin/template', 'admin/user/admin', $this->data);
    } else {
      if ($action == 'add') {
        $first_name = htmlspecialchars($this->input->post('first_name', TRUE));
        $last_name = htmlspecialchars($this->input->post('last_name', TRUE));
        $email = htmlspecialchars($this->input->post('email', TRUE));
        $password = password_verify($this->input->post('password', TRUE), PASSWORD_BCRYPT);
        $data = [
          'first_name' => $first_name,
          'last_name' => $last_name,
          'email' => $email,
          'password' => $password,
          'image' => 'default.png',
          'role_id' => '2',
          'is_active' => '1',
          'created' => date('Y-m-d H:i:s'),
          'date_created' => date('Y-m-d'),
        ];
        $this->user_model->addUser($data);
        $msg = elang('Added Successfully');
        $this->session->set_flashdata('message', "<div class='alert alert-success' role='alert' >" . $msg . "!</div>");
        redirect('get-administration');
      }
    }
  }

  public function role($action = '',  $id = '')
  {

    $this->form_validation->set_rules('role_name', 'Role', 'required', [
      'required' => "%s" . elang("Required") . "",
    ]);

    if ($this->form_validation->run() == FALSE) {
      $this->data['title'] =  elang('Role');
      $this->data['action'] = $action;
      $this->data['role'] = $this->role_model->getRoleAll()->result();

      if ($action == 'edit' && $id !== '') {
        $this->data['eRole'] = $this->role_model->getRoleById($id)->row();
      }

      $this->template->load('admin/template', 'admin/user/role', $this->data);
    } else {
      if ($action == "add") {
        $role_name = htmlspecialchars($this->input->post('role_name', true));
        $data = [
          'role' => $role_name,
        ];

        $this->role_model->addRole($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        ' . elang('Added Successfully') . '!</div>');
        redirect('role');
      } else if ($action == "edit") {
        $role_name = htmlspecialchars($this->input->post('role_name', TRUE));
        $data = [
          'role' => $role_name,
        ];
        $this->role_model->editRole($data, $id);
        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
        ' . elang('Edited Successfully') . '!</div>');
        redirect('role');
      }
    }
  }

  public function customer($action = '', $id = '')
  {
    // SET RULES FORM VALIDATION  
    $this->form_validation->set_rules('first_name', elang('First Name'), 'required|trim', [
      "required" => "%s " . elang('Required')   . "",
    ]);

    $this->form_validation->set_rules('last_name', elang('Last Name'), 'required', [
      "required" => "%s " . elang('Required')   . "",
    ]);
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
      'is_unique' => elang('Email already registered'),
      'valid_email' => elang('The Email field must contain a valid email address'),
      "required" => "%s " . elang('Required') . "",
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
      'min_length' => elang('Password must be a minimum of 8 characters length'),
      "required" => "%s " . elang('Required') . "",
    ]);

    if ($this->form_validation->run() == false) {
      $this->data['title'] = elang('Customer');

      $this->data['action'] = $action;
      if ($action == 'edit' && $id != '') {
        $this->data['cust'] = $this->user_model->getUserById($id);
      }
      $this->data['customer'] = $this->user_model->getUserByRole('1')->result();
      $this->template->load('admin/template', 'admin/user/customer', $this->data);
    } else {
      if ($action == "add") {
        $first_name = htmlspecialchars($this->input->post('first_name', true));
        $last_name = htmlspecialchars($this->input->post('last_name', true));
        $email = htmlspecialchars($this->input->post('email', true));
        $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        $data = [
          'first_name' => $first_name,
          'last_name' => $last_name,
          'email' => $email,
          'image' => 'default.png',
          'password' => $password,
          'role_id' => '1',
          'is_active' => '1',
          'created' => date("Y-m-d H:i:s"),
          'date_created' => date('Y-m-d'),
        ];

        $this->db->insert('tb_user', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        ' . elang('Added Successfully') . '!</div>');
        redirect('customer');
      }
    }
  }

  public function deleteCustomer($id)
  {
    $this->user_model->deleteUserById($id);
    $msg = elang('Deleted Successfully');
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    ' . $msg . '!</div>');
    redirect('customer');
  }

  public function deleteRole($id)
  {
    $this->role_model->deleteRole($id);
    $msg = elang('Deleted Successfully');
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    ' . $msg . '!</div>');
    redirect('role');
  }
}


/* End of file User.php */
/* Location: ./application/controllers/User.php */
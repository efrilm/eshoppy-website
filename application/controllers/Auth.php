<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Auth
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

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function signIn()
  {

    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'password', 'required|trim');


    if ($this->form_validation->run() == false) {
      $this->data['title'] = elang('Sign In');
      $this->template->load('auth/template', 'auth/sign_in', $this->data);
    } else {

      // Validasi Success

      $this->_login();
    }
  }

  private function _login()
  {
    $email =  $this->input->post('email');
    $password = $this->input->post('password');


    $user = $this->db->get_where('tb_user', ['email' => $email])->row();
    // if user already
    if ($user) {

      // if user active
      if ($user->is_active == 1) {
        if (password_verify($password, $user->password)) {
          $data = [
            'id_user' => $user->id_user,
            'email' => $user->email,
            'role_id' => $user->role_id,
          ];
          $this->session->set_userdata($data);
          if ($user->role_id == 2) {
            redirect('admin/dashboard');
          } else {  
            redirect('/');
          }
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          Wrong Password!
          </div>');
          redirect('sign-in');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        This email has not been actived
        </div>');
        redirect('sign-in');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
      Email Not Registered
      </div>');
      redirect('sign-in');
    }
  }

  public function registration()
  {

    $this->form_validation->set_rules('first_name', elang('First Name'), 'required|trim', [
      "required" => "%s " . elang('Required')   . "",
    ]);
    $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim', [
      "required" => "%s " . elang('Required') . "",
    ]);
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
      'is_unique' => elang('Email already registered'),
      'valid_email' => elang('The Email field must contain a valid email address'),
      "required" => "%s " . elang('Required') . "",
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[confirm_password]', [
      'matches' => elang('Passwords are not the same'),
      'min_length' => elang('Password must be a minimum of 8 characters length'),
      "required" => "%s " . elang('Required') . "*",
    ]);
    $this->form_validation->set_rules('confirm_password', 'Password', 'required|trim|min_length[8]|matches[password]', [
      'matches' => elang('Passwords are not the same'),
      'min_length' => elang('Password must be a minimum of 8 characters length'),
      "required" => "%s " . elang('Required') . "*",
    ]);

    if ($this->form_validation->run() == false) {
      $this->data['title'] = elang("Sign Up");
      $this->template->load('auth/template', 'auth/sign_up', $this->data);
    } else {
      $data = [
        'first_name' => htmlspecialchars($this->input->post('first_name', true)),
        'last_name' => htmlspecialchars($this->input->post('last_name', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'image' => 'default.png',
        'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
        'role_id' => '2',
        'is_active' => '1',
        'created' => date('Y-m-d H:i:s'),
        'date_created' => date('Y-m-d'),
      ];

      $this->db->insert('tb_user', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
      Sign Up Berhasil!
      </div>');
      redirect('sign-in');
    }
  }
  public function logout()
  {
    $this->session->unset_userdata('id_user');
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  You have been logged!
  </div>');
    redirect('sign-in');
  }
}




/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
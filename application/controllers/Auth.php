<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('AdminModel');
    }
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function index()
    {
        $this->load->view('auth/login');
    }

    public function prosesLogin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $query = $this->AuthModel->cek_user($email);
        //jika usernya ada
        if ($query) {
            //jika usernya aktif
            if ($query['is_active'] == 1) {
                //cek password
                if (password_verify($password, $query['password'])) {
                    $id_karyawan = $query['id_karyawan'];

                    $database = 'karyawan';
                    $id['id_karyawan'] = $id_karyawan;

                    $karyawan = $this->AdminModel->cekData($database, $id);
                    $data = [
                        'email' => $query['email'],
                        'foto' => $query['foto'],
                        'id_karyawan' => $query['id_karyawan'],
                        'no_telp' => $query['no_telp'],
                        'role' => $query['role'],
                        'id_user' => $query['id_user'],
                        'nama_karyawan' => $karyawan['nama_karyawan'],
                        'is_login' => TRUE,
                    ];
                    $this->session->set_userdata($data);
                    if ($query['role'] == 'Admin') {
                        $this->session->set_flashdata('success', 'Anda Berhasil Login!');
                        redirect('admin');
                    } elseif ($query['role'] == 'HO') {
                        $this->session->set_flashdata('success', 'Anda Berhasil Login!');
                        redirect('ho');
                    } else {
                        $this->session->unset_userdata('email');
                        $this->session->unset_userdata('foto');
                        $this->session->unset_userdata('id_karyawan');
                        $this->session->unset_userdata('id_user');
                        $this->session->unset_userdata('no_telp');
                        $this->session->unset_userdata('role');
                        $this->session->unset_userdata('nama_karyawan');
                        $this->session->sess_destroy();
                        session_destroy();
                        redirect('/');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Wrong Password!');
                    redirect('/');
                }
            } else {
                $this->session->set_flashdata('error', 'Email is Not Been Activated!');
                redirect('/');
            }
        } else {
            $this->session->set_flashdata('error', 'Email is Not Registered');
            redirect('/');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('foto');
        $this->session->unset_userdata('id_karyawan');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('no_telp');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('nama_karyawan');
        $this->session->sess_destroy();
        session_destroy();
        $this->session->set_flashdata('success', 'Terimakasih Telah Menggunakan Aplikasi Ini');
        redirect('/');
    }
}

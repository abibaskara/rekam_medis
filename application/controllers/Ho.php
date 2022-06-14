<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ho extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('AdminModel');
        $this->AuthModel->cekLoginHo();
    }

    public function index()
    {
        $data = [
            'kunjungan_berobat' => $this->AdminModel->countKunjunganBerobat(),
            'mcu' => $this->AdminModel->countMCU(),
            'skd' => $this->AdminModel->countSKD(),
        ];
        $this->template->load('layout/layout', 'ho/dashboard', $data);
    }

    // ############################LAPORAN REKAM MEDIS############################ //

    public function Laporan_Rekam_Medis()
    {
        $database = "karyawan";
        $data = [
            'data_karyawan' => $this->AdminModel->getData($database),
        ];
        $this->template->load('layout/layout', 'ho/laporan_rekam_medis', $data);
    }

    public function get_laporan_rekam_medis()
    {
        $database = "skd";
        $database2 = "mcu";
        $database3 = "kunjungan_berobat";
        $id_karyawan['id_karyawan']   = $this->input->get('id_karyawan');
        $id = $this->input->get('id_karyawan');
        $tgl_awal = date('Y-m-d', strtotime($this->input->get('tgl_awal')));
        $tgl_akhir = date('Y-m-d', strtotime($this->input->get('tgl_akhir')));
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            $skd = $this->AdminModel->get_laporan_skd($database, $id, $tgl_awal, $tgl_akhir);
            $mcu = $this->AdminModel->get_laporan_mcu($database2, $id, $tgl_awal, $tgl_akhir);
            $kunjungan_berobat = $this->AdminModel->get_laporan_kunjungan_berobat($database3, $id, $tgl_awal, $tgl_akhir);
            $this->result['status'] = true;
            $this->result['database'] = $database;
            $this->result['skd'] = $skd->result();
            $this->result['mcu'] = $mcu->result();
            $this->result['kunjungan_berobat'] = $kunjungan_berobat->result();
            echo json_encode($this->result);
        }
    }

    // ############################LAPORAN KUNJUNGAN PASIEN############################ //

    public function Laporan_Kunjungan_Pasien()
    {
        $database = "karyawan";
        $data = [
            'data_karyawan' => $this->AdminModel->getData($database),
        ];
        $this->template->load('layout/layout', 'ho/laporan_kunjungan_pasien', $data);
    }

    public function get_laporan_kunjungan_pasien()
    {
        $database = "kunjungan_berobat";
        $id_karyawan['id_karyawan']   = $this->input->get('id_karyawan');
        $id = $this->input->get('id_karyawan');
        $tgl_awal = date('Y-m-d', strtotime($this->input->get('tgl_awal')));
        $tgl_akhir = date('Y-m-d', strtotime($this->input->get('tgl_akhir')));
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            $kunjungan_berobat = $this->AdminModel->get_laporan_kunjungan_berobat($database, $id, $tgl_awal, $tgl_akhir);
            $this->result['status'] = true;
            $this->result['database'] = $database;
            $this->result['kunjungan_berobat'] = $kunjungan_berobat->result();
            echo json_encode($this->result);
        }
    }

    // ############################LAPORAN MCU############################ //

    public function Laporan_Medical_Check_Up()
    {
        $database = "karyawan";
        $data = [
            'data_karyawan' => $this->AdminModel->getData($database),
        ];
        $this->template->load('layout/layout', 'ho/laporan_mcu', $data);
    }

    public function get_laporan_mcu()
    {
        $database = "mcu";
        $id_karyawan['id_karyawan']   = $this->input->get('id_karyawan');
        $id = $this->input->get('id_karyawan');
        $tgl_awal = date('Y-m-d', strtotime($this->input->get('tgl_awal')));
        $tgl_akhir = date('Y-m-d', strtotime($this->input->get('tgl_akhir')));
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            $mcu = $this->AdminModel->get_laporan_mcu($database, $id, $tgl_awal, $tgl_akhir);
            $this->result['status'] = true;
            $this->result['database'] = $database;
            $this->result['mcu'] = $mcu->result();
            echo json_encode($this->result);
        }
    }

    // ############################PROFILE############################ //
    public function Profile()
    {
        $database = "karyawan";
        $id['id_karyawan'] = $_SESSION['id_karyawan'];

        $data = [
            'profile' => $this->AdminModel->cekData($database, $id)
        ];
        $this->template->load('layout/layout', 'ho/profile', $data);
    }

    public function updateProfile()
    {
        $database = "karyawan";
        $id['id_karyawan'] = $this->input->post('id');

        try {
            $data = [
                'jk' => $this->input->post('jk'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => date('Y-m-d', strtotime($this->input->post('tgl_lahir'))),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
            ];

            $this->AdminModel->updateData($database, $data, $id);
            $this->session->set_flashdata('success', 'Profile Anda Berhasil Diupdate!');
            redirect('Ho/Profile');
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Profile Anda Gagal Diupdate!');
            redirect('Ho/Profile');
        }
    }

    // ############################SETTING############################ //

    public function Setting()
    {
        $database = "karyawan";
        $id['id_karyawan'] = $_SESSION['id_karyawan'];

        $data = [
            'profile' => $this->AdminModel->cekData($database, $id)
        ];
        $this->template->load('layout/layout', 'ho/setting', $data);
    }

    public function updateSetting()
    {
        $database = "user";
        $id['id_user'] = $this->input->post('id');
        $foto = $_FILES['foto']['name'];
        $old_foto = $this->input->post('old_foto');
        $password = $this->input->post('password');
        try {
            $data = [
                'role' => $this->input->post('role'),
                'email' => $this->input->post('email'),
                'no_telp' => $this->input->post('no_telp'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];
            if ($foto) {

                $config['upload_path'] = './assets/profile/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto')) {
                    $this->session->set_flashdata('error', 'Gagal Mengupload Foto!');
                    redirect('Ho/tambahUser');
                } else {
                    if ($password != "") {
                        $data = [
                            'role' => $this->input->post('role'),
                            'email' => $this->input->post('email'),
                            'no_telp' => $this->input->post('no_telp'),
                            'password' => password_hash($password, PASSWORD_DEFAULT),
                            'foto' => $this->upload->data('file_name'),
                        ];
                    } else {
                        $data = [
                            'role' => $this->input->post('role'),
                            'email' => $this->input->post('email'),
                            'no_telp' => $this->input->post('no_telp'),
                            'foto' => $this->upload->data('file_name'),
                        ];
                    }
                }
                if ($old_foto == "default.png") {
                    $this->AdminModel->updateData($database, $data, $id);
                } else {
                    unlink('./assets/profile/' . $old_foto);
                    $this->AdminModel->updateData($database, $data, $id);
                }
                $this->session->set_flashdata('success', 'Berhasil Update Setting!');
                redirect('Ho/Setting');
            } else {
                if ($password != "") {
                    $data = [
                        'role' => $this->input->post('role'),
                        'email' => $this->input->post('email'),
                        'no_telp' => $this->input->post('no_telp'),
                        'password' => password_hash($password, PASSWORD_DEFAULT),
                    ];
                } else {
                    $data = [
                        'role' => $this->input->post('role'),
                        'email' => $this->input->post('email'),
                        'no_telp' => $this->input->post('no_telp'),
                    ];
                }
                $this->AdminModel->updateData($database, $data, $id);
                $this->session->set_flashdata('success', 'Berhasil Update Setting!');
                redirect('Ho/Setting');
            }
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Gagal Update Setting!');
            redirect('Ho/Setting');
        }
    }

    // ############################ ############################ //

    public function get_header_print()
    {
        $database = $this->input->get('database');
        $database2 = "karyawan";
        $id_karyawan['id_karyawan']   = $this->input->get('id_karyawan');
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            $preview = $this->AdminModel->getWhere($database2, $id_karyawan);
            if ($preview) {
                $this->result['status'] = true;
                $this->result['database'] = $database;
                $this->result['data'] = $preview->row_array();
            };
            echo json_encode($this->result);
        }
    }

    public function get_karyawan()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            $id_karyawan   = $this->input->get('id_karyawan');
            $karyawan  = $this->AdminModel->get_karyawan($id_karyawan);
            if ($karyawan) {
                $this->result['status'] = true;
                $this->result['data']   = $karyawan->row_array();
            };
            echo json_encode($this->result);
        };
    }
}

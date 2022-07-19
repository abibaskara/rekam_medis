<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('AdminModel');
        $this->AuthModel->cekLoginAdmin();
    }

    public function index()
    {
        $data = [
            'kunjungan_berobat' => $this->AdminModel->countKunjunganBerobat(),
            'mcu' => $this->AdminModel->countMCU(),
            'skd' => $this->AdminModel->countSKD(),
        ];
        $this->template->load('layout/layout', 'admin/dashboard', $data);
    }

    // ############################JABATAN############################ //
    public function Jabatan()
    {
        $database = "jabatan";
        $data = [
            'jabatan' => $this->AdminModel->getData($database),
        ];
        $this->template->load('layout/layout', 'admin/jabatan', $data);
    }

    public function tambahJabatan()
    {
        $database = "jabatan";
        $this->form_validation->set_rules('nama_jabatan', 'nama_jabatan', 'trim|required|min_length[1]|max_length[30]');

        $nama_jabatan = $this->input->post('nama_jabatan');

        $data = [
            'nama_jabatan' => $nama_jabatan,
        ];
        $cek = $this->AdminModel->cekData($database, $data);


        if (empty($cek)) {
            try {
                $this->AdminModel->createData($database, $data);
                $this->session->set_flashdata('success', 'Jabatan Baru Berhasil Ditambahkan!');
                redirect('Admin/Jabatan');
            } catch (\Exception $e) {
                $this->session->set_flashdata('error', 'Gagal Menambahkan Jabatan!');
                redirect('Admin/Jabatan');
            }
        } else {
            $this->session->set_flashdata('info', 'Nama Jabatan Sudah Ada!');
            redirect('Admin/Jabatan');
        }
    }

    public function editJabatan()
    {
        $database = "jabatan";
        $id['id_jabatan'] = $this->input->post('id');
        $nama_jabatan = $this->input->post('nama_jabatan');

        try {
            $data = [
                'nama_jabatan' => $nama_jabatan,
            ];
            $this->AdminModel->updateData($database, $data, $id);
            $this->session->set_flashdata('success', 'Data Jabatan Berhasil Diubah!');
            redirect('Admin/Jabatan');
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Gagal Mengubah Data Jabatan!');
            redirect('Admin/Jabatan');
        }
    }

    public function deleteJabatan()
    {
        $database = "jabatan";
        $id['id_jabatan'] = $this->input->post('id');
        try {
            $this->AdminModel->deleteData($database, $id);
            $this->session->set_flashdata('success', 'Data Jabatan Berhasil Dihapus!');
            redirect('Admin/Jabatan');
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Gagal Menghapus Data Jabatan!');
            redirect('Admin/Jabatan');
        }
    }

    // ############################DEPARTEMENT############################ //

    public function Departement()
    {
        $database = "departement";
        $data = [
            'departement' => $this->AdminModel->getData($database),
        ];
        $this->template->load('layout/layout', 'admin/departement', $data);
    }

    public function tambahDepartement()
    {
        $database = "departement";
        $this->form_validation->set_rules('nama_departement', 'nama_departement', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('divisi', 'divisi', 'trim|required|min_length[1]|max_length[30]');

        $nama_departement = $this->input->post('nama_departement');
        $divisi = $this->input->post('divisi');
        $data = [
            'nama_departement' => $nama_departement,
        ];
        $cek = $this->AdminModel->cekData($database, $data);

        if (empty($cek)) {
            try {
                $data = [
                    'nama_departement' => $nama_departement,
                    'divisi' => $divisi,
                ];
                $this->AdminModel->createData($database, $data);
                $this->session->set_flashdata('success', 'Departement Baru Berhasil Ditambahkan!');
                redirect('Admin/Departement');
            } catch (\Exception $e) {
                $this->session->set_flashdata('error', 'Gagal Menambahkan Departement!');
                redirect('Admin/Departement');
            }
        } else {
            $this->session->set_flashdata('info', 'Nama Departement Sudah Ada!');
            redirect('Admin/Departement');
        }
    }

    public function editDepartement()
    {
        $database = "departement";
        $id['id_departement'] = $this->input->post('id');
        $nama_departement = $this->input->post('nama_departement');
        $divisi = $this->input->post('divisi');

        try {
            $data = [
                'nama_departement' => $nama_departement,
                'divisi' => $divisi,
            ];
            $this->AdminModel->updateData($database, $data, $id);
            $this->session->set_flashdata('success', 'Data Departement Berhasil Diubah!');
            redirect('Admin/Departement');
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Gagal Mengubah Data Departement!');
            redirect('Admin/Departement');
        }
    }

    public function deleteDepartement()
    {
        $database = "departement";
        $id['id_departement'] = $this->input->post('id');
        try {
            $this->AdminModel->deleteData($database, $id);
            $this->session->set_flashdata('success', 'Data Departement Berhasil Dihapus!');
            redirect('Admin/Departement');
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Gagal Menghapus Data Departement!');
            redirect('Admin/Departement');
        }
    }

    // ############################KARYAWAN############################ //

    public function Karyawan()
    {
        $database = "karyawan";
        $database2 = "jabatan";
        $database3 = "departement";
        $join1 = "jabatan.id_jabatan=karyawan.id_jabatan";
        $join2 = "departement.id_departement=karyawan.id_departement";

        $data = [
            'karyawan' => $this->AdminModel->doubleJoin($database, $database2, $database3, $join1, $join2),
            'jabatan' => $this->AdminModel->getData($database2),
            'departement' => $this->AdminModel->getData($database3),
        ];
        $this->template->load('layout/layout', 'admin/karyawan', $data);
    }

    public function tambahKaryawan()
    {
        $database = "karyawan";
        $this->form_validation->set_rules('nik', 'nik', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('nama_karyawan', 'nama_karyawan', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('id_jabatan', 'id_jabatan', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('id_departement', 'id_departement', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('jk', 'jk', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'divisi', 'trim|required|min_length[1]|max_length[30]');

        $nik = $this->input->post('nik');
        $nama_karyawan = $this->input->post('nama_karyawan');
        $id_jabatan = $this->input->post('id_jabatan');
        $id_departement = $this->input->post('id_departement');
        $jk = $this->input->post('jk');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir =  date('Y-m-d', strtotime($this->input->post('tgl_lahir')));
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');
        $data = [
            'nik' => $nik,
        ];
        $cek = $this->AdminModel->cekData($database, $data);
        if (empty($cek)) {
            try {
                $data = [
                    'nik' => $nik,
                    'nama_karyawan' => $nama_karyawan,
                    'id_jabatan' => $id_jabatan,
                    'id_departement' => $id_departement,
                    'jk' => $jk,
                    'tempat_lahir' => $tempat_lahir,
                    'tgl_lahir' => $tgl_lahir,
                    'alamat' => $alamat,
                    'no_hp' => $no_hp,
                ];
                $this->AdminModel->createData($database, $data);
                $this->session->set_flashdata('success', 'Karyawan Baru Berhasil Ditambahkan!');
                redirect('Admin/Karyawan');
            } catch (\Exception $e) {
                $this->session->set_flashdata('error', 'Gagal Menambahkan Data Karyawan!');
                redirect('Admin/Karyawan');
            }
        } else {
            $this->session->set_flashdata('info', 'NIK Karyawan Sudah Ada!');
            redirect('Admin/Karyawan');
        }
    }

    public function editKaryawan()
    {
        $database = "karyawan";
        $id['id_karyawan'] = $this->input->post('id');

        $nik = $this->input->post('nik');
        $nama_karyawan = $this->input->post('nama_karyawan');
        $id_jabatan = $this->input->post('id_jabatan');
        $id_departement = $this->input->post('id_departement');
        $jk = $this->input->post('jk');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir =  date('Y-m-d', strtotime($this->input->post('tgl_lahir')));
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');

        try {
            $data = [
                'nik' => $nik,
                'nama_karyawan' => $nama_karyawan,
                'id_jabatan' => $id_jabatan,
                'id_departement' => $id_departement,
                'jk' => $jk,
                'tempat_lahir' => $tempat_lahir,
                'tgl_lahir' => $tgl_lahir,
                'alamat' => $alamat,
                'no_hp' => $no_hp,
            ];
            $this->AdminModel->updateData($database, $data, $id);
            $this->session->set_flashdata('success', 'Data Karyawan Berhasil Diubah!');
            redirect('Admin/Karyawan');
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Gagal Mengubah Data Karyawan!');
            redirect('Admin/Karyawan');
        }
    }

    public function deleteKaryawan()
    {
        $database = "karyawan";
        $id['id_karyawan'] = $this->input->post('id');
        try {
            $this->AdminModel->deleteData($database, $id);
            $this->session->set_flashdata('success', 'Data Karyawan Berhasil Dihapus!');
            redirect('Admin/Karyawan');
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Gagal Menghapus Data Karyawan!');
            redirect('Admin/Karyawan');
        }
    }

    // ############################USER############################ //

    public function User()
    {
        $database = "user";
        $database2 = "karyawan";
        $database3 = "jabatan";
        $database4 = "departement";
        $join1 = "karyawan.id_karyawan = user.id_karyawan";
        $join2 = "jabatan.id_jabatan = karyawan.id_jabatan";
        $join3 = "departement.id_departement = karyawan.id_departement";
        $data = [
            "user" => $this->AdminModel->tripleJoin($database, $database2, $database3, $database4, $join1, $join2, $join3),
        ];
        $this->template->load('layout/layout', 'admin/user', $data);
    }

    public function tambahUser()
    {
        $database = "karyawan";
        $data = [
            "karyawan" => $this->AdminModel->getData($database),
        ];
        $this->template->load('layout/layout', 'admin/tambah_user', $data);
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

    public function simpanUser()
    {
        $database = "user";
        $this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('role', 'role', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('no_telp', 'no_telp', 'trim|required|min_length[1]|max_length[12]');

        $id_karyawan = $this->input->post('id_karyawan');
        $role = $this->input->post('role');
        $email = $this->input->post('email');
        $no_telp = $this->input->post('no_telp');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $foto = $_FILES['foto']['name'];
        $data = [
            'id_karyawan' => $id_karyawan,
        ];
        $cek = $this->AdminModel->cekData($database, $data);

        $data = [
            'email' => $email,
        ];
        $cekEmail = $this->AdminModel->cekData($database, $data);

        if (empty($cek)) {
            try {
                if (empty($cekEmail)) {
                    if ($foto) {
                        $config['upload_path'] = './assets/profile/';
                        $config['allowed_types'] = 'jpg|png|jpeg';
                        $config['encrypt_name'] = true;

                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('foto')) {
                            $this->session->set_flashdata('error', 'Gagal Mengupload Foto!');
                            redirect('Admin/tambahUser');
                        } else {
                            $data = [
                                'id_karyawan' => $id_karyawan,
                                'role' => $role,
                                'email' => $email,
                                'no_telp' => $no_telp,
                                'password' => $password,
                                'foto' => $this->upload->data('file_name'),
                            ];

                            $this->AdminModel->createData($database, $data);
                            $this->session->set_flashdata('success', 'Berhasil Menambahkan User!');
                            redirect('Admin/User');
                        }
                    } else {
                        $data = [
                            'id_karyawan' => $id_karyawan,
                            'role' => $role,
                            'email' => $email,
                            'no_telp' => $no_telp,
                            'password' => $password,
                        ];
                        $this->AdminModel->createData($database, $data);
                        $this->session->set_flashdata('success', 'Berhasil Menambahkan User!');
                        redirect('Admin/User');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Email Sudah Terdaftar!');
                    redirect('Admin/tambahUser');
                }
            } catch (\Exception $e) {
                $this->session->set_flashdata('error', 'Gagal Menambahkan User!');
                redirect('Admin/User');
            }
        } else {
            $this->session->set_flashdata('error', 'Data User Sudah Terdaftar!');
            redirect('Admin/tambahUser');
        }
    }

    public function deleteUser()
    {
        $database = "user";
        $id['id_user'] = $this->input->post('id');
        $foto = $this->input->post('foto');
        try {
            if ($foto == "default.png") {
                $this->AdminModel->deleteData($database, $id);
            } else {
                unlink('./assets/profile/' . $foto);
                $this->AdminModel->deleteData($database, $id);
            }
            $this->session->set_flashdata('success', 'Data User Berhasil Dihapus!');
            redirect('Admin/User');
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Gagal Menghapus Data User!');
            redirect('Admin/User');
        }
    }

    public function editUser($id)
    {
        $data =  [
            'user' => $this->AdminModel->get_user($id),
        ];
        $this->template->load('layout/layout', 'admin/edit_user', $data);
    }

    public function updateUser()
    {
        $database = "user";

        $id['id_user'] = $this->input->post('id');
        $old_foto = $this->input->post('old_foto');
        $role = $this->input->post('role');
        $email = $this->input->post('email');
        $no_telp = $this->input->post('no_telp');
        $password = $this->input->post('password');
        $foto = $_FILES['foto']['name'];

        try {
            if ($foto) {
                if ($old_foto == 'default.png') {
                    $config['upload_path'] = './assets/profile/';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['encrypt_name'] = true;

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('foto')) {
                        $this->session->set_flashdata('error', 'Gagal Mengupload Foto!');
                        redirect('Admin/tambahUser');
                    } else {
                        $data = [
                            'role' => $role,
                            'email' => $email,
                            'no_telp' => $no_telp,
                            'foto' => $this->upload->data('file_name'),
                        ];
                        $this->AdminModel->updateData($database, $data, $id);
                    }
                } else {
                    unlink('./assets/profile/' . $old_foto);
                    $config['upload_path'] = './assets/profile/';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['encrypt_name'] = true;

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('foto')) {
                        $this->session->set_flashdata('error', 'Gagal Mengupload Foto!');
                        redirect('Admin/tambahUser');
                    } else {
                        $data = [
                            'role' => $role,
                            'email' => $email,
                            'no_telp' => $no_telp,
                            'foto' => $this->upload->data('file_name'),
                        ];
                        $this->AdminModel->updateData($database, $data, $id);
                    }
                }
            } else {
                $data = [
                    'role' => $role,
                    'email' => $email,
                    'no_telp' => $no_telp,
                ];
                $this->AdminModel->updateData($database, $data, $id);
            }
            if ($password != "") {
                $data = [
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                ];
                $this->AdminModel->updateData($database, $data, $id);
            }

            $this->session->set_flashdata('success', 'Berhasil Mengupdate User!');
            redirect('Admin/User');
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Gagal Mengupdate User!');
            redirect('Admin/User');
        }
    }
    // ############################KATEGORI OBAT############################ //

    public function KategoriObat()
    {
        $database = "kategori_obat";
        $data = [
            'kategori_obat' => $this->AdminModel->getData($database),
        ];
        $this->template->load('layout/layout', 'admin/kategori_obat', $data);
    }

    public function tambahKategoriObat()
    {
        $database = "kategori_obat";
        $this->form_validation->set_rules('nama_kategori', 'nama_kategori', 'trim|required|min_length[1]|max_length[30]');

        $nama_kategori = $this->input->post('nama_kategori');
        $data = [
            'nama_kategori' => $nama_kategori,
        ];
        $cek = $this->AdminModel->cekData($database, $data);


        if (empty($cek)) {
            try {
                $data = [
                    'nama_kategori' => $nama_kategori,
                ];
                $this->AdminModel->createData($database, $data);
                $this->session->set_flashdata('success', 'Kategori Obat Baru Berhasil Ditambahkan!');
                redirect('Admin/KategoriObat');
            } catch (\Exception $e) {
                $this->session->set_flashdata('error', 'Gagal Menambahkan Kategori Obat!');
                redirect('Admin/KategoriObat');
            }
        } else {
            $this->session->set_flashdata('info', 'Nama Kategori Obat Sudah Ada!');
            redirect('Admin/KategoriObat');
        }
    }

    public function editKategoriObat()
    {
        $database = "kategori_obat";
        $id['id_kategori_obat'] = $this->input->post('id');
        $nama_kategori = $this->input->post('nama_kategori');

        try {
            $data = [
                'nama_kategori' => $nama_kategori,
            ];
            $this->AdminModel->updateData($database, $data, $id);
            $this->session->set_flashdata('success', 'Data Kategori Obat Berhasil Diubah!');
            redirect('Admin/KategoriObat');
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Gagal Mengubah Data Kategori Obat!');
            redirect('Admin/KategoriObat');
        }
    }

    public function deleteKategoriObat()
    {
        $database = "kategori_obat";
        $id['id_kategori_obat'] = $this->input->post('id');
        try {
            $this->AdminModel->deleteData($database, $id);
            $this->session->set_flashdata('success', 'Data Kategori Obat Berhasil Dihapus!');
            redirect('Admin/KategoriObat');
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Gagal Menghapus Data Kategori Obat!');
            redirect('Admin/KategoriObat');
        }
    }

    // ############################OBAT ############################ //

    public function Obat()
    {
        $database = "obat";
        $database2 = "kategori_obat";

        $join = "kategori_obat.id_kategori_obat = obat.id_kategori_obat";

        $data = [
            'obat' => $this->AdminModel->join($database, $database2, $join),
            'kategori' => $this->AdminModel->getData($database2),
        ];
        $this->template->load('layout/layout', 'admin/obat', $data);
    }

    public function tambahObat()
    {
        $database = "obat";

        $this->form_validation->set_rules('id_kategori_obat', 'id_kategori_obat', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('nama_obat', 'nama_obat', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('kegunaan_obat', 'kegunaan_obat', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('qty', 'qty', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('satuan', 'satuan', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('expired_date', 'expired_date', 'trim|required|min_length[1]|max_length[30]');

        $id_kategori_obat = $this->input->post('id_kategori_obat');
        $nama_obat = $this->input->post('nama_obat');
        $kegunaan_obat = $this->input->post('kegunaan_obat');
        $qty = $this->input->post('qty');
        $satuan = $this->input->post('satuan');
        $expired_date = date('Y-m-d', strtotime($this->input->post('expired_date')));

        $data = [
            'nama_obat' => $nama_obat,
        ];
        $cek = $this->AdminModel->cekData($database, $data);

        if (empty($cek)) {
            try {
                $data = [
                    'id_kategori_obat' => $id_kategori_obat,
                    'nama_obat' => $nama_obat,
                    'kegunaan_obat' => $kegunaan_obat,
                    'qty' => $qty,
                    'satuan' => $satuan,
                    'expired_date' => $expired_date,
                ];

                $this->AdminModel->createData($database, $data);
                $this->session->set_flashdata('success', 'Data Obat Berhasil Ditambahkan!');
                redirect('Admin/Obat');
            } catch (\Exception $e) {
                $this->session->set_flashdata('error', 'Gagal Menambahkan Data Obat!');
                redirect('Admin/Obat');
            }
        } else {
            $this->session->set_flashdata('error', 'Data Obat Sudah Ada!');
            redirect('Admin/Obat');
        }
    }

    public function editObat()
    {
        $database = "obat";
        $id['id_obat'] = $this->input->post('id');

        try {
            $data = [
                'id_kategori_obat' => $this->input->post('id_kategori_obat'),
                'nama_obat' => $this->input->post('nama_obat'),
                'kegunaan_obat' => $this->input->post('kegunaan_obat'),
                'qty' => $this->input->post('qty'),
                'satuan' => $this->input->post('satuan'),
                'expired_date' => date('Y-m-d', strtotime($this->input->post('expired_date'))),
            ];
            $this->AdminModel->updateData($database, $data, $id);
            $this->session->set_flashdata('success', 'Data Obat Berhasil Diubah!');
            redirect('Admin/Obat');
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Gagal Obat Berhasil Diubah!');
            redirect('Admin/Obat');
        }
    }

    public function deleteObat()
    {
        $database = "obat";
        $id['id_obat'] = $this->input->post('id');

        try {
            $this->AdminModel->deleteData($database, $id);
            $this->session->set_flashdata('success', 'Data Obat Berhasil Dihapus!');
            redirect('Admin/Obat');
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Gagal Menghapus Data Obat!');
            redirect('Admin/Obat');
        }
    }

    // ############################KUNJUNGAN BEROBAT PASIEN############################ //

    public function Data_Kunjungan_Berobat()
    {
        $database = "kunjungan_berobat";
        $data = [
            'kunjungan_berobat' => $this->AdminModel->getData($database),
        ];
        $this->template->load('layout/layout', 'admin/kunjungan_berobat', $data);
    }

    public function Tambah_Data_Kunjungan_Berobat()
    {
        $database = "obat";
        $database2 = "karyawan";
        $data = [
            'data_karyawan' => $this->AdminModel->getData($database2),
            'obat' => $this->AdminModel->getData($database),
        ];
        $this->template->load('layout/layout', 'admin/tambah_kunjungan_berobat', $data);
    }

    public function get_preview()
    {
        $database = $this->input->get('database');
        $id_karyawan['id_karyawan']   = $this->input->get('id_karyawan');
        $id = $this->input->get('id_karyawan');
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            if ($database == 'skd') {
                $preview = $this->AdminModel->get_skd($database, $id);
            } elseif ($database == 'mcu') {
                $preview = $this->AdminModel->get_mcu($database, $id);
            } else {
                $preview = $this->AdminModel->getWhere($database, $id_karyawan);
            }
            if ($preview) {
                $this->result['status'] = true;
                $this->result['database'] = $database;
                $this->result['data'] = $preview->result();
            };
            echo json_encode($this->result);
        }
    }

    public function get_obat()
    {
        $database = "obat";
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            $obat = $this->AdminModel->getData($database);
            if ($obat) {
                $this->result['status'] = true;
                foreach ($obat as $key => $value) :
                    $this->result['data'][$key]['id_obat'] = $value->id_obat;
                    $this->result['data'][$key]['nama_obat'] = $value->nama_obat;
                endforeach;
            };
            echo json_encode($this->result);
        };
    }

    public function tambahKunjunganBerobat()
    {
        $database = 'kunjungan_berobat';
        $database2 = 'obat_pasien';
        $database3 = 'obat';
        $this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('catatan_rekam_medis', 'catatan_rekam_medis', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('keluhan', 'keluhan', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('diagnosa', 'diagnosa', 'trim|required|min_length[1]|max_length[30]');

        $nik = $this->input->post('nik');
        $nama_karyawan = $this->input->post('nama_karyawan');
        $id_karyawan = $this->input->post('id_karyawan');
        $keluhan = $this->input->post('keluhan');
        $diagnosa = $this->input->post('diagnosa');
        $id_obat = $this->input->post('id_obat');
        $tgl = date('Y-m-d', strtotime($this->input->post('tgl_berobat')));

        $cek = $this->AdminModel->getData($database);

        if (empty($cek)) {
            $id_obat_pasien = 1;
        } else {
            $get_id = $this->AdminModel->getId($database);

            $id_obat_pasien = $get_id['id_kunjungan_berobat'] + 1;
        }

        try {
            $data = [
                'id_karyawan' => $id_karyawan,
                'nik' => $nik,
                'nama' => $nama_karyawan,
                'keluhan' => $keluhan,
                'diagnosa' => $diagnosa,
                'id_obat_pasien' => $id_obat_pasien,
                'tgl' => $tgl,
            ];
            for ($i = 0; $i < count($id_obat); $i++) {
                $cek_ketersediaan = $this->AdminModel->get_ketersediaan($this->input->post('id_obat')[$i]);

                if ($cek_ketersediaan['qty'] != '0') {
                    $kalkulasi_obat = $cek_ketersediaan['qty'] - $this->input->post('qty')[$i];
                    if ($kalkulasi_obat < 0) {
                        $this->session->set_flashdata('error', 'Cek Ketersediaan Obat!');
                        redirect('Admin/Data_Kunjungan_Berobat');
                    } else {
                        $id['id_obat'] = $this->input->post('id_obat')[$i];
                        $update_ketersediaan_obat = [
                            'qty' => $kalkulasi_obat,
                        ];
                        $this->AdminModel->updateData($database3, $update_ketersediaan_obat, $id);
                        $data_obat = [
                            'id_kunjungan_berobat' => $id_obat_pasien,
                            'id_obat' => $this->input->post('id_obat')[$i],
                            'qty' => $this->input->post('qty')[$i],
                        ];
                        $this->AdminModel->createData($database2, $data_obat);
                    }
                } else {
                    $this->session->set_flashdata('error', 'Cek Ketersediaan Obat!');
                    redirect('Admin/Data_Kunjungan_Berobat');
                }
            }
            $this->AdminModel->createData($database, $data);
            $this->session->set_flashdata('success', 'Data Kunjungan Berobat Berhasil Ditambahkan!');
            redirect('Admin/Data_Kunjungan_Berobat');
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Gagal Menambahkan Data Kunjungan Berobat!');
            redirect('Admin/Tambah_Data_Kunjungan_Berobat');
        }
    }

    public function Detail_Data_Kunjungan_Berobat($id)
    {
        $database = "kunjungan_berobat";
        $database2 = "obat_pasien";

        $data = [
            'ket_pasien' => $this->AdminModel->get_ket_pasien($id),
            'kunjungan_berobat' => $this->AdminModel->get_kunjungan_berobat($database, $id),
            'detail_obat' => $this->AdminModel->getData($database2),
        ];
        $this->template->load('layout/layout', 'admin/detail_kunjungan_berobat', $data);
    }

    public function get_detail_obat()
    {
        $database = "obat_pasien";
        $id['id_kunjungan_berobat']   = $this->input->get('id_obat');
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            $preview = $this->AdminModel->get_obat_pasien($database, $id);
            if ($preview) {
                $this->result['status'] = true;
                $this->result['data'] = $preview->result();
            };
            echo json_encode($this->result);
        };
    }

    public function Edit_Kunjungan_Berobat($id)
    {
        $database = "obat";
        $database2 = "karyawan";
        $data = [
            'data_karyawan' => $this->AdminModel->getData($database2),
            'obat' => $this->AdminModel->getData($database),
            'kunjungan_berobat' => $this->AdminModel->get_edit_kunjungan_berobat($id),
        ];
        $data['obat_pasien'] = $this->AdminModel->get_edit_obat_pasien($data['kunjungan_berobat']['id_obat_pasien']); //get_obat_pasien

        $this->template->load('layout/layout', 'admin/edit_kunjungan_berobat', $data);
    }

    public function editKunjunganBerobat()
    {
        $database = "kunjungan_berobat";
        $database2 = "obat_pasien";
        $database3 = "obat";

        $nik = $this->input->post('nik');
        $nama_karyawan = $this->input->post('nama_karyawan');
        $id_karyawan = $this->input->post('id_karyawan');
        $keluhan = $this->input->post('keluhan');
        $diagnosa = $this->input->post('diagnosa');
        $id_obat = $this->input->post('id_obat');
        $tgl = date('Y-m-d', strtotime($this->input->post('tgl_berobat')));
        $id_kunjungan_berobat['id_kunjungan_berobat'] = $this->input->post('id_kunjungan_berobat');
        $obat_pasien_id = $this->input->post('obat_pasien_id');
        $id_edit = $this->input->post('id_kunjungan_berobat');

        try {
            $data = [
                'id_karyawan' => $id_karyawan,
                'nik' => $nik,
                'nama' => $nama_karyawan,
                'keluhan' => $keluhan,
                'diagnosa' => $diagnosa,
                'id_obat_pasien' => $obat_pasien_id,
                'tgl' => $tgl,
            ];
            if ($id_obat) {
                for ($i = 0; $i < count($id_obat); $i++) {
                    $cek_ketersediaan = $this->AdminModel->get_ketersediaan($this->input->post('id_obat')[$i]);

                    if ($cek_ketersediaan['qty'] != '0') {
                        $kalkulasi_obat = $cek_ketersediaan['qty'] - $this->input->post('qty')[$i];
                        if ($kalkulasi_obat < 0) {
                            $this->session->set_flashdata('error', 'Cek Ketersediaan Obat!');
                            redirect('Admin/editKunjunganBerobat/' . $this->input->post('id_kunjungan_berobat'));
                        } else {
                            $id['id_obat'] = $this->input->post('id_obat')[$i];
                            $update_ketersediaan_obat = [
                                'qty' => $kalkulasi_obat,
                            ];
                            $this->AdminModel->updateData($database3, $update_ketersediaan_obat, $id);
                            $data_obat = [
                                'id_kunjungan_berobat' => $obat_pasien_id,
                                'id_obat' => $this->input->post('id_obat')[$i],
                                'qty' => $this->input->post('qty')[$i],
                            ];
                            $this->AdminModel->createData($database2, $data_obat);
                        }
                    }
                }
            }

            $this->AdminModel->updateData($database, $data, $id_kunjungan_berobat);
            $this->session->set_flashdata('success', 'Update Data Kunjungan Berobat Berhasil!');
            redirect("Admin/Edit_Kunjungan_Berobat/$id_edit");
        } catch (\Exception $e) {
            $this->session->set_flashdata('success', 'Update Data Kunjungan Berobat Berhasil!');
            redirect("Admin/Edit_Kunjungan_Berobat/$id_edit");
        }
    }

    public function deleteObatPasien()
    {
        $database = "obat";
        $database2 = "obat_pasien";
        $id_obat_pasien['id_obat_pasien'] = $this->input->post('id_delete_obat_pasien');
        $id_obat = $this->input->post('id_obat');
        $id['id_obat'] = $id_obat;
        $qty = $this->input->post('qty_obat_pasien');
        $id_edit = $this->input->post('id_edit');

        try {
            $cek_ketersediaan = $this->AdminModel->get_ketersediaan($id_obat);

            $tambah_obat = $cek_ketersediaan['qty'] + $qty;
            $update_ketersediaan_obat = [
                'qty' => $tambah_obat,
            ];
            $this->AdminModel->updateData($database, $update_ketersediaan_obat, $id);
            $this->AdminModel->deleteData($database2, $id_obat_pasien);
            $this->session->set_flashdata('success', 'Data Obat Pasien Berhasil Dihapus!');
            redirect("Admin/Edit_Kunjungan_Berobat/$id_edit");
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Gagal Menghapus Data Obat Pasien!');
            redirect("Admin/Edit_Kunjungan_Berobat/$id_edit");
        }
    }

    public function editObatPasien()
    {
        $database2 = "obat_pasien";
        $database3 = "obat";
        $id_edit =  $this->input->post('id_kunjungan_berobat');
        $id_obat = $this->input->post('id_obats');
        $qty_old = $this->input->post('qty_old');
        try {
            $cek_ketersediaan = $this->AdminModel->get_ketersediaan($id_obat);

            $tambah_obat = $cek_ketersediaan['qty'] + $qty_old;
            $data_tambah_obat = [
                'qty' => $tambah_obat
            ];

            $id_tambah_obat['id_obat'] = $id_obat;

            $this->AdminModel->updateData($database3, $data_tambah_obat, $id_tambah_obat);

            if ($cek_ketersediaan['qty'] != '0') {
                $cek_ketersediaan = $this->AdminModel->get_ketersediaan($id_obat);
                $kalkulasi_obat = $cek_ketersediaan['qty'] - $this->input->post('qty');
                if ($kalkulasi_obat < 0) {
                    $this->session->set_flashdata('error', 'Cek Ketersediaan Obat!');
                    redirect("Admin/Edit_Kunjungan_Berobat/$id_edit");
                } else {
                    $id['id_obat'] = $id_obat;
                    $update_ketersediaan_obat = [
                        'qty' => $kalkulasi_obat,
                    ];
                    $this->AdminModel->updateData($database3, $update_ketersediaan_obat, $id); //update setelah dikurangi

                    $data_obat = [
                        'qty' => $this->input->post('qty'),
                    ];
                    $id_obat_pasien['id_obat_pasien'] = $this->input->post('id_obat_pasien');
                    $this->AdminModel->updateData($database2, $data_obat, $id_obat_pasien);
                    $this->session->set_flashdata('success', 'Update Data Obat Pasien Berhasil!');
                    redirect("Admin/Edit_Kunjungan_Berobat/$id_edit");
                }
            } else {
                $this->session->set_flashdata('error', 'Cek Ketersediaan Obat!');
                redirect("Admin/Edit_Kunjungan_Berobat/$id_edit");
            }
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Update Obat Pasien Gagal!');
            redirect("Admin/Edit_Kunjungan_Berobat/$id_edit");
        }
    }

    public function deleteKunjunganBerobat()
    {
        $database = "obat_pasien";
        $database2 = "kunjungan_berobat";
        $id_kunjungan_berobat['id_kunjungan_berobat'] = $this->input->post('id_kunjungan_berobat');
        $id_obat_pasien['id_kunjungan_berobat'] = $this->input->post('id_obat_pasien');

        try {
            $this->AdminModel->deleteData($database, $id_obat_pasien);
            $this->AdminModel->deleteData($database2, $id_kunjungan_berobat);
            $this->session->set_flashdata('success', 'Data Kunjungan Berobat Berhasil Dihapus!');
            redirect('Admin/Data_Kunjungan_Berobat');
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Gagal Menghapus Data Kunjungan Berobat!');
            redirect('Admin/Data_Kunjungan_Berobat');
        }
    }

    // ############################SKD############################ //
    public function Surat_Keterangan_Dokter()
    {
        $database = "skd";
        $database2 = "karyawan";
        $join = "karyawan.id_karyawan = skd.id_karyawan";
        $data = [
            'skd' => $this->AdminModel->join($database, $database2, $join)
        ];
        $this->template->load('layout/layout', 'admin/skd', $data);
    }

    public function Tambah_Surat_Keterangan_Dokter()
    {
        $database = "karyawan";
        $data = [
            'data_karyawan' => $this->AdminModel->getData($database),
        ];
        $this->template->load('layout/layout', 'admin/tambah_skd', $data);
    }

    public function tambahSuratKeteranganDokter()
    {
        $database = 'skd';
        $this->form_validation->set_rules('id_karyawan', 'id_karyawan', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('tanggal_mulai', 'tanggal_mulai', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('tanggal_akhir', 'tanggal_akhir', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('diagnosa_penyakit', 'diagnosa_penyakit', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('tempat_berobat', 'tempat_berobat', 'trim|required|min_length[1]|max_length[30]');

        $id_karyawan = $this->input->post('id_karyawan');
        $tanggal_mulai_skd = $this->input->post('tgl_mulai');
        $tanggal_akhir_skd = $this->input->post('tgl_akhir');
        $diagnosa_penyakit = $this->input->post('diagnosa_penyakit');
        $tempat_berobat = $this->input->post('tempat_berobat');

        try {
            $data = [
                'id_karyawan' => $id_karyawan,
                'tanggal_mulai_skd' => date('Y-m-d', strtotime($tanggal_mulai_skd)),
                'tanggal_akhir_skd' => date('Y-m-d', strtotime($tanggal_akhir_skd)),
                'diagnosa_penyakit' => $diagnosa_penyakit,
                'tempat_berobat' => $tempat_berobat,
                'created_at' => date('Y-m-d'),
            ];
            $this->AdminModel->createData($database, $data);
            $this->session->set_flashdata('success', 'Berhasil Menambahkan Data Surat Keterangan Dokter!');
            redirect('Admin/Surat_Keterangan_Dokter');
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Gagal Menambahkan Data Surat Keterangan Dokter!');
            redirect('Admin/Surat_Keterangan_Dokter');
        }
    }

    public function Detail_SKD($id)
    {
        $database = "skd";

        $data = [
            'ket_pasien' => $this->AdminModel->get_ket_pasien($id),
            'skd' => $this->AdminModel->get_detail_skd($database, $id),
        ];

        $this->template->load('layout/layout', 'admin/detail_skd', $data);
    }

    public function Edit_SKD($id)
    {
        $database = "skd";
        $database2 = "karyawan";

        $data = [
            'data_karyawan' => $this->AdminModel->getData($database2),
            'skd' => $this->AdminModel->get_edit_skd($database, $id),
        ];
        $this->template->load('layout/layout', 'admin/edit_skd', $data);
    }

    public function editSuratKeteranganDokter()
    {
        $database = "skd";

        $id['id_skd'] = $this->input->post('id_skd');
        $id_skd = $this->input->post('id_skd');
        $id_karyawan = $this->input->post('id_karyawan');
        $tanggal_mulai_skd = date('Y-m-d', strtotime($this->input->post('tgl_mulai')));
        $tanggal_akhir_skd = date('Y-m-d', strtotime($this->input->post('tgl_akhir')));
        $diagnosa_penyakit = $this->input->post('diagnosa_penyakit');
        $tempat_berobat = $this->input->post('tempat_berobat');

        try {
            $data = [
                'id_karyawan' => $id_karyawan,
                'tanggal_mulai_skd' => $tanggal_mulai_skd,
                'tanggal_akhir_skd' => $tanggal_akhir_skd,
                'diagnosa_penyakit' => $diagnosa_penyakit,
                'tempat_berobat' => $tempat_berobat,
            ];
            $this->AdminModel->updateData($database, $data, $id);
            $this->session->set_flashdata('success', 'Berhasil Update Data Surat Keterangan Dokter!');
            redirect("Admin/Edit_SKD/$id_skd");
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Gagal Update Data Surat Keterangan Dokter!');
            redirect("Admin/Edit_SKD/$id_skd");
        }
    }

    public function deleteSuratKeteranganDokter()
    {
        $database = "skd";
        $id['id_skd'] = $this->input->post('id');

        try {
            $this->AdminModel->deleteData($database, $id);
            $this->session->set_flashdata('success', 'Data Surat Keterangan Dokter Berhasil Dihapus!');
            redirect('Admin/Surat_Keterangan_Dokter');
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Data Surat Keterangan Dokter Gagal Dihapus!');
            redirect('Admin/Surat_Keterangan_Dokter');
        }
    }

    // ############################MCU############################ //

    public function Medical_Check_Up()
    {
        $database = "mcu";
        $database2 = "karyawan";
        $join = "karyawan.id_karyawan=mcu.id_karyawan";
        $data = [
            'mcu' => $this->AdminModel->join($database, $database2, $join),
        ];
        $this->template->load('layout/layout', 'admin/mcu', $data);
    }

    public function Tambah_Data_Medical_Check_Up()
    {
        $database = "karyawan";
        $data = [
            'data_karyawan' => $this->AdminModel->getData($database),
        ];
        $this->template->load('layout/layout', 'admin/tambah_mcu', $data);
    }

    public function tambahMedicalCheckUp()
    {
        $database = 'mcu';
        $this->form_validation->set_rules('fasilitator_mcu', 'fasilitator_mcu', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('waktu_mcu', 'waktu_mcu', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('tekanan_darah', 'tekanan_darah', 'trim|required|min_length[1]|max_length[30]');
        $this->form_validation->set_rules('hasil_lab_urin', 'hasil_lab_urin', 'trim|required|min_length[1]');
        $this->form_validation->set_rules('hasil_rontgen_thorak', 'hasil_rontgen_thorak', 'trim|required|min_length[1]');
        $this->form_validation->set_rules('hasil_pemeriksaan_mata', 'hasil_pemeriksaan_mata', 'trim|required|min_length[1]');
        $this->form_validation->set_rules('hasil_pemeriksaan_pendengaran', 'hasil_pemeriksaan_pendengaran', 'trim|required|min_length[1]');

        $id_karyawan = $this->input->post('id_karyawan');
        $fasilitator_mcu = $this->input->post('fasilitator_mcu');
        $waktu_mcu = $this->input->post('waktu_mcu');
        $tekanan_darah = $this->input->post('tekanan_darah');
        $hasil_pemeriksaan_dokter = $this->input->post('hasil_pemeriksaan_dokter');
        $hasil_lab_urin = $this->input->post('hasil_lab_urin');
        $hasil_rontgen_thorak = $this->input->post('hasil_rontgen_thorak');
        $hasil_pemeriksaan_mata = $this->input->post('hasil_pemeriksaan_mata');
        $hasil_pemeriksaan_pendengaran = $this->input->post('hasil_pemeriksaan_pendengaran');
        try {
            $data = [
                'id_karyawan' => $id_karyawan,
                'fasilitator_mcu' => $fasilitator_mcu,
                'waktu_mcu' => date('Y-m-d', strtotime($waktu_mcu)),
                'tekanan_darah' => $tekanan_darah,
                'hasil_pemeriksaan_dokter' => $hasil_pemeriksaan_dokter,
                'hasil_lab_urin' => $hasil_lab_urin,
                'hasil_rontgen_thorak' => $hasil_rontgen_thorak,
                'hasil_pemeriksaan_mata' => $hasil_pemeriksaan_mata,
                'hasil_pemeriksaan_pendengaran' => $hasil_pemeriksaan_pendengaran,
            ];
            // var_dump($data);
            // die;

            $this->AdminModel->createData($database, $data);
            $this->session->set_flashdata('success', 'Data Surat Medical Check Up Berhasil Ditambahkan!');
            redirect('Admin/Medical_Check_Up');
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Data Surat Medical Check Up Gagal Ditambahkan!');
            redirect('Admin/Medical_Check_Up');
        }
    }

    public function Detail_MCU($id)
    {
        $database = "mcu";

        $data = [
            'ket_pasien' => $this->AdminModel->get_ket_pasien($id),
            'mcu' => $this->AdminModel->get_detail_mcu($database, $id),
        ];

        $this->template->load('layout/layout', 'admin/detail_mcu', $data);
    }

    public function Edit_MCU($id)
    {
        $database = "mcu";
        $database2 = "karyawan";

        $data = [
            'data_karyawan' => $this->AdminModel->getData($database2),
            'mcu' => $this->AdminModel->get_edit_mcu($database, $id),
        ];
        $this->template->load('layout/layout', 'admin/edit_mcu', $data);
    }

    public function editMedicalCheckUp()
    {
        $database = "mcu";
        $id['id_mcu'] = $this->input->post('id');
        $id_mcu = $this->input->post('id');
        $id_karyawan = $this->input->post('id_karyawan');
        $fasilitator_mcu = $this->input->post('fasilitator_mcu');
        $waktu_mcu = $this->input->post('waktu_mcu');
        $tekanan_darah = $this->input->post('tekanan_darah');
        $hasil_pemeriksaan_dokter = $this->input->post('hasil_pemeriksaan_dokter');
        $hasil_lab_urin = $this->input->post('hasil_lab_urin');
        $hasil_rontgen_thorak = $this->input->post('hasil_rontgen_thorak');
        $hasil_pemeriksaan_mata = $this->input->post('hasil_pemeriksaan_mata');
        $hasil_pemeriksaan_pendengaran = $this->input->post('hasil_pemeriksaan_pendengaran');

        try {
            $data = [
                'id_karyawan' => $id_karyawan,
                'fasilitator_mcu' => $fasilitator_mcu,
                'waktu_mcu' => date('Y-m-d', strtotime($waktu_mcu)),
                'tekanan_darah' => $tekanan_darah,
                'hasil_pemeriksaan_dokter' => $hasil_pemeriksaan_dokter,
                'hasil_lab_urin' => $hasil_lab_urin,
                'hasil_rontgen_thorak' => $hasil_rontgen_thorak,
                'hasil_pemeriksaan_mata' => $hasil_pemeriksaan_mata,
                'hasil_pemeriksaan_pendengaran' => $hasil_pemeriksaan_pendengaran,
            ];
            $this->AdminModel->updateData($database, $data, $id);
            $this->session->set_flashdata('success', 'Data Surat Medical Check Up Berhasil Diupdate!');
            redirect("Admin/Edit_MCU/$id_mcu");
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Data Surat Medical Check Up Gagal Diupdate!');
            redirect("Admin/Edit_MCU/$id_mcu");
        }
    }

    public function deleteMedicalCheckUp()
    {
        $database = "mcu";
        $id['id_mcu'] = $this->input->post('id');

        try {
            $this->AdminModel->deleteData($database, $id);
            $this->session->set_flashdata('success', 'Data Medical Check Up Berhasil Dihapus!');
            redirect('Admin/Medical_Check_Up');
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Data Medical Check Up Gagal Dihapus!');
            redirect('Admin/Medical_Check_Up');
        }
    }

    // ############################DATA REKAM MEDIS############################ //

    public function Data_Rekam_Medis()
    {
        $database = "karyawan";
        $data = [
            'data_karyawan' => $this->AdminModel->getData($database),
        ];
        $this->template->load('layout/layout', 'admin/rekam_medis', $data);
    }

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

    // ############################LAPORAN REKAM MEDIS############################ //

    public function Laporan_Rekam_Medis()
    {
        $database = "karyawan";
        $data = [
            'data_karyawan' => $this->AdminModel->getData($database),
        ];
        $this->template->load('layout/layout', 'admin/laporan_rekam_medis', $data);
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
        $this->template->load('layout/layout', 'admin/laporan_kunjungan_pasien', $data);
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
        $this->template->load('layout/layout', 'admin/laporan_mcu', $data);
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
        $this->template->load('layout/layout', 'admin/profile', $data);
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
            redirect('Admin/Profile');
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Profile Anda Gagal Diupdate!');
            redirect('Admin/Profile');
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
        $this->template->load('layout/layout', 'admin/setting', $data);
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
                    redirect('Admin/tambahUser');
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
                redirect('Admin/Setting');
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
                redirect('Admin/Setting');
            }
        } catch (\Exception $e) {
            $this->session->set_flashdata('error', 'Gagal Update Setting!');
            redirect('Admin/Setting');
        }
    }
}

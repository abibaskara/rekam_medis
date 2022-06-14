<?php
class AdminModel extends CI_Model
{
    // #################GENERAL#############################//

    function getData($database)
    {
        return $this->db->get($database)->result();
    }

    function createData($database, $data)
    {
        return $this->db->insert($database, $data);
    }

    function updateData($database, $data, $id)
    {
        return $this->db->update($database, $data, $id);
    }

    function deleteData($database, $id)
    {
        return $this->db->delete($database, $id);
    }

    function cekData($database, $data)
    {
        return $this->db->get_where($database, $data)->row_array();
    }

    function join($database, $database2, $data)
    {
        $this->db->select('*');
        $this->db->from($database);
        $this->db->join($database2, $data);
        return $this->db->get()->result();
    }

    function doubleJoin($database, $database2, $database3, $data1, $data2)
    {
        $this->db->select('*');
        $this->db->from($database);
        $this->db->join($database2, $data1);
        $this->db->join($database3, $data2);
        return $this->db->get()->result();
    }

    function tripleJoin($database, $database2, $database3, $database4, $data1, $data2, $data3)
    {
        $this->db->select('*');
        $this->db->from($database);
        $this->db->join($database2, $data1);
        $this->db->join($database3, $data2);
        $this->db->join($database4, $data3);
        return $this->db->get()->result();
    }

    function getWhere($database, $data)
    {
        $this->db->select('*');
        $this->db->from($database);
        $this->db->where($data);
        return $this->db->get();
    }


    public function getId($database)
    {
        $this->db->select('*');
        $this->db->from($database);
        $this->db->order_by('tgl', 'DESC');
        $this->db->limit(1);
        return $this->db->get()->row_array();
    }

    public function get_karyawan($id)
    {
        $query  = $this->db->select('*')
            ->from('karyawan')
            ->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan')
            ->join('departement', 'departement.id_departement = karyawan.id_departement')
            ->where('id_karyawan', $id)->get();
        return $query;
    }

    public function get_user($id)
    {
        $query  = $this->db->select('*')
            ->from('user')
            ->join('karyawan', 'karyawan.id_karyawan = user.id_karyawan')
            ->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan')
            ->join('departement', 'departement.id_departement = karyawan.id_departement')
            ->where('id_user', $id)->get()->row_array();
        return $query;
    }

    public function get_kunjungan_berobat($database, $id)
    {
        $this->db->select('*');
        $this->db->from($database);
        $this->db->order_by('tgl', 'DESC');
        $this->db->where('nik', $id);
        return $this->db->get()->result();
    }

    public function get_ket_pasien($id)
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');
        $this->db->join('departement', 'departement.id_departement = karyawan.id_departement');
        $this->db->where('nik', $id);
        return $this->db->get()->row_array();
    }

    public function get_ketersediaan($id)
    {
        $this->db->select('*');
        $this->db->from('obat');
        $this->db->where('id_obat', $id);
        return $this->db->get()->row_array();
    }

    public function get_obat_pasien($database, $id)
    {
        $this->db->select('obat_pasien.qty AS kuantiti, obat.nama_obat, obat.satuan');
        $this->db->from($database);
        $this->db->join('obat', 'obat.id_obat = obat_pasien.id_obat');
        $this->db->where($id);
        return $this->db->get();
    }

    public function get_edit_kunjungan_berobat($id)
    {
        $this->db->select('*');
        $this->db->from('kunjungan_berobat');
        $this->db->where('id_kunjungan_berobat', $id);
        return $this->db->get()->row_array();
    }

    public function get_edit_obat_pasien($id)
    {
        $this->db->select('obat_pasien.qty AS qty, obat_pasien.id_obat AS id_obat, obat.nama_obat, obat_pasien.id_obat_pasien');
        $this->db->from('obat_pasien');
        $this->db->join('obat', 'obat.id_obat = obat_pasien.id_obat');
        $this->db->where('id_kunjungan_berobat', $id);
        return $this->db->get()->result();
    }

    public function get_skd($database, $id)
    {
        $this->db->select('*');
        $this->db->from($database);
        $this->db->join('karyawan', 'karyawan.id_karyawan=skd.id_karyawan');
        $this->db->where('skd.id_karyawan', $id);
        return $this->db->get();
    }

    public function get_detail_skd($database, $id)
    {
        $this->db->select('*');
        $this->db->from($database);
        $this->db->join('karyawan', 'karyawan.id_karyawan=skd.id_karyawan');
        $this->db->order_by('tanggal_mulai_skd', 'DESC');
        $this->db->where('nik', $id);
        return $this->db->get()->result();
    }

    public function get_edit_skd($database, $id)
    {
        $this->db->select('*');
        $this->db->from($database);
        $this->db->join('karyawan', 'karyawan.id_karyawan = skd.id_karyawan');
        $this->db->where('id_skd', $id);
        return $this->db->get()->row_array();
    }

    public function get_detail_mcu($database, $id)
    {
        $this->db->select('*');
        $this->db->from($database);
        $this->db->join('karyawan', 'karyawan.id_karyawan=mcu.id_karyawan');
        $this->db->order_by('waktu_mcu', 'DESC');
        $this->db->where('nik', $id);
        return $this->db->get()->result();
    }

    public function get_edit_mcu($database, $id)
    {
        $this->db->select('*');
        $this->db->from($database);
        $this->db->join('karyawan', 'karyawan.id_karyawan = mcu.id_karyawan');
        $this->db->where('id_mcu', $id);
        return $this->db->get()->row_array();
    }

    public function get_mcu($database, $id)
    {
        $this->db->select('*');
        $this->db->from($database);
        $this->db->join('karyawan', 'karyawan.id_karyawan=mcu.id_karyawan');
        $this->db->where('mcu.id_karyawan', $id);
        return $this->db->get();
    }

    public function get_laporan_kunjungan_berobat($database, $id, $tgl_awal, $tgl_akhir)
    {
        $this->db->select('*');
        $this->db->from($database);
        $this->db->join('karyawan', 'karyawan.id_karyawan=kunjungan_berobat.id_karyawan');
        $this->db->where('tgl BETWEEN "' . $tgl_awal . '" AND "' . $tgl_akhir . '"');
        $this->db->where('kunjungan_berobat.id_karyawan', $id);
        return $this->db->get();
    }

    public function get_laporan_mcu($database, $id, $tgl_awal, $tgl_akhir)
    {
        $this->db->select('*');
        $this->db->from($database);
        $this->db->join('karyawan', 'karyawan.id_karyawan=mcu.id_karyawan');
        $this->db->where('waktu_mcu BETWEEN "' . $tgl_awal . '" AND "' . $tgl_akhir . '"');
        $this->db->where('mcu.id_karyawan', $id);
        return $this->db->get();
    }

    public function get_laporan_skd($database, $id, $tgl_awal, $tgl_akhir)
    {
        $this->db->select('*');
        $this->db->from($database);
        $this->db->join('karyawan', 'karyawan.id_karyawan=skd.id_karyawan');
        $this->db->where('created_at BETWEEN "' . $tgl_awal . '" AND "' . $tgl_akhir . '"');
        $this->db->where('skd.id_karyawan', $id);
        return $this->db->get();
    }

    public function countKunjunganBerobat()
    {
        $this->db->select('count(id_kunjungan_berobat) AS Total');
        $this->db->from('kunjungan_berobat');
        return $this->db->get()->row_array();
    }

    public function countMCU()
    {
        $this->db->select('count(id_mcu) AS Total');
        $this->db->from('mcu');
        return $this->db->get()->row_array();
    }

    public function countSKD()
    {
        $this->db->select('count(id_skd) AS Total');
        $this->db->from('skd');
        return $this->db->get()->row_array();
    }
}

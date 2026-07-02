<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Booking extends CI_Model {

    public function get_all()
    {
        $this->db->select('booking.*, pelanggan.nama, lapangan.nama_lapangan');
        $this->db->from('booking');
        $this->db->join('pelanggan','pelanggan.id_pelanggan=booking.id_pelanggan');
        $this->db->join('lapangan','lapangan.id_lapangan=booking.id_lapangan');

        return $this->db->get()->result();
    }

    public function insert($data)
    {
        return $this->db->insert('booking',$data);
    }

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pembayaran extends CI_Model {

    public function get_all()
    {
        $this->db->select('
            pembayaran.*,
            pelanggan.nama,
            lapangan.nama_lapangan
        ');

        $this->db->from('pembayaran');

        $this->db->join(
            'booking',
            'booking.id_booking = pembayaran.id_booking'
        );

        $this->db->join(
            'pelanggan',
            'pelanggan.id_pelanggan = booking.id_pelanggan'
        );

        $this->db->join(
            'lapangan',
            'lapangan.id_lapangan = booking.id_lapangan'
        );

        return $this->db->get()->result();
    }

    public function insert($data)
    {
        return $this->db->insert('pembayaran',$data);
    }

    public function get_booking()
    {
    $this->db->select('
        booking.*,
        pelanggan.nama,
        lapangan.nama_lapangan
    ');

    $this->db->from('booking');

    $this->db->join(
        'pelanggan',
        'pelanggan.id_pelanggan = booking.id_pelanggan'
    );

    $this->db->join(
        'lapangan',
        'lapangan.id_lapangan = booking.id_lapangan'
    );

    return $this->db->get()->result();
    }

}
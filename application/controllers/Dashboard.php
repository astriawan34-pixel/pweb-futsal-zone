<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('login'))
        {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';

        // Statistik
        $data['total_lapangan']  = $this->db->count_all('lapangan');
        $data['total_pelanggan'] = $this->db->count_all('pelanggan');
        $data['total_booking']   = $this->db->count_all('booking');

        // Pendapatan
        $this->db->select_sum('jumlah_bayar');
        $this->db->where('status_pembayaran', 'Lunas');
        $hasil = $this->db->get('pembayaran')->row();

        $data['pendapatan'] = ($hasil && $hasil->jumlah_bayar)
            ? $hasil->jumlah_bayar
            : 0;

        // Booking Terbaru
        $this->db->select('
            booking.*,
            pelanggan.nama,
            lapangan.nama_lapangan,
            pembayaran.status_pembayaran
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
        $this->db->join(
            'pembayaran',
            'pembayaran.id_booking = booking.id_booking',
            'left'
        );
        $this->db->order_by('booking.id_booking', 'DESC');
        $this->db->limit(5);

        $data['booking_terbaru'] = $this->db->get()->result();

        // Jadwal Booking
        $this->db->select('booking.*, lapangan.nama_lapangan');
        $this->db->from('booking');
        $this->db->join(
            'lapangan',
            'lapangan.id_lapangan = booking.id_lapangan'
        );
        $this->db->order_by('tanggal_booking', 'DESC');
        $this->db->limit(5);

        $data['jadwal_hari_ini'] = $this->db->get()->result();

        $this->load->view('layout/header', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('layout/footer');
    }
}
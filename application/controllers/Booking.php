<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login'))
        {
            redirect('auth');
        }

        $this->load->model('M_Booking');
        $this->load->model('M_Pelanggan');
        $this->load->model('M_Lapangan');
    }

    public function index()
    {
        $data['title'] = 'Data Booking';
        $data['booking'] = $this->M_Booking->get_all();

        $this->load->view('layout/header',$data);
        $this->load->view('booking/index',$data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
    $data['title'] = 'Booking Baru';

    $data['pelanggan'] = $this->M_Pelanggan->get_all();
    $data['lapangan']  = $this->M_Lapangan->get_all();

    $this->load->view('layout/header',$data);
    $this->load->view('booking/tambah',$data);
    $this->load->view('layout/footer');
    }

    public function simpan()
    {
    $id_lapangan = $this->input->post('id_lapangan');

    $lapangan = $this->db
                     ->get_where(
                         'lapangan',
                         ['id_lapangan'=>$id_lapangan]
                     )
                     ->row();

    $jam_mulai   = strtotime($this->input->post('jam_mulai'));
    $jam_selesai = strtotime($this->input->post('jam_selesai'));

    $durasi = ($jam_selesai - $jam_mulai) / 3600;

    $total = $durasi * $lapangan->harga_sewa;

    $data = array(
        'id_pelanggan'    => $this->input->post('id_pelanggan'),
        'id_lapangan'     => $id_lapangan,
        'tanggal_booking' => $this->input->post('tanggal_booking'),
        'jam_mulai'       => $this->input->post('jam_mulai'),
        'jam_selesai'     => $this->input->post('jam_selesai'),
        'total_harga'     => $total,
        'status_booking'  => 'Menunggu'
    );

    $this->M_Booking->insert($data);
    $this->db->where('id_lapangan', $id_lapangan);
    $this->db->update(
        'lapangan',
        ['status' => 'Dibooking']
    );

    redirect('booking');
    }

    public function hapus($id)
    {
    $this->db->delete(
        'pembayaran',
        ['id_booking'=>$id]
    );

    $this->db->delete(
        'booking',
        ['id_booking'=>$id]
    );

    redirect('booking');
    }

    public function edit($id)
    {
    $data['title'] = 'Edit Booking';

    $data['booking'] = $this->db
        ->get_where('booking', ['id_booking' => $id])
        ->row();

    $data['pelanggan'] = $this->M_Pelanggan->get_all();
    $data['lapangan'] = $this->M_Lapangan->get_all();

    $this->load->view('layout/header', $data);
    $this->load->view('booking/edit', $data);
    $this->load->view('layout/footer');
    }

    public function update()
    {
    $id = $this->input->post('id_booking');

    $id_lapangan = $this->input->post('id_lapangan');

    $lapangan = $this->db
        ->get_where('lapangan',
        ['id_lapangan'=>$id_lapangan])
        ->row();

    $jam_mulai   = strtotime($this->input->post('jam_mulai'));
    $jam_selesai = strtotime($this->input->post('jam_selesai'));

    $durasi = ($jam_selesai - $jam_mulai) / 3600;

    $total = $durasi * $lapangan->harga_sewa;

    $data = array(
    'id_pelanggan'    => $this->input->post('id_pelanggan'),
    'id_lapangan'     => $id_lapangan,
    'tanggal_booking' => $this->input->post('tanggal_booking'),
    'jam_mulai'       => $this->input->post('jam_mulai'),
    'jam_selesai'     => $this->input->post('jam_selesai'),
    'total_harga'     => $total,
    'status_booking'  => $this->input->post('status_booking')
);

    $this->db->where('id_booking', $id);
    $this->db->update('booking', $data);

    
    redirect('booking');
    }

    public function status($id, $status)
    {
    $this->db->where('id_booking', $id);

    $this->db->update(
        'booking',
        ['status_booking' => $status]
    );

    redirect('booking');
    }

    

}

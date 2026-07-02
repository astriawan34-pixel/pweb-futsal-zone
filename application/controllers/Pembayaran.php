<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login'))
        {
            redirect('auth');
        }

        $this->load->model('M_Pembayaran');
    }

    public function index()
    {
        $data['title'] = 'Data Pembayaran';
        $data['pembayaran'] = $this->M_Pembayaran->get_all();

        $this->load->view('layout/header',$data);
        $this->load->view('pembayaran/index',$data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
    $data['title'] = 'Pembayaran Baru';

    $data['booking'] = $this->M_Pembayaran->get_booking();

    $this->load->view('layout/header',$data);
    $this->load->view('pembayaran/tambah',$data);
    $this->load->view('layout/footer');
    }

    public function simpan()
    {
    $id_booking = $this->input->post('id_booking');

    $booking = $this->db
                    ->get_where(
                        'booking',
                        ['id_booking'=>$id_booking]
                    )
                    ->row();

    $data = array(
        'id_booking'         => $id_booking,
        'metode_pembayaran'  => $this->input->post('metode_pembayaran'),
        'jumlah_bayar'       => $booking->total_harga,
        'status_pembayaran' => $this->input->post('status_pembayaran'),
        'tanggal_bayar'      => date('Y-m-d H:i:s')
    );

    $this->M_Pembayaran->insert($data);

    $this->db->where('id_booking',$id_booking);
    $this->db->update(
        'booking',
        ['status_booking'=>'Lunas']
    );

    redirect('pembayaran');
    }

    public function edit($id)
    {
    $data['title'] = 'Edit Pembayaran';

    $data['pembayaran'] = $this->db
        ->get_where('pembayaran',
        ['id_pembayaran'=>$id])
        ->row();

    $this->load->view('layout/header',$data);
    $this->load->view('pembayaran/edit',$data);
    $this->load->view('layout/footer');
    }

    public function update()
    {
    $id = $this->input->post('id_pembayaran');

    $data = array(
        'metode_pembayaran' => $this->input->post('metode_pembayaran'),
        'status_pembayaran' => $this->input->post('status_pembayaran')
    );

    $this->db->where('id_pembayaran',$id);
    $this->db->update('pembayaran',$data);

    redirect('pembayaran');
    }

    public function hapus($id)
    {
    $this->db->where('id_pembayaran', $id);
    $this->db->delete('pembayaran');

    redirect('pembayaran');
    }

    
}

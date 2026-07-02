<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Auth extends CI_Model {

    public function cek_login($username, $password)
    {
        return $this->db
                    ->get_where(
                        'admin',
                        [
                            'username' => $username,
                            'password' => md5($password)
                        ]
                    )
                    ->row();
    }

}
<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{

    public function get($user_id = null)
    {
        $this->db->from('users');
        if ($user_id != null) {
            $this->db->where('id', $user_id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_role($id = null)
    {
        $this->db->from('user_role');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }


    public function tambah_dosen($post)
    {
        $params['nidn'] = $post['nidn'];
        $params['id_sinta'] = $post['id_sinta'];
        $params['username'] = $post['username'];
        $params['name'] = $post['nama'];
        $params['email'] = $post['email'];
        $params['password'] = sha1($post['password']);
        $params['image'] = $_FILES['image'];
        if ($params['image'] = null) {
        } else {
            $config['upload_path'] = './assets/users';
            $config['allowed_types'] = 'jpg|png|jpeg';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                echo "Upload Image Gagal!!";
                die();
            } else {
                $params['image'] = $this->upload->data('file_name');
            }
        }
        $params['jk'] = $post['jk'];
        $params['program_studi'] = $post['programstudi'];
        $params['fakultas'] = $post['fakultas'];
        $params['alamat'] = $post['alamat'];
        $params['no_hp'] = $post['nohp'];
        $params['id_role'] = $post['role'];


        $this->db->insert('users', $params);
    }
}

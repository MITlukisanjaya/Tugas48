<?php

namespace App\Models;

class Mahasiswa extends AbstractModel
{
    protected $table = 'mahasiswa';

    // public function insert(array $data)
    // {
    //     $data = [
    //         'nim' => $data['nim'],
    //         'nama' => $data['nama'],
    //         'alamat' => $data['alamat'],
    //     ];
    //
    //     $this->insertData($data);
    //
    //     return $data;
    //   }
    //
    //   public function read()
    //   {
    //       var_dump ($this->db->getAll());
    //   }
    //
    //   public function finds($id)
    //   {
    //       var_dump ($this->db->find($id));
    //   }
}

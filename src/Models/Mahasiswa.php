<?php

namespace App\Models;

class Mahasiswa extends AbstractModel
{
    protected $table = 'mahasiswa';

    public function insert(array $data)
    {
        $data = [
            'nim' => $data['nim'],
            'nama' => $data['nama'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'tempat_lahir' => $data['tempat_lahir'],
            'alamat' => $data['alamat'],
        ];

        $this->insertData($data);

        return $data;
      }
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

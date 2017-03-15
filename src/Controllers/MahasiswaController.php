<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\Mahasiswa;

class MahasiswaController extends AbstractController
{
    public function index(Request $request, Response $response, $arg)
    {
        $mahasiswa = new Mahasiswa($this->db);

        $mahasiswas = $mahasiswa->getAll();

        $data['mahasiswa'] = $mahasiswas;
        $data['title']     = 'Halaman Data Mahasiswa';

        return $this->view->render($response, 'home.twig', $data);
    }

    public function create(Request $request, Response $response)
    {
        $data['title'] = 'Halaman Tambah Data Mahasiswa';
        return $this->view->render($response, 'create.twig', $data);
    }

    public function createAction(Request $request, Response $response)
    {
        $mahasiswa = new Mahasiswa($this->db);

        $this->validation->rule('required',['nim', 'nama', 'tempat_lahir',
        'tanggal_lahir', 'alamat']);

        if ($this->validation->validate()) {
            $mahasiswa->insert($request->getParams());
            return $response->withRedirect($this->router->pathFor('mahasiswa'));
        } else {
            $_SESSION['errors'] = $this->validation->errors();
            $_SESSION['old'] = $request->getParams();

            return $response->withRedirect($this->router
            ->pathFor('create'));
            return $response->withRedirect($this->router
            ->pathFor('mahasiswa'));
        }
    }

    // public function edit(Request $request, Response $response, $arg)
    // {
    //   $mahasiswa = new Mahasiswa($this->db);
    //
    //   $mahasiswas = $mahasiswa->find($arg['id']);
    //
    //   $data['mahasiswa'] = $mahasiswas;
    //   $data['title']  = "Halaman Edit Data Mahasiswa";
    //   $data['active'] = 'class="active"';
    //   $data['action'] = "editAction";
    //
    //     return $this->view->render($response, 'create.twig', $data);
    // }

    // public function editAction(Request $request, Response $response)
    // {
    //     $mahasiswa = new Mahasiswa($this->db);
    //
    //     $this->validation->rule('required',
    //     ['nim', 'nama', 'tempat_lahir', 'tanggal_lahir', 'alamat']);
    //
    //     if ($this->validation->validate()) {
    //         $mahasiswa->update($request->getParams('id'));
    //         return $response->withRedirect($this->router
    //         ->pathFor('mahasiswa'));
    //     } else {
    //         $_SESSION['errors'] = $this->validation->errors();
    //         $_SESSION['old'] = $request->getParams();
    //
    //         return $response->withRedirect($this->router
    //         ->pathFor('edit').'/'.$request->getParams('id'));
    //         return $response->withRedirect($this->router
    //         ->pathFor('mahasiswa'));
    //     }
    // }

}

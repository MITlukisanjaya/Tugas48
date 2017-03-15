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

        return $this->view->render($response, 'home.twig',[
            'mahasiswa' => $mahasiswas,
            'title' => 'Halaman Data Mahasiswa',
            'active' => 'class="active"'
            ]);
    }

    public function create(Request $request, Response $response)
    {
        return $this->view->render($response, 'create.twig',[
          'title' => 'Halaman Tambah Data Mahasiswa',
          'active' => 'class="active"',
          'action' => 'createAction'
        ]);
    }

    public function edit(Request $request, Response $response, $arg)
    {
      $mahasiswa = new Mahasiswa($this->db);

      $mahasiswas = $mahasiswa->find($arg['id']);

        return $this->view->render($response, 'create.twig',[
            'mahasiswa' => $mahasiswas,
            'title' => 'Halaman Edit Data Mahasiswa',
            'active' => 'class="active"',
            'action' => "editAction"
        ]);
    }

    public function createAction(Request $request, Response $response)
    {
        $mahasiswa = new Mahasiswa($this->db);

        $this->validation->rule('required', ['nim', 'nama', 'alamat']);
        $this->validation->rule('integer','id');

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

    public function editAction(Request $request, Response $response)
    {
        $mahasiswa = new Mahasiswa($this->db);

        $this->validation->rule('required', ['nim', 'nama', 'alamat']);

        if ($this->validation->validate()) {
            $mahasiswa->edit($request->getParams('id'));
            return $response->withRedirect($this->router
            ->pathFor('mahasiswa'));
        } else {
            $_SESSION['errors'] = $this->validation->errors();
            $_SESSION['old'] = $request->getParams();

            return $response->withRedirect($this->router
            ->pathFor('edit').'/'.$request->getParams('id'));
            return $response->withRedirect($this->router
            ->pathFor('mahasiswa'));
        }
    }


}

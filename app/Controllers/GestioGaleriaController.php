<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlbumModel;
use App\Models\TaulaFotosModel;
use CodeIgniter\HTTP\ResponseInterface;

class GestioGaleriaController extends BaseController
{
    public function album()
    {
        $model = new AlbumModel();
        $albums = $model->orderBy('created_at', 'DESC')->paginate(6);

        $pager = $model->pager;

        $data = [
            'albums' => $albums,
            'pager' => $pager,
        ];

        return view('gestio_pag/fotos/album', $data);
    }

    public function albumFotos($albumId)
    {
        $albumModel = new AlbumModel();
        $fotoModel = new TaulaFotosModel();

        $data['album'] = $albumModel->find($albumId);
        $data['fotos'] = $fotoModel->where('id_album', $albumId)->findAll();

        return view('gestio_pag/fotos/galeria_fotos', $data);
    }

    public function deleteFoto()
    {
        $fotoModel = new TaulaFotosModel();
        $id_foto = $this->request->getVar('id_foto');
        $id_album = $this->request->getVar('id_album');

        if (!empty($id_foto)) {
            $fotoModel->where('id', $id_foto)->delete();
        }

        session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Imatge esborrada correctament</div>');
        return redirect()->back();
    }

    public function eliminarAlbum($id)
    {

        $albumModel = new AlbumModel();
        $fotoModel = new TaulaFotosModel();

        $fotoModel->where('id_album', $id)->delete();
        $albumModel->where('id', $id)->delete();

        session()->setFlashdata('success', '<div style="background-color: green; color: white; padding: 10px;">Album esborrat correctament</div>');
        return redirect()->to('/gestio/galeria');
    }

    public function crearAlbum()
    {

        return view('gestio_pag/fotos/crear_album');
    }

    public function crearAlbum_post()
    {
        helper(["form"]);
        $model = new AlbumModel();

        $portada = $this->request->getFile('portada');
        $titolPortada = $this->request->getPost('titol');

        if ($portada) {
            $newName = $titolPortada;
            $portada->move(FCPATH . 'uploads/portades', $newName);
            $data['portada'] = 'uploads/portades/' . $newName;
        } else {
            $data['portada'] = 'http://localhost/fileget/album.jpg';
        }

        $data = [
            'titol' => $this->request->getPost('titol'),
            'portada' => $this->request->getPost('portada'),
            'album' => $this->request->getPost('album'),
            'estat' => $this->request->getPost('estat'),
        ];

        // dd($data);

        $validationRule = [
            'titol' => 'required',
            // 'portada' => 'required',
            'album' => 'required',
            'estat' => 'required|in_list[publicat,no_publicat]',
        ];

        // if (!$this->validate($validationRule)) {
        //     $data['errors'] = $this->validator->getErrors();
        //     return view('gestio_pag/crear_album', $data);
        // }

        $model->insert($data);
        return redirect()->to('/gestio/galeria');
    }
}

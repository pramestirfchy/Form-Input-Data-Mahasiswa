Script Mahasiswa.php

<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use CodeIgniter\Controller;

class Mahasiswa extends BaseController
{
    public function index()
    {
        $model = new MahasiswaModel();
        $data['mahasiswa'] = $model->findAll();
        return view('mahasiswa_view', $data);
    }

    public function create()
    {
        return view('mahasiswa_form');
    }

    public function store()
    {
        $model = new MahasiswaModel();

        $validation = \Config\Services::validation();
        $rules = [
            'nim'   => 'required|numeric|min_length[8]|max_length[12]',
            'nama'  => 'required|alpha_space',
            'kelas' => 'required',
            'prodi' => 'required',
            'email' => 'required|valid_email'
        ];

        $messages = [
            'nim' => [
                'required'   => 'NIM harus diisi.',
                'numeric'    => 'NIM hanya boleh berisi angka.',
                'min_length' => 'NIM minimal 8 karakter.',
                'max_length' => 'NIM maksimal 12 karakter.'
            ],
            'nama' => [
                'required'    => 'Nama harus diisi.',
                'alpha_space' => 'Nama hanya boleh berisi huruf dan spasi.'
            ],
            'kelas' => [
                'required' => 'Kelas harus diisi.'
            ],
            'prodi' => [
                'required' => 'Program Studi harus diisi.'
            ],
            'email' => [
                'required'    => 'Email harus diisi.',
                'valid_email' => 'Format email tidak valid.'
            ]
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->to('/mahasiswa/create')->withInput()->with('errors', $validation->getErrors());
        }

        $model->insert([
            'nim'   => $this->request->getPost('nim'),
            'nama'  => $this->request->getPost('nama'),
            'kelas' => $this->request->getPost('kelas'),
            'prodi' => $this->request->getPost('prodi'),
            'email' => $this->request->getPost('email'),
        ]);

        return redirect()->to('/mahasiswa');
    }

    public function delete($nim)
    {
        $model = new MahasiswaModel();
        $model->delete($nim);
        return redirect()->to('/mahasiswa');
    }
}
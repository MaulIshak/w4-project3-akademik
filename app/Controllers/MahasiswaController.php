<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MahasiswaMataKuliahModel;
use App\Models\MahasiswaModel;
use App\Models\MataKuliahModel;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use CodeIgniter\I18n\Time;
class MahasiswaController extends BaseController
{
    protected $helpers = ['cookie'];
    private $nim;

    public function __construct()
    {
        $this->nim = JWT::decode(get_cookie('jwt_token'), new Key(getenv('JWT_SECRET_KEY'), 'HS256'))->user_id;
    }
    // Views controller
    public function index()
    {
        $data['title'] = 'Dashboard Mahasiswa';
        return view('mahasiswa/dashboard', $data);
    }
    public function profile()
    {
        $data['title'] = 'Profil Mahasiswa';
        return view('mahasiswa/profile', $data);
    }
    public function mata_kuliah()
    {
        $data['title'] = 'Mata Kuliah';

        $modelMatkul = new MataKuliahModel();

        $data['matkul_tersedia'] = $modelMatkul->getMataKuliahExceptNim($this->nim);
        $data['matkul_diambil'] = $modelMatkul->getMataKuliahByNim($this->nim);

        return view('mahasiswa/matakuliah', $data);
    }

    public function ambil_mata_kuliah(){
        $model = new MahasiswaMataKuliahModel();
        $kodeMatkul = $this->request->getPost('ambil_mk');
        $data = [];
        $i = 0;
        if($kodeMatkul){
            foreach($kodeMatkul as $kode){
                $data[$i++] =[
                    'nim' => $this->nim,
                    'kode_mata_kuliah' => $kode,
                    'tanggal_mengambil' => Time::now()
                ];
            }
            
            $model->insertBatch($data);
        }
        return redirect()->to('/mahasiswa/matakuliah');

    }

    public function hapus_mata_kuliah(){
        $model = new MahasiswaMataKuliahModel();
        $kode = $this->request->getPost('batal_mk');

        $model->whereIn('mahasiswa_mata_kuliah.kode_mata_kuliah',$kode)->delete();

        return redirect()->to('/mahasiswa/matakuliah');
    }
}

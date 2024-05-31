<?php

namespace App\Http\Controllers;

use App\Models\BansosModel;
use App\Models\KriteriaModel;
use App\Models\SubKriteriaModel;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class BansosController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Bansos',
            'list' => ['Pages', 'Bansos']
        ];
        return view('bansos.index', [
            'breadcrumb' => $breadcrumb,
            'data' => BansosModel::all()
        ]);
    }

    public function detailBansos($bansos_id){
        $breadcrumb = (object) [
            'title' => 'Detail Bansos',
            'list' => ['Pages', 'Bansos','Detail']
        ];
        $bansos = BansosModel::find($bansos_id);
        $kriterias = KriteriaModel::where('bansos_id', $bansos_id)->get();
        return view('bansos.detailBansos',[
            'breadcrumb' => $breadcrumb,
            'bansos' => $bansos,
            'kriterias' => $kriterias
        ]);
    }

    public function detailKriteria($bansos_id, $kriteria_id){
        $breadcrumb = (object) [
            'title' => 'Detail Kriteria Bansos',
            'list' => ['Pages', 'Bansos','Detail','Kriteria']
        ];
        $kriteria = KriteriaModel::find($kriteria_id);
        $sub = SubKriteriaModel::where('kriteria_id', $kriteria_id)->get();
        return view('bansos.detailKriteria',[
            'breadcrumb' => $breadcrumb,
            'kriteria' => $kriteria,
            'sub' => $sub
        ]);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Create Bansos',
            'list' => ['Pages', 'Bansos','Create']
        ];
        return view('bansos.create', ['breadcrumb' => $breadcrumb]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_bansos' => 'required',
            'total_bantuan' => 'required',
            'jenis_bansos' => 'required',
            'jumlah_penerima' => 'required',
            'tipe_penerima' => 'required',
            'tgl_akhir_daftar' => 'required',
            'tgl_penyaluran' => 'required',
        ]);

        $bansos = BansosModel::create($validatedData);

        return redirect()->route('addKriteria',['bansos_id' => $bansos->bansos_id])->with('success', 'Data Berhasil Ditambahkan');
    }

    public function addKriteria($bansos_id){
        $breadcrumb = (object) [
            'title' => 'Insert Kriteria',
            'list' => ['Pages', 'Bansos','Create','Kriteria']
        ];
        return view('bansos.kriteria',['breadcrumb' => $breadcrumb, 'bansos_id' => $bansos_id]);
    }

    public function storeKriteria(Request $request, $bansos_id){
        $validatedData = $request->validate([
            'nama_kriteria.*' => 'required|string|max:255',
            'jenis_kriteria.*' => 'required|in:benefit,cost',
        ]);

        // dd($validatedData);

        foreach ($validatedData['nama_kriteria'] as $key => $namaKriteria) {
            KriteriaModel::create([
                'nama_kriteria' => $namaKriteria,
                'jenis_kriteria' => $validatedData['jenis_kriteria'][$key],
                'bansos_id' => $bansos_id,
            ]);
        }

        return redirect()->route('addSubKriteria',['bansos_id' => $bansos_id]);
    }

    public function addSubKriteria($bansos_id){
        $breadcrumb = (object) [
            'title' => 'Tambah Sub-Kriteria',
            'list' => ['Pages', 'Bansos','Create','Kriteria','Sub-Kriteria']
        ];
        $kriterias = KriteriaModel::where('bansos_id', $bansos_id)->get();
        return view('bansos.subkriteria',[
            'breadcrumb'=> $breadcrumb, 
            'bansos_id' => $bansos_id,
            'kriterias' => $kriterias
        ]);
    }

    public function storeSubKriteria($bansos_id, Request $request){
        $validatedData = $request->validate([
            'kriteria_id.*' => 'required',
            'nama_sub_kriteria.*' => 'required',
            'nilai.*' => 'required|integer|min:1|'
        ]);

        // dd($validatedData);

        foreach ($validatedData['kriteria_id'] as $key => $kriteria_id) {
            SubKriteriaModel::create([
                'kriteria_id' => $kriteria_id,
                'nama_sub_kriteria' => $validatedData['nama_sub_kriteria'][$key],
                'nilai' => $validatedData['nilai'][$key],
            ]);
        }

        // return redirect('/bansos')->with('success', 'Data berhasil disimpan');
        return redirect()->route('addBobot',['bansos_id' => $bansos_id]);
    }

    public function addBobot($bansos_id){
        // dd($bansos_id);
        $breadcrumb = (object) [
            'title' => 'Bobot Kriteria',
            'list' => ['Pages', 'Bansos','Create','Kriteria','Bobot']
        ];
        $benefitKriterias = KriteriaModel::where('bansos_id', $bansos_id)
                                ->where('jenis_kriteria', 'benefit')
                                ->get();

        $costKriterias = KriteriaModel::where('bansos_id', $bansos_id)
                                ->where('jenis_kriteria', 'cost')
                                ->get();
        return view('bansos.bobot',[
            'breadcrumb'=> $breadcrumb, 
            'bansos_id' => $bansos_id,
            'benefits' => $benefitKriterias,
            'costs' => $costKriterias
        ]);
    }

    public function storeBobot($bansos_id, Request $request){
        // dd($bansos_id);
        // Mengambil semua data input
        $input = $request->all();

        // Inisialisasi matriks untuk kriteria benefit dan cost
        $benefitMatrix = [];
        $costMatrix = [];

        // Memproses kriteria benefit
        foreach ($input as $key => $value) {
            if (strpos($key, 'benefit_') === 0) {
                list(, $id1, $id2) = explode('_', $key);
                $nilaiKey = 'nilaiB_' . $id1 . '_' . $id2;
                $nilai = (int) $input[$nilaiKey];

                // Mengatur nilai matriks
                $benefitMatrix[$id1][$id1] = 1;
                

                if ($value == $id1) {
                    $benefitMatrix[$id1][$id2] = $nilai;
                    $benefitMatrix[$id2][$id1] = 1 / $nilai;
                } else {
                    $benefitMatrix[$id1][$id2] = 1 / $nilai;
                    $benefitMatrix[$id2][$id1] = $nilai;
                }
                $benefitMatrix[$id2][$id2] = 1;
            }
        }

        // Memproses kriteria cost
        foreach ($input as $key => $value) {
            if (strpos($key, 'cost_') === 0) {
                // dd($value);
                list(, $id1, $id2) = explode('_', $key);
                $nilaiKey = 'nilaiC_' . $id1 . '_' . $id2;
                $nilai = (int) $input[$nilaiKey];

                // Mengatur nilai matriks
                $costMatrix[$id1][$id1] = 1;
               

                if ($value == $id1) {
                    $costMatrix[$id1][$id2] = $nilai;
                    $costMatrix[$id2][$id1] = 1 / $nilai;
                } else {
                    $costMatrix[$id1][$id2] = 1 / $nilai;
                    $costMatrix[$id2][$id1] = $nilai;
                }
                $costMatrix[$id2][$id2] = 1;
            }
        }

        // dd($benefitMatrix);
        // dd($costMatrix);

        $normalBen = $this->normalisasi($benefitMatrix); //normalisai benefit
        $normalCost = $this->normalisasi($costMatrix); //normalisasi cost
        // dd($normalCost);
        $benefitPW = $this->hitungPW($normalBen); //menghitung PW kriteria benefit
        $costPW = $this->hitungPW($normalCost); //menghitung PW kriteria cost
        // dd($costPW);

        if ($this->cekCR($benefitMatrix, $benefitPW)) {
            if ($this->cekCR($costMatrix, $costPW)) {
                $bobotBen = [];
                $bobotCost = [];
                foreach ($benefitPW as $key => $value) {
                    $bobotBen[$key] = $benefitPW[$key] / 2; 
                    KriteriaModel::where('kriteria_id', $key)->update(['bobot' => $bobotBen[$key]]);
                }
                foreach ($costPW as $key => $value) {
                    $bobotCost[$key] = $costPW[$key] / 2; 
                    KriteriaModel::where('kriteria_id', $key)->update(['bobot' => $bobotCost[$key]]);
                }
                // dd($bobotCost);
                // echo "BOBOT SUKSES";
                return redirect('/bansos')->with('success', 'Data berhasil disimpan');
            }else{
                return redirect()->route('addBobot',['bansos_id' => $bansos_id])->with('errorC','Penilaian Kriteria Cost tidak Konsisten, Ubah Penilaian!');
                // echo "Cost tidak konsisten";
            }
        }else{
            return redirect()->route('addBobot',['bansos_id'=> $bansos_id ])->with('errorB','Penilaian Kriteria Benefit tidak Konsisten, Ubah Penilaian!');
            // echo "Tidak konsisten";
        }
    }

    //AHP
    private function normalisasi($matrix){
        $total = [];
        foreach ($matrix as $key => $value) {
            // dd($key);
            foreach ($value as $kolom => $nilai ) {
                if (!isset($total[$kolom])) {
                    $total[$kolom] = 0;
                }
                $total[$kolom] += $nilai;
            }
        }
        // dd($total);

        $normal = [];
        foreach ($matrix as $key => $row) {
            foreach ($row as $kolom => $nilai) {
                $normal[$key][$kolom] = $nilai / $total[$kolom];
            }
        }
        // dd($normal);
        return $normal;
    }

    private function hitungPW($normal){
        $jumlah = [];
        $PW = [];
        foreach ($normal as $key => $value) {
            // dd($value);
            $count = 0;
            foreach ($value as $kolom => $nilai) {
                if (!isset($jumlah[$key])) {
                    $jumlah[$key] = 0;
                }
                $jumlah[$key] += $nilai;
                $count++;
            }
            $PW[$key] = $jumlah[$key] / $count;
        }
        // dd($jumlah);
        // dd($PW);

        return $PW;
    }

    private function cekCR($matrix, $PW){
        $hasil = [];
        // dd($matrix);
        // dd($PW);
        $count = 0;
        foreach ($matrix as $key => $row) {
            $total = 0;
            foreach ($row as $kolom => $nilai) {
                $total += $nilai * $PW[$kolom];
                
            }
            $hasil[$key] = $total / $PW[$key];
            $count++;
        }

        $lmax = 0;
        foreach ($hasil as $v => $value) {
            $lmax += $value;
        }
        $lmax = $lmax / $count;
        $ci = ($lmax - $count) / ($count-1);

        $tableRI = [
            1 => 0,
            2 => 0,
            3 => 0.58,
            4 => 0.9,
            5 => 1.12,
            6 => 1.24,
            7 => 1.32,
            8 => 1.41,
            9 => 1.45,
            10 => 1.51
        ];

        foreach ($tableRI as $n => $ri){
            if ($n == $count) {
                $cr = $ci / $ri;
            }
        }
        // dd($cr);

        return ($cr <= 0.1) ? true : false; 
    }

    public function destroy(string $id)
    {
        $check = BansosModel::find($id); 
        if (!$check) {
            return redirect('/bansos')->with('error', 'Data tidak ditemukan');
        }

        try {
            BansosModel::destroy($id);

            return redirect('/bansos')->with('success', 'Data berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/bansos')->with('error', 'Data gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}

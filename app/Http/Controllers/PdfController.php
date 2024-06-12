<?php

namespace App\Http\Controllers;

use App\Models\KegiatanModel;
use App\Models\SktmModel;
use App\Models\SpModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;

class PdfController extends Controller
{
    public function generatePdf($type, $id)
    {
        if ($type == 'sktm') {
            $sktm = SktmModel::findOrFail($id);
            $data = [
                'title' => 'Surat Keterangan Tidak Mampu',
                'date' => date('m/d/y'),
                'sktm' => $sktm,
                'nama' => $sktm->nama,
                'jeniskelamin' => $sktm->jenis_kelamin,
                'statusperkawinan' => $sktm->status_perkawinan,
                'pekerjaan' => $sktm->pekerjaan,
                'keperluan' => $sktm->keperluan

            ];
            $pdf = Pdf::loadView('surat.sktm.generate-product-pdf', $data);
            return $pdf->download('Surat Keterangan Tidak Mampu.pdf');
        } elseif($type == 'sp') {
            $sp = SpModel::findOrFail($id);
            $data = [
                'title' => 'Surat Pengantar',
                'date' => date('m/d/y'),
                'sp' => $sp,
                'nama' => $sp->nama,
                'jeniskelamin' => $sp->jenis_kelamin,
                'statusperkawinan' => $sp->status_perkawinan,
                'pekerjaan' => $sp->pekerjaan,
                'keperluan' => $sp->keperluan,
                'nik' => $sp->nik
            ];
            $pdf = Pdf::loadView('surat.sp.generate-product-pdf', $data);
            return $pdf->download('Surat Pengantar.pdf');
        }else{
            $kg = KegiatanModel::findOrFail($id);
            $data = [
                'title' => 'Surat Pengajuan Kegiatan',
                'date' => date('m/d/y'),
                'kg' => $kg,
                'nama' =>$kg->users->nama,
                'nama_kegiatan' => $kg ->nama_kegiatan,
                'alamat'=>$kg->alamat,
                'tanggal'=> $kg->tanggal,
             ];
    $pdf = Pdf::loadView('kegiatan.generate-product-pdf', $data);
    return $pdf->download('Surat Kegiatan.pdf');
        }
    }
    public function boot()
    {
        // Atur lokalitas Carbon ke bahasa Indonesia
        Carbon::setLocale('id');
    }
}

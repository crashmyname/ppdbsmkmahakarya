<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa\DataSiswa;
use App\Models\Siswa\DataOrtu;
use App\Models\Siswa\DataPendidikan;

class DataController extends Controller
{
    public function insertform(request $request)
    {
        // $request->validate([
        //     'nisn' => 'required|max:12|unique:data_siswas',
        //     'nama_lengkap' => 'required|min:5|max:50',
        //     'jenis_kelamin' => 'required|max:10',
        //     'tempat_lahir' => 'required|max:30',
        //     'tanggal_lahir' => 'required',
        //     'agama' => 'required|max:16',
        //     'alamat' => 'required|max:50',
        //     'rt' => 'required|max:4',
        //     'rw' => 'required|max:4',
        //     'kelurahan' => 'required|max:15',
        //     'kecamatan' => 'required|max:15',
        //     'kabupaten' => 'required|max:15',
        //     'provinsi' => 'required|max:15',
        //     'no_telp' => 'required|max:13',
        //     'email' => 'required|max:30|unique:data_siswas',]);
        // $request->validate([
        //     // 'id_siswa' => DataSiswa->id(),
        //     'nama_ayah' => 'required|max:50',
        //     'tempat_lahir_ayah' => 'required|max:30',
        //     'tgl_lahir_ayah' => 'required',
        //     'pendidikan_ayah' => 'required|max:20',
        //     'pekerjaan_ayah' => 'required|max:20',
        //     'penghasilan_ayah' => 'required|max:30',
        //     'nama_ibu' => 'required|max:50',
        //     'tempat_lahir_ibu' => 'required|max:30',
        //     'tgl_lahir_ibu' => 'required',
        //     'pendidikan_ibu' => 'required|max:20',
        //     'pekerjaan_ibu' => 'required|max:20',
        //     'penghasilan_ibu' => 'required|max:30',
        //     'nama_wali' => '',
        //     'tempat_lahir_wali' => '',
        //     'tgl_lahir_wali' => '',
        //     'pendidikan_wali' => '',
        //     'pekerjaan_wali' => '',
        //     'penghasilan_wali' => '',]);
        // $request->validate([
        //     // 'id_pendidikan' => DataSiswa->id(),
        //     'jns_pendaftaran' => 'required|max:10',
        //     'jalur_pendaftaran' => 'required|max:10',
        //     'nama_sekolah' => 'required|max:50',
        //     'alamat_sekolah' => 'required|max:50',
        //     'jurusan' => 'required|max:40',
        // ]);
        // // // dd($validatedData);
        // // $datasiswa = DataSiswa::create($validatedData);
        // // $dataortu = DataOrtu::create($validatedData);
        // // $datapendidikan = DataPendidikan::create($validatedData);

        // $datasiswa = DataSiswa::create([
        //     'nisn' => $request->nisn,
        //     'nama_lengkap' => $request->nama_lengkap,
        //     'jenis_kelamin' => $request->jenis_kelamin,
        //     'tempat_lahir' => $request->tempat_lahir,
        //     'tanggal_lahir' => $request->tanggal_lahir,
        //     'agama' => $request->agama,
        //     'alamat' => $request->alamat,
        //     'rt' => $request->rt,
        //     'rw' => $request->rw,
        //     'kelurahan' => $request->kelurahan,
        //     'kecamatan' => $request->kecamatan,
        //     'kabupaten' => $request->kabupaten,
        //     'provinsi' => $request->provinsi,
        //     'no_telp' => $request->no_telp,
        //     'email' => $request->email,
        // ]);

        // $dataortu = DataOrtu::create([
        //     'id_siswa' => $datasiswa->lastInsertId(),
        //     'nama_ayah' => $request->nama_ayah,
        //     'tempat_lahir_ayah' => $request->tempat_lahir_ayah,
        //     'tgl_lahir_ayah' => $request->tgl_lahir_ayah,
        //     'pendidikan_ayah' => $request->pendidikan_ayah,
        //     'pekerjaan_ayah' => $request->pekerjaan_ayah,
        //     'penghasilan_ayah' => $request->penghasilan_ayah,
        //     'nama_ibu' => $request->nama_ibu,
        //     'tempat_lahir_ibu' => $request->tempat_lahir_ibu,
        //     'tgl_lahir_ibu' => $request->tgl_lahir_ibu,
        //     'pendidikan_ibu' => $request->pendidikan_ibu,
        //     'pekerjaan_ibu' => $request->pekerjaan_ibu,
        //     'penghasilan_ibu' => $request->penghasilan_ibu,
        //     'nama_wali' => $request->nama_wali,
        //     'tempat_lahir_wali' => $request->tempat_lahir_wali,
        //     'tgl_lahir_wali' => $request->tgl_lahir_wali,
        //     'pendidikan_wali' => $request->pendidikan_wali,
        //     'pekerjaan_wali' => $request->pekerjaan_wali,
        //     'penghasilan_wali' => $request->penghasilan_wali,
        // ]);

        // $datapendidikan = DataPendidikan::create([
        //     'id_siswa' => $datasiswa->lastInsertId(),
        //     'jns_pendaftaran' => $request->jns_pendaftaran,
        //     'jalur_pendaftaran' => $request->jalur_pendaftaran,
        //     'nama_sekolah' => $request->nama_sekolah,
        //     'alamat_sekolah' => $request->alamat_sekolah,
        //     'jurusan' => $request->jurusan,
        // ]);

        $validatedData = $request->validate([
            'id_user' => 'required',
            'nisn' => 'required|max:12|unique:data_siswas',
            'nama_lengkap' => 'required|min:5|max:50',
            'jenis_kelamin' => 'required|max:10',
            'tempat_lahir' => 'required|max:30',
            'tanggal_lahir' => 'required',
            'agama' => 'required|max:16',
            'alamat' => 'required|max:50',
            'rt' => 'required|max:4',
            'rw' => 'required|max:4',
            'kelurahan' => 'required|max:15',
            'kecamatan' => 'required|max:15',
            'kabupaten' => 'required|max:15',
            'provinsi' => 'required|max:15',
            'no_telp' => 'required|max:13',
            'email' => 'required|max:30|unique:data_siswas',
            'nama_ayah' => 'required|max:50',
            'tempat_lahir_ayah' => 'required|max:30',
            'tgl_lahir_ayah' => 'required',
            'pendidikan_ayah' => 'required|max:20',
            'pekerjaan_ayah' => 'required|max:20',
            'penghasilan_ayah' => 'required|max:30',
            'nama_ibu' => 'required|max:50',
            'tempat_lahir_ibu' => 'required|max:30',
            'tgl_lahir_ibu' => 'required',
            'pendidikan_ibu' => 'required|max:20',
            'pekerjaan_ibu' => 'required|max:20',
            'penghasilan_ibu' => 'required|max:30',
            'nama_wali' => '',
            'tempat_lahir_wali' => '',
            'tgl_lahir_wali' => '',
            'pendidikan_wali' => '',
            'pekerjaan_wali' => '',
            'penghasilan_wali' => '',
            'jns_pendaftaran' => 'required|max:10',
            'jalur_pendaftaran' => 'required|max:10',
            'nama_sekolah' => 'required|max:50',
            'alamat_sekolah' => 'required|max:50',
            'jurusan' => 'required|max:40',
        ]);

        DataSiswa::create($validatedData);
        DataOrtu::create($validatedData);
        DataPendidikan::create($validatedData);
        
        $request->session()->flash('sukses', 'Data berhasil tersimpan');
        return redirect('/dashboard');
    }

    public function info()
    {
        return view('info');
    }
}

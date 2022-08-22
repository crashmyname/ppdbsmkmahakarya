<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa\DataSiswa;
use App\Models\Siswa\DataPendidikan;
use App\Models\Siswa\DataPembayaran;
use App\Models\Siswa\DataPesan;
use App\Models\Siswa\DataJurusan;
use App\Models\User;
use App\Models\Sekolah;
// use Illuminate\Http\UploadedFile\Public;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

    public function form()
    {
        $datajurusan = DataJurusan::all();
        // $datasekolah = Sekolah::where('bentuk','smp')->get();
        $datasekolah = Sekolah::all();
        return view('user.form_pendaftaran',compact('datajurusan','datasekolah'));
    }

    public function form_pembayaran()
    {
        // return view('user.form_pembayaran', [
        //     'datasiswa' => DataSiswa::where('id_siswa', auth()->user()->id)->get()
        // ]);
        // return view('user.form_pembayaran', [
        //     'datasiswa' => User::join('data_pendidikans','data_pendidikans.id','=','users.id')->join('data_siswas','data_siswas.id_siswa','=','users.id')
        //     ->get()
        //     // 'datasiswa' => DataSiswa::join('data_pendidikans','data_pendidikans.id','=','data_siswas.id_siswa')->join('users','users.id','=','data_siswas.id_siswas')
        //     // ->join('user','user.id','=','data_siswas.id_siswa')
        // ]);
        // // $datasiswa = DB::table('data_siswas')
        // //                 ->crossJoin('data_pendidikans')
        // //                 ->get();
        // // return view('user.form_pembayaran',[DataSiswa=>$datasiswa]);
        // // $data = [
        // //     'datasiswa' => $this->DataSiswa->allData(),
        // // ];
        // return view('user.form_pembayaran','$datasiswa');
        $datajurusan = DataJurusan::all();
        $datapendidikan = DataPendidikan::join('users','users.id','=','data_pendidikans.id_user')->get();
        return view('user.form_pembayaran',compact('datajurusan','datapendidikan'));
    }

    public function faq()
    {
        return view('user.faq');
    }

    public function bayar(request $request)
    {
        // ddd($request);
        // return $request->file('bukti')->store('post-images');
        $validatedData = $request->validate([
            'id_user' => 'required|unique:data_pembayarans',
            'nama_siswa' => 'required|max:50|unique:data_pembayarans',
            'jurusan' => 'required|max:40',
            'biaya' => 'required|max:255',
            'bukti' => 'image|file|max:2048'
        ]);

        if($request->file('bukti')){
            $validatedData['bukti'] = $request->file('bukti')->store('post-image');
        }

        DataPembayaran::create($validatedData);
        $request->session()->flash('sukses', 'Bukti berhasil di upload');
        return redirect('/form_pembayaran');
    }

    public function pesan(request $request)
    {
        // ddd($request);
        $validatedData = $request->validate([
            'nama_siswa' => 'required|max:255',
            'pesan' => 'required|max:255'
        ]);
        
        DataPesan::create($validatedData);
        return redirect('/faq')->with('sukses','Pesan terkirim');
    }

    public function hasil(request $request)
    {
        $pagination = 5;
        $datasiswa = DataSiswa::paginate($pagination);
        return view('hasilseleksi',compact('datasiswa'))->with('no',($request->input('page',1)-1)*$pagination);
    }

    public function formupprofil($id)
    {
        $datauser = User::where('id',$id)->get();
        return view('user.form_profil',compact('datauser'));
    }

    public function upprofil(request $request,$id)
    {
        // $validatedData = $request->user()->update([
        //     'name' => 'required|max:255|unique:user',
        //    'email' => 'required|email|unique:user',
        //     'password' => Hash::make($request->get('password'))
        // ]);
        $validatedData = $request->validate([
            'name' => 'required|max:255|unique:users',
           'email' => 'required|email|unique:users',
           'password' => 'required|max:255',
        ]);

        // if(Hash::check($validatedData, auth()->user()->password))
        // {
        //     auth()->user()->update($request->only('name','email','password'));
        //     return back()->with('message','Password kamu berhasil diupdate');
        // }
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::where('id',$id)->update($validatedData);
        $request->session()->flash('sukses', 'Berhasil ganti profil');
        return redirect('/dashboard');
    }

}

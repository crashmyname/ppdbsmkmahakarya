<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa\DataSiswa;
use App\Models\Siswa\DataOrtu;
use App\Models\Siswa\DataPendidikan;
use App\Models\Siswa\DataPembayaran;
use App\Models\Siswa\DataPesan;
use App\Models\Siswa\DataJurusan;
use App\Models\User;
use App\Models\Sekolah;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function dashboard()
    {
        // return view('admin.dashboard',[
        //     'datasiswa' => DataSiswa::where('nama_lengkap')->get()]);
        // $datasiswa = DataSiswa::all('nama_lengkap');
        // $datacount = $datasiswa->count();
        $datasiswa = DataSiswa::all();
        $dataortu = DataOrtu::all();
        $datapendidikan = DataPendidikan::all();
        $datapembayaran = DataPembayaran::all();
        $datapesan = DataPesan::all();
        $datajurusan = DataJurusan::all();
        $datauser = User::all();
        return view('admin.dashboard',compact('datasiswa','dataortu','datapendidikan','datapembayaran','datapesan','datajurusan','datauser'));
    }

    public function loginadmin(request $request)
    {
        // dd($request);
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/admindashboard');
        }
            return back()->with('loginError','email atau passwrod salah');
    }

    public function logoutadmin(request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/admin');
    }

    public function datasiswa(request $request)
    {
        $pagination = 5;
        $datasiswa = DataSiswa::paginate($pagination);
        return view('admin.datasiswa',compact('datasiswa'))->with('no',($request->input('page',1)-1)*$pagination);
    }
    
    public function datajurusan(request $request)
    {
        $pagination = 5;
        $datajurusan = DataJurusan::paginate($pagination);
        return view('admin.datajurusan',compact('datajurusan'))->with('no',($request->input('page',1)-1)*$pagination);
    }

    public function dataortu(request $request)
    {
        $pagination = 5;
        $dataortu = DataOrtu::paginate($pagination);
        return view('admin.dataortu',compact('dataortu'))->with('no',($request->input('page',1)-1)*$pagination);
    }

    public function datapendidikan(request $request)
    {
        $pagination = 5;
        $datapendidikan = DataPendidikan::paginate($pagination);
        return view('admin.datapendidikan',compact('datapendidikan'))->with('no',($request->input('page',1)-1)*$pagination);
    }

    public function datapesan(request $request)
    {
        $pagination = 5;
        $datapesan = DataPesan::paginate($pagination);
        return view('admin.datapesan',compact('datapesan'))->with('no',($request->input('page',1)-1)*$pagination);
    }

    public function datapembayaran(request $request)
    {
        $pagination = 5;
        $datapembayaran = DataPembayaran::paginate($pagination);
        return view('admin.datapembayaran',compact('datapembayaran'))->with('no',($request->input('page',1)-1)*$pagination);
    }

    public function datauser(request $request)
    {
        $pagination = 5;
        $datauser = User::paginate($pagination);
        return view('admin.datauser',compact('datauser'))->with('no',($request->input('page',1)-1)*$pagination);
    }

    public function show($id)
    {
        // dd($id);
        // $datasiswa = DataSiswa::where('id_siswa',$id)->get();
        $datasiswa = DataSiswa::join('data_pendidikans','data_pendidikans.id','=','data_siswas.id_siswa')->join('data_ortus','data_ortus.id_ortu','=','data_siswas.id_siswa')->where('id_siswa', $id)->get();
        return view('admin.showuser',compact('datasiswa'));
        
        // $dataortu = DataOrtu::all();
        // $datapendidikan = DataPendidikan::all();
        // $datasiswa = DB::table('data_siswas')->where('id_siswa',$id)->get();
        // // return $datasiswa;
        // view('admin.showuser',['datasiswa'=>$datasiswa]);
    }

    public function destroy(request $request,$id)
    {
        // $datasiswa = DataSiswa::join('data_pendidikans','data_pendidikans.id','=','data_siswas.id_siswa')->join('data_ortus','data_ortus.id_ortu','=','data_siswas.id_siswa')->where('id_siswa',$id)->delete();
        $datasiswa = DataSiswa::where('id_siswa',$id)->delete();
        $dataortu = DataOrtu::where('id_ortu',$id)->delete();
        $datapendidikan = DataPendidikan::where('id',$id)->delete();
        // $datasiswa = DataOrtu::join('data_pendidikans','data_pendidikans.id','=','data_ortus.id_ortu')->join('data_siswas','data_siswas.id_siswa','=','data_ortus.id_ortu')->where('id_ortu',$id)->delete();
        // $datasiswa = DataPendidikan::join('data_siswas','data_siswas.id_siswa','=','data_pendidikans.id')->join('data_ortus','data_ortus.id_ortu','=','data_pendidikans.id')->where('id',$id)->delete();
        // $data = DataSiswa::find('id_siswa',$id);
        // $data = DataOrtu::find('id_ortu',$id);
        // $data = DataPendidikan::find('id',$id);
        // $data->delete();
        $request->session()->flash('delete', 'Data Berhasil dihapus');
        return redirect('/datasiswa');
    }

    public function update($id)
    {
        $datasekolah = Sekolah::all();
        $datasiswa = DataSiswa::join('data_pendidikans','data_pendidikans.id','=','data_siswas.id_siswa')->join('data_ortus','data_ortus.id_ortu','=','data_siswas.id_siswa')->where('id_siswa', $id)->get();
        return view('admin.updatedata',compact('datasiswa','datasekolah'));
    }

    public function updated(request $request, $id)
    {
        $validatedData = $request->validate([
            'nisn' => 'required|max:12',
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
            'email' => 'required|max:30',
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
            // 'stts_sekolah' => 'required|max:255',
            'alamat_sekolah' => 'required|max:50',
            'jurusan' => 'required|max:40',

        ]);

        // return view('admin.updatedata',[
        //     'datasiswa' => DataSiswa::join('data_pendidikans','data_pendidikans.id','=','data_siswas.id_siswa')->join('data_ortus','data_ortus.id_ortu','=','data_siswas.id_siswa')->where('id_siswa', $id)->update($validatedData)]);
        $datasiswa = DataSiswa::join('data_pendidikans','data_pendidikans.id','=','data_siswas.id_siswa')->join('data_ortus','data_ortus.id_ortu','=','data_siswas.id_siswa')->where('id_siswa', $id)->update($validatedData);
        // $datasiswa = DataOrtu::where('id_ortu',$id)->update($validatedData);
        // $datasiswa = DataPendidikan::where('id',$id)->update($validatedData);
        // $datasiswa = DataSiswa::update($validatedData)->where('id_siswa',$id);
        // dd($datasiswa);
        // DataOrtu::where('id_ortu',$id)->update($validatedData);
        // DataPendidikan::where('id',$id)->update($validatedData);
        // DataOrtu::update($validatedData);
        // DataPendidikan::update($validatedData);
        // $request->session()->flash('sukses', 'Data berhasil diubah');
        $request->session()->flash('sukses', 'Data Siswa berhasil dirubah');
        return redirect('/datasiswa');
    }

    public function formjurusan()
    {
        return view('admin.formjurusan');
    }

    public function addjurusan(request $request)
    {
        $validatedData = $request->validate([
            'nama_jurusan' => 'required|max:100',
        ]);
        DataJurusan::create($validatedData);
        $request->session()->flash('sukses', 'Jurusan berhasil ditambah');
        return redirect('/datajurusan');
    }

    public function formeditjurusan($id)
    {
        $datajurusan = DataJurusan::where('id',$id)->get();
        return view('admin.formeditjurusan',compact('datajurusan'));
    }

    public function editjurusan(request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_jurusan' => 'required|max:100',
        ]);
        DataJurusan::where('id',$id)->update($validatedData);
        $request->session()->flash('update', 'Jurusan berhasil diubah');
        return redirect('/datajurusan');
    }

    public function deljurusan(request $request,$id)
    {
        $datajurusan = DataJurusan::where('id',$id)->delete();
        $request->session()->flash('delete', 'Jurusan berhasil dihapus');
        return redirect('/datajurusan');
    }

    public function vlaporan(request $request)
    {
        
        $datasekolah = DataPendidikan::distinct()->get(['nama_sekolah']);
        $datajurusan = DataPendidikan::distinct()->get(['jurusan']);
        $chart = [];
        $data = [];

        foreach($datajurusan as $s){
            $chart1[] = $s->jurusan;
            $char1[] = $s->where('jurusan', $s->jurusan);
            $data1[] = $s->where('jurusan', $s->jurusan)->count();
            $all1[]= $s->distinct()->get()->count();
        }
        foreach($datasekolah as $s){
            $chart[] = $s->nama_sekolah;
            $char[] = $s->where('nama_sekolah', $s->nama_sekolah);
            $data[] = $s->where('nama_sekolah', $s->nama_sekolah)->count();
            $all[]= $s->distinct()->get()->count();
        }
        return view('admin.laporan',compact('datasekolah','datajurusan','chart','data','char','all'));
    }

    public function dlaporan(request $request,$nama_sekolah)
    {
        $datasiswa = DataSiswa::join('data_pendidikans','data_pendidikans.id','=','data_siswas.id_siswa')->join('data_ortus','data_ortus.id_ortu','=','data_siswas.id_siswa')->where('nama_sekolah', $nama_sekolah)->get();
        return view('admin.dlaporan',compact('datasiswa'));
    }

    public function djlaporan(request $request,$jurusan)
    {
        $datajurusan = DataSiswa::join('data_pendidikans','data_pendidikans.id','=','data_siswas.id_siswa')->join('data_ortus','data_ortus.id_ortu','=','data_siswas.id_siswa')->where('jurusan', $jurusan)->get();
        return view('admin.djlaporan',compact('datajurusan'));
    }

    public function delpembayaran(request $request,$id)
    {
        $datapembayaran = DataPembayaran::where('id_bayar',$id)->delete();
        $request->session()->flash('delete', 'Data Berhasil dihapus');
        return redirect('/datapembayaran');
    }

    public function formeditpembayaran(request $request,$id)
    {
        $datapembayaran = DataPembayaran::where('id_bayar',$id)->get();
        return view('admin.fepembayaran',compact('datapembayaran'));
    }

    public function epembayaran(request $request,$id)
    {
        $validatedData = $request->validate([
            'nama_siswa' => 'required|max:50',
            'jurusan' => 'required|max:40',
            // 'biaya' => 'required|max:255',
            'bukti' => 'image|file|max:2048'
        ]);
        if($request->file('bukti')){
            $validatedData['bukti'] = $request->file('bukti')->store('post-image');
        }
        DataPembayaran::where('id_bayar',$id)->update($validatedData);
        $request->session()->flash('update', 'Data berhasil diubah');
        return redirect('/datapembayaran');
    }

    public function feuser(request $request,$id)
    {
        $datauser = DataUser::where('id',$id)->get();
        return view('admin.feuser',compact('datauser'));
    }

    public function euser(request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
           'email' => 'required|email',
           'password' => 'required|max:100',
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        DataUser::where('id',$id)->update($validatedData);
        $request->session()->flash('update', 'Data berhasil diubah');
        return redirect('/datauser');
    }

    public function deluser(request $request,$id)
    {
        $datauser = DataUser::where('id',$id)->delete();
        $request->session()->flash('delete', 'Data Berhasil dihapus');
        return redirect('/datauser');
    }

}

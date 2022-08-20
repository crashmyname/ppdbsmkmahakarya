@include('admin.header')

<div class="container-fluid">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Jurusan</h1>
        <p class="mb-4">Berikut adalah halaman Data Jurusan</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                @if(session()->has('sukses'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('sukses')}}
                  <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if(session()->has('update'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  {{ session('update')}}
                  <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if(session()->has('delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('delete')}}
                  <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <h6 class="m-0 font-weight-bold text-primary">Table Jurusan</h6>
                @if(!auth()->check() || auth()->user()->email !== 'kepalasekolah@gmail.com')
                <a href="/formjurusan" class="btn btn-success float-right">Tambah</a>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Nama Jurusan</th>
                                @if(!auth()->check() || auth()->user()->email !== 'kepalasekolah@gmail.com')
                                <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tfoot>
                            @foreach ($datajurusan as $item)
                            <tr align="center">
                                <th>{{++$no}}</th>
                                <th>{{$item['nama_jurusan']}}</th>
                                @if(!auth()->check() || auth()->user()->email !== 'kepalasekolah@gmail.com')
                                <th><a href="/fejurusan/{{$item->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                  </svg></a> |<form action="/deletejurusan/{{$item->id}}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                  <button onclick="return confirm('Apakah yakin mau menghapus data?')" class="border-0 bg-white text-primary"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                  </svg></button></form></th>@endif
                            </tr>
                            @endforeach
                        </tfoot>
                        </tbody>
                    </table>
                    {{$datajurusan->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')
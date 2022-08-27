@include('admin.header')
<br>
<div class="container-fluid">
           
    <!-- Horizontal Form -->
    <!-- DATA SISWA -->
    <div class="card card-info col-8">
        <div class="card-header">
            <h3 class="card-title">Edit Pembayaran</h3>
        </div>
        
        @foreach ($datapembayaran as $item)
                <form action="/epembayaran/{{$item->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="Nisn" class="col-sm-4 col-form-label">Nama Siswa</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_siswa" class="form-control" placeholder="Nama Siswa" required value="{{$item->nama_siswa}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Nisn" class="col-sm-4 col-form-label">Jurusan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="jurusan" class="form-control" placeholder="Nama Jurusan" required value="{{$item->jurusan}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Nisn" class="col-sm-4 col-form-label">Bukti</label>
                                <div class="col-sm-8">
                                    <input type="file" name="bukti" id="image" value="{{$item->bukti}}" required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/datapembayaran" class="btn btn-warning">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            </form>
</div>


@include('admin.footer')
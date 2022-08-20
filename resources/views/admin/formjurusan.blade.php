@include('admin.header')
<br>
<div class="container-fluid">
           
            <form action="/addjurusan" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Horizontal Form -->
            <!-- DATA SISWA -->
            <div class="card card-info col-8">
                <div class="card-header">
                    <h3 class="card-title">Tambah Jurusan</h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="Nisn" class="col-sm-4 col-form-label">Nama Jurusan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_jurusan" class="form-control" placeholder="Nama Jurusan" required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
</div>


@include('admin.footer')
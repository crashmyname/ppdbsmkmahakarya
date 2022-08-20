@include('admin.header')
<br>
<div class="container-fluid">
           
    <!-- Horizontal Form -->
    <!-- DATA SISWA -->
    <div class="card card-info col-8">
        <div class="card-header">
            <h3 class="card-title">Edit Jurusan</h3>
        </div>
        
        @foreach ($datajurusan as $item)
                <form action="/ejurusan/{{$item->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="Nisn" class="col-sm-4 col-form-label">Nama Jurusan</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_jurusan" class="form-control" placeholder="Nama Jurusan" required value="{{$item->nama_jurusan}}">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            </form>
</div>


@include('admin.footer')
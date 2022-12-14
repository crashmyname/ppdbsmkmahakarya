@include('user.header');
                <!-- End of Topbar -->                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Halaman Utama</h1>
                    <p><b>Hai... {{auth()->user()->name}}</b> Silahkan Lengkapi pendaftaranmu.</p>
                    @if(session()->has('sukses'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      {{ session('sukses')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if(session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {{ session('loginError')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                </div>
                <!-- /.container-fluid -->
@include('user.footer');
<!doctype html>
<html lang="en">

@extends('admin.head')

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    @extends('admin.sidebar')
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
                    <button type="button" class="btn btn-outline-primary m-1"><a href="{{ route('jabatan.create') }}">Tambah Data</a></button>
                    @if (session('success'))
                    <div>{{ session('success') }}</div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jabatan as $pg)
                                <tr>
                                    <td>{{ $pg->id }}</td>
                                    <td>{{ $pg->nama_jabatan }}</td>
                                    <td>
                                      <div class="d-flex">
                                          <!-- Button Edit -->
                                          <a href="{{ route('jabatan.edit', $pg->id) }}" class="btn btn-outline-primary m-1">Edit</a>
                                          
                                          <!-- Button Hapus -->
                                          <form action="{{ route('jabatan.destroy', $pg->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="btn btn-outline-danger m-1">Hapus</button>
                                          </form>
                                      </div>
                                  </td>
                                  
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>  
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com/" target="_blank"
              class="pe-1 text-primary text-decoration-underline">ThemeWagon</a></p>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="container-fluid">

                </div>
                <!-- /.container-fluid -->
            </div>
      </div>
    </div>
  </div>
</body>

</html>
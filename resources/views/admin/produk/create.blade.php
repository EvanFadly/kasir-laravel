@extends('admin.template.master')

@section('css')
@endsection

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $title }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ $title }}</a></li>
              <li class="breadcrumb-item active">{{ $subtitle }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $title }}</h3>
                <a href="{{ route('produk.index') }}" class="btn btn-warning btn-sm float-right"><i class="fas fa-arrow-left"> </i> Kembali</a>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                <div id="error-container" style="display: none">
                  <div class="alert alert-danger">
                    <p id="error-message"></p>
                  </div>
                </div>
            </div>
            <div class="card-body">
                <form id="form-create-produk" method="post">
                    <label for="NamaProduk">Nama Produk</label>
                    <input type="text" name="NamaProduk" class="form-control" required>
                    <label for="Harga">Harga</label>
                    <input type="number" name="Harga" class="form-control" required>
                    <label for="Stok">Stok</label>
                    <input type="number" name="Stok" class="form-control" required>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('js')
  <script>
    $(document).ready(function() {
      $('#form-create-produk').submit(function(e) {
        e.preventDefault();
        dataForm = $(this).serialize() + "&_token={{ csrf_token() }}";
        $.ajax({
          type: "POST",
          url: "{{ route('produk.store') }}",
          data: dataForm,
          dataType: "json",
          success: function(data) {
            Swal.fire({
              icon: 'success',
              title: 'Success',
              text: data.message,
              confirmButtonText: 'Ok'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('produk.index') }}";
                }
            })
            $('input[name="NamaProduk"]').val('');
            $('input[name="Harga"]').val('');
            $('input[name="Stok"]').val('');
          },
          error: function(data) {
            console.log(data.message);
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: data.message,
              confirmButtonText: 'Ok'
            })
            if (data.status == 500) {
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: data.responseJSON.message,
                confirmButtonText: 'Ok'
              })
            }
          }
        });
      });
    });
  </script>
@endsection
@extends('templates/header')

@section('content')

  <div style="">
  <h3 class="mb-2">Paket</h3>

  <button type="button" class="mb-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPaket">
      <i class="bi bi-plus-lg">Tambah Paket</i>
  </button>
            <table class="table" id="tablePaket">
              <thead>
                <tr class="table-info">
                    <th scope="col">No.</th>
                    <th scope="col">Id Outlet</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Nama Paket</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  ?>
                  @foreach ($data as $item)
                <tr>
                    <td scope="row">{{ $no++ }}</td>
                    <td>{{ $item->id_outlet }}</td>
                    <td>{{ $item->jenis }}</td>
                    <td>{{ $item->nama_paket }}</td>
                    <td>{{ $item->harga }}</td>
                    <td>
                      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalUpdate{{ $item->id }}">
                        <i class="bi bi-pencil-square"></i>
                      </button> 
                      <form action="{{ url('/paket', $item->id) }}" method="post" class="d-inline">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        {{-- <a href="" method="post" class="btn btn-danger">Hapus</a> --}}
                        <button type="submit" class="btn btn-danger swalDefaultdelete" onclick="return confirm('Apakah anda yakin?')">
                          <i class="bi bi-trash-fill"></i>
                        </button>
                      </form>
                    </td>
                </tr>
                    @endforeach
              </tbody>
            </table>
  </div>

  {{-- modal input --}}
  <div class="modal fade" id="tambahPaket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Input Data Paket</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ ('paket') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
              <label>Id Outlet</label>
              <input type="text" class="form-control" name="id_outlet" id="id_outlet" required>
            </div>
            <div class="mb-2">
              <label>Jenis</label>
              <select name="jenis" id="jenis">
                <option value="kiloan">Kiloan</option>
                <option value="selimut">Selimut</option>
                <option value="bed_cover">Bed Cover</option>
                <option value="kaos">Kaos</option>
                <option value="lain">Dan lain-lain..</option>
              </select>
            </div>
            <div class="mb-2">
              <label>Nama Paket</label>
              <input type="text" class="form-control" name="nama_paket" id="nama_paket" required>
            </div>
            <div class="mb-2">
              <label>Harga</label>
              <input type="text" class="form-control" name="harga" id="harga" required>
            </div>
          {{-- form --}}
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary swalDefaultinput">Tambah</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>

  {{-- modal update --}}
  @foreach ($data as $item)
    <div class="modal fade" id="exampleModalUpdate{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title fw-normal" id="exampleModalUpdate">Update data Paket</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form method="post" action="{{ route('paket.update', $item->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <label for="id_outlet">Id Outlet</label>
                  <input type="text" class="form-control" id="id_outlet" name="id_outlet" value="{{ $item->id_outlet }}" required>
                <input type="hidden" name="id" value="{{ $item->id }}">
                  <div class="mb-2">
                  <label for="jenis">Jenis</label>
                  <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $item->jenis }}" required>

                  <label for="nama_paket">Nama Paket</label>
                  <input type="text" class="form-control" id="nama_paket" name="nama_paket" value="{{ $item->nama_paket }}" required>

                  <label for="harga">Harga</label>
                  <input type="text" class="form-control" id="harga" name="harga" value="{{ $item->harga }}" required>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary swalDefaultupdate">Ubah</button>
                  </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  @endforeach
  @push('script')
      @if (session('input'))
    <script>
      $(function(){
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 2500,
        })
        Toast.fire({
          icon: 'success',
          title: 'Data Berhasil Ditambahkan'
        });
      });
    </script>
      @endif 

      @if (session('update'))
    <script>
      $(function(){
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 2500,
        })
        Toast.fire({
          icon: 'success',
          title: 'Data Berhasil Diubah'
        });
      });
    </script>
      @endif

      @if (session('delete'))
    <script>
      $(function(){
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 2500,
        })
        Toast.fire({
          icon: 'success',
          title: 'Data Berhasil Dihapus'
        });
      });
    </script>
      @endif
  @endpush

@endsection

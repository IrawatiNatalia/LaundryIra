@extends('templates/header')

@section('content')

  <div style="">
  <h3 class="mb-2">Outlet</h3>

  <button type="button" class="mb-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahOutlet">
      <i class="bi bi-plus-lg">Tambah Outlet</i>
  </button>
            <table class="table" id="tableOutlet">
              <thead>
                <tr class="table-info">
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Telepon</th>
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
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->tlp }}</td>
                    <td>
                      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalUpdate{{ $item->id }}">
                        <i class="bi bi-pencil-square"></i>
                      </button> 
                      <form action="{{ url('/outlet', $item->id) }}" method="post" class="d-inline">
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

  <!-- Modal -->
  {{-- modal input --}}
  <div class="modal fade" id="tambahOutlet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Input Data Outlet</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ ('outlet') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
              <label>Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" required>
            </div>
            <div class="mb-2">
              <label>Alamat</label>
              <input type="text" class="form-control" name="alamat" id="alamat" required>
            </div>
            <div class="mb-2">
              <label>Telepon</label>
              <input type="text" class="form-control" name="tlp" id="tlp" required>
            </div>
          {{-- form --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary swalDefaultinput">Ubah</button>
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
            <h4 class="modal-title fw-normal" id="exampleModalUpdate">Update data Outlet</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('outlet.update', $item->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <input type="hidden" name="id" value="{{ $item->id }}">
                <div class="mb-2">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama" value="{{ $item->nama }}" required>

                  <label for="alamat">Alamat</label>
                  <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $item->alamat }}" required>

                  <label for="tlp">Telepon</label>
                  <input type="text" class="form-control" id="tlp" name="tlp" value="{{ $item->tlp }}" required>
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
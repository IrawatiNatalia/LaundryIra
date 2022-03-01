@extends('templates/header')

@section('content')

  <div style="">
  <h3 class="mb-2">Barang Inventaris</h3>

  <button type="button" class="mb-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahBarang">
      <i class="bi bi-plus-lg">Tambah Barang</i>
  </button>
            <table class="table" id="tableBarang">
              <thead>
                <tr class="table-info">
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Merk Barang</th>
                    <th>Qty</th>
                    <th>Kondisi</th>
                    <th>Tgl Pengadaan</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no = 1;
                  ?>
                  @foreach ($data as $item)
                  <tr>
                    <td scope="row">{{ $no++ }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->merk_barang }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->kondisi }}</td>
                    <td>{{ $item->tgl_pengadaan }}</td>
                    <td>
                      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalUpdate{{ $item->id }}">
                        <i class="bi bi-pencil-square"></i>
                      </button> 
                      <form action="{{ url('/barangInventaris', $item->id) }}" method="post" class="d-inline">
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
  <div class="modal fade" id="tambahBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Input Data Barang</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ ('barangInventaris') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
              <label>Nama Barang</label>
              <input type="text" class="form-control" name="nama_barang" id="nama_barang" required>
            </div>
            <div class="mb-2">
              <label>Merk Barang</label>
              <input type="text" class="form-control" name="merk_barang" id="merk_barang" required>
            </div>
            <div class="mb-2">
                <label>Qty</label>
                <input type="text" class="form-control" name="qty" id="qty" required>
              </div>
            <div class="mb-2">
                <label>Kondisi</label>
                <select name="kondisi" id="kondisi">
                  <option value="layak_pakai">Layak Pakai</option>
                  <option value="rusak_ringan">Rusak Ringan</option>
                  <option value="rusak_baru">Rusak Baru</option>
                </select>
              </div>
            <div class="mb-2">
              <label>Tgl Pengadaan</label>
              <input type="date" class="form-control" name="tgl_pengadaan" id="tgl_pengadaan" required>
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
            <h4 class="modal-title fw-normal" id="exampleModalUpdate">Update data Barang</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('barangInventaris.update', $item->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <input type="hidden" name="id" value="{{ $item->id }}">
                <div class="mb-2">
                  <label for="nama_barang">nama_barang Barang</label>
                  <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $item->nama_barang }}" required>

                  <label for="merk_barang">Merk Barang</label>
                  <input type="text" class="form-control" id="merk_barang" name="merk_barang" value="{{ $item->merk_barang }}" required>

                  <label for="qty">Qty</label>
                  <input type="text" class="form-control" id="qty" name="qty" value="{{ $item->qty }}" required>

                  <label for="kondisi">Kondisi</label>
                  <select class="custom-select" name="kondisi" id="kondisi" value="{{ $item->kondisi }}">
                    <option value="layak_pakai">Layak Pakai</option>
                    <option value="rusak_ringan">Rusak Ringan</option>
                    <option value="rusak_baru">Rusak Baru</option>
                  </select>

                  <label for="tgl_pengadaan">Tgl Pengadaan</label>
                  <input type="date" class="form-control" id="tgl_pengadaan" name="tgl_pengadaan" value="{{ $item->tgl_pengadaan }}" required>
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

<div class="collapse show" id="formLaundry">
    <div class="card-body">
        {{-- data awal pelanggan --}}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="form-group row col-6">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal Transaksi</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" value="{{ date('Y-m-d') }}" name="tgl">
                        </div>
                    </div>
                    <div class="form-group row col-6">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Estimasi Selesai</label>
                        <div class="col-6 ml-auto">
                            <input type="date" class="form-control ml-auto" value="{{ date('Y-m-d', strtotime(date('Y-m-d'). '+3 day')) }}" name="batas_waktu">
                        </div>
                    </div>
                </div>
                <div class="row" class="col-12">
                    <div class="form-group row col-6">
                        <label for="" class="col-sm-4 col-form-label"><button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalMember"><i class="bi bi-plus-square"></i></button>Nama Pelanggan/JK</label>
                        <label class="col-sm-6 col-form-label" id="nama-pelanggan"> 
                            -
                        </label>
                    </div>
                    <div class="form-group row col-6">
                        <label for="" class="col-2 col-form-label">Biodata</label>
                        <label class="col-6 ml-auto col-form-label" id="biodata-pelanggan">
                            -
                        </label>
                    </div>
                </div>
            </div>
        </div>
        {{-- end of data awal pelanggan --}}

        {{-- data paket --}}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary btn-sm" id="tambahPaketBtn" data-bs-toggle="modal" data-bs-target="#modalPaket"><i class="bi bi-plus-square"></i> Tambah Cucian</button>
                    </div>
                </div>
                <div class="clearfix">&nbsp;</div>
                <div class="row">
                    <table id="tblTransaksi" class="table table-striped table-borderedbulk-action">
                        <thead>
                        <tr>
                            <th>Nama Paket</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th width="15%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5" style="text-align:center;font-style:italic">Belum ada data</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr valign="bottom">
                                <td width="" colspan="3" align="right">Jumlah Bayar</td>
                                <td><span id="subtotal">0</span></td>
                                <td rowspan="4">
                                    <label for="">Pembayaran</label>
                                    <input type="text" class="form-control" name="bayar" id="" style="width:170px" value="0">
                                    <div>
                                        <button class="btn btn-primary" style="margin-top:10px;width:170px" type="submit">Bayar</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" align="right">Diskon</td>
                                <td><input type="number" value="0" id="diskon" name="diskon" style="width:140px"></td>
                            </tr>
                            <tr>
                                <td colspan="3" align="right">Pajak <input type="number" value="0" min="0" class="qty" name="pajak" id="pajak-persen" size="2" style="width:40px"> </td>
                                <td><span id="pajak-harga">0</span></td>
                            </tr>
                            <tr>
                                <td colspan="3" align="right">Biaya Tambahan</td>
                                <td><input type="number" name="biaya_tambahan" style="width:140px" value="0"></td>
                            </tr>
                            <tr style="background:rgb(46, 45, 45);color:white;font-weight:bold;font-size:1em">
                                <td colspan="3" align="right">Total bayar akhir</td>
                                <td><span id="total">0</span></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        {{-- end of data paket --}}

        {{-- pembayaran --}}
        <div class="card">

        </div>
        {{-- end of pembayaran --}}
    </div>
</div>

{{-- modal member --}}
<div class="modal fade" id="modalMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Pelanggan</h5>
            </div>
            <div class="modal-body">
                <table id="tblMember" class="table table-stripped table-compact">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>JK</th>
                            <th>No. Hp</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($member as $b)
                            <tr>
                                <td>{{ $i = (!isset($i)?1:++$i) }}
                                    <input type="hidden" class="idMember" name="id_member" value="{{ $b->id }}"></td>
                                <td>{{ $b->nama }}</td>
                                <td>{{ $b->jenis_kelamin }}</td>
                                <td>{{ $b->tlp }}</td>
                                <td>{{ $b->alamat }}</td>
                                <td><button class="pilihMemberBtn" type="button">Pilih</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- end of modal member --}}

{{-- modal paket --}}
<div class="modal fade" id="modalPaket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pilih Paket</h5>
            </div>
            <div class="modal-body">
                <table id="tblPaket" class="table table-stripped table-compact">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Paket</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paket as $b)
                            <tr>
                                <td>{{ $j = (!isset($j)?1:++$j) }}
                                    <input type="hidden" class="idPaket" value="{{ $b->id }}"></td>
                                <td>{{ $b->nama_paket }}</td>
                                <td>{{ $b->harga }}</td>
                                <td><button class="pilihPaketBtn" type="button">Pilih</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- end of modal paket --}}
  
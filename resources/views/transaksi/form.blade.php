<div class="collapse" id="formLaundry">
    <div class="card-body">
        {{-- data awal pelanggan --}}
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div class="row" class="col-12">
                        <div class="form-group row-col-6">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Tanggal Transaksi</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="form-group row-col-6">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Estimasi Selesai</label>
                            <div class="col-6 ml-auto">
                                <input type="date" class="form-control ml-auto" value="{{ date('Y-m-d', strtotime(date('Y-m-d'). '+3 day')) }}">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- end of data awal pelanggan --}}

        {{-- data paket --}}
        <div class="card">

        </div>
        {{-- end of data paket --}}

        {{-- pembayaran --}}
        <div class="card">

        </div>
        {{-- end of pembayaran --}}
    </div>
</div>
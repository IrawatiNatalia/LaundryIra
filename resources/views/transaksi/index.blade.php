@extends('templates/header')
@section('content')
    {{-- Content Header (Page Header) --}}
    <section class="content-header">
        <div class="container-fluid"></div>
    {{-- Main Content --}}
        <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" id="nav-data" data-toggle="collapse" href="#dataLaundry" role="button" aria-expanded="false" aria-controls="collapseExample">Data Laundry</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="nav-form" data-toggle="collapse" href="#formLaundry" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-plus nav-icon"></i>&nbsp;&nbsp;&nbsp;Cucian Baru</a>
            </li>
        </ul>
            <div class="card" style="border-top:0px">
                <form action="post" action="transaksi">
                    @csrf
                    @include('transaksi.form')
                    @include('transaksi.data')
                    <input type="hidden" name="id_member" id="id_member">
                </form>
            </div>
            <div class="card" style="border-top:0px">
                @if ($errors->any())
                <div class="card-body">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span area-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif
            </div>
    {{-- /content --}}
    </section>


@endsection
@push('scripts')
<script>
    // script untuk #menu data dan form transaksi
    // $('#dataLaundry').collapse('show')

    $('#dataLaundry').on('show.bs.collapse', function(){
        $('#formLaundry').collapse('hide');
        $('#nav-form').removeClass('active');
        $('#nav-data').addClass('active');
    })

    $('#formLaundry').on('show.bs.collapse', function(){
        $('#dataLaundry').collapse('hide');
        $('#nav-data').removeClass('active');
        $('#nav-form').addClass('active');
    })
    //end #menu

    //initialize
    let subtotal = total = 0;
    $(function() {
        $('#tblMember').DataTable();
    })
    //end of initialize

    //pemilihan member
    $('#tblMember').on('click','.pilihMemberBtn', function(){
        pilihMember(this)
        $('#modalMember').modal('hide')
    })
    //end of pemilihan member

    //function pilih member
    function pilihMember(x){
        const tr = $(x).closest('tr')
        const namaJK = tr.find('td:eq(1)').text()+"/"+tr.find('td:eq(2)').text()
        const biodata = tr.find('td:eq(3)').text()+"/"+tr.find('td:eq(4)').text()
        const idMember = tr.find('.idMember').val()
        $('#nama-pelanggan').text(namaJK)
        $('#biodata-pelanggan').text(biodata)
        $('#id_member').val(idMember)
    }

    //action
    //pilih member
    $('#tblMember').on('click','pilihMemberBtn', function(){
        pilihMember(this)
        $('#modalMember').modal('hide')
    })

    //pilih paket
    $('#tblPaket').on('click','.pilihPaketBtn', function(){
        pilihPaket(this)
        $('#modalPaket').modal('hide')
    })
    //

    //function pilih paket
    function pilihPaket(x){
        const tr = $(x).closest('tr')
        const namaPaket = tr.find('td:eq(1)').text()
        const harga = tr.find('td:eq(2)').text()
        const idPaket = tr.find('.idPaket').val()

        let data = ''
        let tbody = $('#tblTransaksi tbody tr td').text()
        data += '<tr>'
        data += `<td> ${namaPaket} </td>`
        data += `<tr> ${harga} </td>`;
        data += `<input type="hidden" name="id_paket[]" value="${idPaket}">`
        data += `<td><input type="number" value="1" min="1" class="qty" name="qty[]" size="2" style="width:40px"></td>`;
        data += `<td><label name="sub_total[]" class="subTotal">${harga}</label></td>`;
        data += `<td><button type="button" class="btnRemovePaket"><span class="fas fa-times-circle"></span></button></td>`;
        data += '</tr>';

        if(tbody == 'Belum ada data') $('#tblTransaksi tbody tr').remove();

        $('#tblTransaksi tbody').append(data);

        subtotal += Number(harga)
        total = subtotal - Number($('#diskon').val()) + Number($('#pajak-harga').val())
        $('#subtotal').text(subtotal)
        $('#total').text(total)
    }
    //

    //function hitung total
    function hitungTotalAkhir(a){
        let qty = Number($(a).closest('tr').find('qty').val());
        let harga = Number($(a).closest('tr').find('td:eq(1)').text());
        let subTotalAwal = Number($(a).closest('tr').find('.subTotal').text());
        let count = qty * harga;
        subtotal = subtotal - subTotalAwal + count
        total = subtotal - Number($('#diskon').val()) + Number($('#pajak-harga').val())
        $(a).closest('tr').find('.subTotal').text(count)
        $('#subtotal').text(subtotal)
        $('#total').text(total)
    }
    //

    //onchange qty
    $('#tblTransaksi').on('change','.qty', function(){
        hitungTotalAkhir(this)
    })
    //

    //remove paket
    $('#tblTransaksi').on('click', '.btnRemovePaket', function(){
        let subTotalAwal = parseFloat($(this).closest('tr').find('.subTotal').text());
        subtotal -= subTotalAwal
        total -= subTotalAwal;

        $currentRow = $(this).closest('tr').remove();
        $('#subtotal').text(subtotal)
        $('#total').text(total)
    })
    //

</script>
@endpush
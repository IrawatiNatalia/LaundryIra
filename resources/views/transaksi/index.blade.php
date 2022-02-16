@extends('templates/header')

@section('content')
    {{-- Content Header (Page Header) --}}
    <section class="content-header">
        <div class="container-fluid"></div>
    </section>

    {{-- Main Content --}}
    <section class="content">
        <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" id="nav-data" data-toggle="collapse" href="#dataLaundry" role="button" aria-expanded="false" aria-controls="collapseExample">Data Laundry</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="nav-form" data-toggle="collapse" href="formLaundry" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-plus nav-icon"></i>$nbsp;Cucian Baru</a>
            </li>
          </ul>
          <div class="card" style="border-top:0px">
              @include('transaksi.form');
              @include('transaksi.data');
          </div>
    </section>
    {{-- /content --}}
@endsection

@push('scripts')
<script>
    // script untuk #menu data dan form transaksi
    $('dataLaundry').collapse('show')

    $('#dataLaundry').on('show.bs.collapse', function(){
        $('#formLaundry').collapse('hide');
        $('#nav-data').removeClass('active');
        $('#nav-form').addClass('active');
    })
    //end #menu
</script>
@endpush
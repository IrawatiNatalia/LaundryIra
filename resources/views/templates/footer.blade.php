
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
{{-- SweetAlert --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets') }}/dist/js/adminlte.js"></script>
{{-- data table --}}
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.js"></script>
<script>
  $(document).ready( function () {
    $('#tableOutlet').DataTable({
      "aLengthMenu": [[5,10,15,20], [5, 10, 15, 20]]
    }); 
    $('#tablePaket').DataTable({
      "aLengthMenu": [[5,10,15,20], [5, 10, 15, 20]]
    });
    $('#tableMember').DataTable({
      "aLengthMenu": [[5,10,15,20], [5, 10, 15, 20]]
    });
    $('#tableBarang').DataTable({
      "aLengthMenu": [[5,10,15,20], [5, 10, 15, 20]]
    });
} );
</script>
@stack('scripts')
</body>
</html>
<?php $this->load->ext_view('_partials/datatable_script'); ?>

<!-- Page specific script -->
<script>
  $(function() {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "processing": true,
      "serverSide": true,
      "order": [],
      "ajax": {
        "url": "<?php echo site_url('Student/data') ?>",
        "type": "POST"
      },
      "columnDefs": [{
        "targets": [0],
        "orderable": false,
      }, ],
    });
  });
</script>
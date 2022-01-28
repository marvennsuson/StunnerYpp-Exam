@extends('frontend._layouts.auth')


@section('content')
    <div class="col-lg-12">
        @include('system._components.notification')

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All List of Songs
                
                  </h4>
                <div class="">
                    <table class="table-hover table" id="songtable">
                        <thead>
                            <tr>
                                <th class=" font-weight-bold">Song Title</th>
                                <th class=" font-weight-bold">Song Category</th>
                                <th class=" font-weight-bold">Song Artist</th>
                                <th class=" font-weight-bold">Date Created</th>
                                <th class=" font-weight-bold">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                     
                        </tbody>
                    </table>
                </div>
                <div>
        
                </div>

        </div>
    </div>
    </div>

    @include('system._components.delete-confirmation-modal')
@endsection
@section('page-styles')
    <style>
        .img-container{
            height: 100px;
            width: 100px;
        }
    </style>
     {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
      <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endsection
@section('page-scripts')


<script>
        

            		// $("#songtable").dataTable();
                    $(document).ready(function () {
      $.ajaxSetup({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
  });
      $("#songtable").dataTable({
        "columnDefs": [{
          "orderable": false,
          "targets": 0
              }],
              "autoWidth": false,
              ajax: "{{ route('frontend.home.getdata') }}",
              lengthMenu: [10, 25, 50, 100],
              columns: [
                          { data: 0 },
                          { data: 1 },
                          { data: 2 },
                          { data: 3 },
                          { data: 4 },
                      ],
                  orderable: true,
                  searchable: true,
                  deferRender: true,
                  info: true,
                  stateSave: true,
                  clear:true,
                  destroy: true,
                  responsive: true,
      });
      });
             
</script>
<script>
    $("#delete-confirmation-modal").on('show.bs.modal',function(event){
        const content = $(event.relatedTarget);
        const action = content.data('action');
        const modal = $(this);
        modal.find("#delete-modal-form").attr('action',action);
    });

    $( function() {
        $("#datefrom").datepicker({
            dateFormat: 'yy/mm/dd',
            changeYear: true,
            changeMonth: true,
        });
        $("#dateend").datepicker({
            dateFormat: 'yy/mm/dd',
            changeYear: true,
            changeMonth: true,
        });
} );
</script>
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
@endsection
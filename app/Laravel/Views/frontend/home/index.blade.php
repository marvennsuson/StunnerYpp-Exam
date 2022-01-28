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
                                <th class=" font-weight-bold">Song Artist</th>
                                <th class=" font-weight-bold">Song Category</th>
                                <th class=" font-weight-bold">Date Created</th>
                                <th class=" font-weight-bold">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($record as $songs)
                            <tr>
                                <td class="align-middle">{{ $songs->title ? $songs->title : '' }}</td>
                                <td class="align-middle">{{ $songs->artist ? $songs->artist : '' }}</td>
                                <td class="align-middle">{{ $songs->categ->title ? $songs->categ->title : '' }}</td>
                                <td class="align-middle"> {{$songs->created_at ? $songs->created_at->format("F d Y") : '---'}}</td>
                                <td class="align-middle">
                                    <div class="dropdown">
                                        <button class="btn btn-rounded btn-white btn-icon" data-toggle="dropdown">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="{{route('frontend.home.show',['id' => $songs->id ? $songs->id : ''])}}" class="dropdown-item">show</a>
                                       
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">No Records Found.</td>
                            </tr>
                            @endforelse
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
         $(document).ready(function () {

            		$("#songtable").dataTable();
                })
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
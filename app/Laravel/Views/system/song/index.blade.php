@extends('system._layouts.main')
@section('breadcrumb')
    <li class="breadcrumb-item active">Song List</li> 
    <li class="breadcrumb-item"> <a href="{{ route('system.song.create') }} " class="text-decoration-non text-info" >Create New Song</a></li> 
@endsection

@section('content')
    <div class="col-lg-12">
        @include('system._components.notification')
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Advance Filters</h4>
                <form class="form-inline">
                  <label class="sr-only" for="input_keyword">Keywords</label>
                  <input type="text" name="keyword" class="form-control mb-2 mr-sm-2" id="input_keyword" placeholder="Keyword"  value="{{$keyword}}">
                  
                  {{--  <label class="sr-only" for="input_status">Status</label>
                  {!!Form::select("status", $statuses, $selected_status, ['id' => "input_status", 'class' => "form-control mb-2 mr-sm-2"])!!} --}}
        
                  <label class="sr-only" for="input_date_range">Date Range</label>
                  <div class="input-group input-daterange d-flex align-items-center">
                    <input type="text" id="datefrom" name="start_date" class="form-control mb-2 mr-sm-2 input_date_range" value="{{$start_date}}" >
                    <div class="input-group-addon mx-2">to</div>
                    <input type="text" id="dateend" name="end_date" class="form-control mb-2 mr-sm-2 input_date_range" value="{{$end_date}}" >
                  </div>
        
                  <button type="submit" class="btn btn-sm btn-primary mb-2 mr-3">Apply Filter</button>
                
                </form>
              </div>
            </div>
          </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Record Data
                
                  </h4>
                <div class="table-responsive">
                    <table class="table-hover table">
                        <thead>
                            <tr>
                                <th class=" font-weight-bold">Song title</th>
                                <th class=" font-weight-bold">Artist</th>
                                <th class=" font-weight-bold">Status</th>
                                <th class=" font-weight-bold">Date Created</th>
                                <th class=" font-weight-bold">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($record as $songs)
                            <tr>
                                <td class="align-middle">{{ $songs->title ? Str::title($songs->title) : '' }}</td>
                                <td class="align-middle">{{ $songs->artist ? $songs->artist : '' }}</td>
                                @if ($songs->status == 1)
                                <td class="align-middle"><span class="badge badge-success">Enabled</span></td>
                                @else
                                <td class="align-middle"><span class="badge badge-warning">Disabled</span></td>       
                                @endif
                             
                                <td class="align-middle"> {{$songs->created_at ? $songs->created_at->format("F d Y") : '---'}}</td>
                                <td class="align-middle">
                                    <div class="dropdown">
                                        <button class="btn btn-rounded btn-white btn-icon" data-toggle="dropdown">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a href="{{route('system.song.edit',['id' => $songs->id ? $songs->id : ''])}}" class="dropdown-item">Edit</a>
                                            <button class="dropdown-item" data-toggle="modal" data-target="#delete-confirmation-modal"
                                            data-action="{{ route('system.song.delete',['id' => $songs->id ?  $songs->id : '']) }}">
                                            Delete
                                        </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">No Records Found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div>
        
                </div>
            @if($record->count() > 0)
                <div class="d-flex justify-content-between">
                    <div>
                        <span>Showing <strong>{{$record->firstItem()}}</strong> - <strong>{{$record->lastItem()}}</strong> of <strong>{{$record->total()}}</strong> item</span>
                    </div>
                    <div>
                        {{ $record->links() }}
                    </div>
                </div>
            @endif
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
@endsection
@section('page-scripts')
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

@endsection
@extends('system._layouts.main')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('system.category.index') }}">Category List</a></li>
    <li class="breadcrumb-item active">Edit Category</li>
@endsection
@section('content')
    <div class="col-lg-8">
        <form action="{{ route('system.category.update',['id' => $record->id ? $record->id : '']) }}" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Category</h3>
                </div>
                <div class="card-body">
                    @csrf
                    @method("PATCH")
                    @include('system._components.notification')
    
                    <div class="form-group">
                        <label for="title">Full Name</label>
                        <input type="text" class="form-control {{ $errors->has('title') ? "is-invalid" : ""}}" name="title" id="title" placeholder="Category Title" value="{{ old('title',$record->title ? $record->title : '') }}" />
                        @error('title')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
          
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control {{ $errors->has('status') ? "is-invalid" : ""}}" id="status"  name="status">
                            <option value="1" {{ ($record->status == '1') ? 'selected' : false }}> Enabled </option>
                            <option value="0" {{ ($record->status == '0') ? 'selected' : false }}> Disabled </option>
                        </select>
                        @error('status')<small class="text-danger">{{ $message }}</small>@enderror
                      </div> 
                </div>
                <div class="modal-footer d-flex justify-content-end">
                    <button class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('page-scripts')
@endsection
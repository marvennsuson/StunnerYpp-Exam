@extends('system._layouts.main')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('system.category.index') }}">Category List</a></li>
    <li class="breadcrumb-item active"> Create Category</li>
@endsection
@section('content')
    <div class="col-lg-8">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Category</h3>
                </div>
                <div class="card-body">
                    @include('system._components.notification')
                    @csrf

       
                    <div class="form-group">
                        <label for="">Category Title<span class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('title') ? "is-invalid" : ""}}" name="title" id="title" placeholder="Category Title" value="{{ old('title') }}" />
                        @error('title')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
         
          
                <div class="modal-footer d-flex justify-content-end">
                    <button class="btn btn-success">Create</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('page-scripts')
@endsection
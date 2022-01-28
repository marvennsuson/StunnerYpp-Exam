@extends('system._layouts.main')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('system.profile.index') }}">My Profile</a></li>
    <li class="breadcrumb-item actie">Update Profile</li>
@endsection
@section('content')
    <div class="col-lg-8">
        <form action="{{ route('system.profile.update',['id' => $data->id]) }}" method="post" >
            @csrf
            @method('PUT')
          
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Profile</h3>
                </div>
                <div class="card-body">
                    @include('system._components.notification')

                    <div class="form-group">
                        <label for="">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('name') ? "is-invalid" : ""}}"  id="name" placeholder="name" value="{{ $data->name ?? ''}}"  readonly disabled/>
                        @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('username') ? "is-invalid" : ""}}" name="username" id="username" placeholder="username" value="{{ old('username',$data->username ?? '') }}" />
                        @error('username')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control {{ $errors->has('email') ? "is-invalid" : ""}}" name="email" id="email" placeholder="email" value="{{ old('email',$data->email ?? '') }}" />
                        @error('email')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password <span class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('password') ? "is-invalid" : ""}}" name="password" id="password" placeholder="password" value="{{ old('password') }}" />
                        @error('password')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
          
                <div class="modal-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('page-scripts')
@endsection
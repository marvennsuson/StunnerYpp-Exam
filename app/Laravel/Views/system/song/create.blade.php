@extends('system._layouts.main')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('system.song.index') }}">Song List</a></li>
    <li class="breadcrumb-item actie">Create Songs</li>
@endsection
@section('content')
    <div class="col-lg-8">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Songs</h3>
                </div>
                <div class="card-body">
                    @include('system._components.notification')
                    @csrf
                    <div class="form-group">
                        <label for="categ_id">Song Category</label>
                        <select class="form-control {{ $errors->has('categ_id') ? "is-invalid" : ""}}" id="categ_id"  name="categ_id">
                            @forelse ($categories as $categ)
                            <option value="{{ $categ->id }}">{{ $categ->title }}</option>
                            @empty
                            <option selected disabled>No Data</option> 
                            @endforelse
                        </select>
                        @error('categ_id')<small class="text-danger">{{ $message }}</small>@enderror
                      </div> 

                    <div class="form-group">
                        <label for="">Song Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('title') ? "is-invalid" : ""}}" name="title" id="title" placeholder="Song Title" value="{{ old('title') }}" />
                        @error('title')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Song Artist <span class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('artist') ? "is-invalid" : ""}}" name="artist" id="artist" placeholder="Song Artist" value="{{ old('artist') }}" />
                        @error('artist')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Song Lyrics <span class="text-danger">*</span></label>
                        <textarea  class="form-control "  name="lyrics" id="lyrics" placeholder="Song Lyrics" cols="30" rows="10">
                            {{ old('lyrics') }}
                        </textarea>
                        @error('lyrics')<small class="text-danger">{{ $message }}</small>@enderror
                       
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
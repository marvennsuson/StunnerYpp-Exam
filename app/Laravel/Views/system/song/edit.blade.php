@extends('system._layouts.main')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('system.song.index') }}">Song List</a></li>
    <li class="breadcrumb-item actie">Edit Song</li>
@endsection
@section('content')
    <div class="col-lg-8">
        <form action="{{ route('system.song.update',['id' => $record->id ? $record->id : '']) }}" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Song</h3>
                </div>
                <div class="card-body">
                    @csrf
                    @method("PATCH")
                    @include('system._components.notification')
     
                    <div class="form-group">
                        <label for="categ_id">Song Category</label>
                        <select class="form-control {{ $errors->has('categ_id') ? "is-invalid" : ""}}" id="categ_id"  name="categ_id">
                            @forelse ($categories as $categ)
                            <option value="{{ $categ->id }}" {{ ($record->categ_id == $categ->id) ? 'selected' : false }}>{{ $categ->title }}</option>
                            @empty
                            <option selected disabled>No Data</option> 
                            @endforelse
                        </select>
                        @error('categ_id')<small class="text-danger">{{ $message }}</small>@enderror
                      </div> 

                    <div class="form-group">
                        <label for="">Song Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('title') ? "is-invalid" : ""}}" name="title" id="title" placeholder="Song Title" value="{{ old('title',$record->title) }}" />
                        @error('title')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Song Artist <span class="text-danger">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('artist') ? "is-invalid" : ""}}" name="artist" id="artist" placeholder="Song Artist" value="{{ old('artist',$record->artist) }}" />
                        @error('artist')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="form-group">
                        <label for="">Song Lyrics <span class="text-danger">*</span></label>
                        <textarea  class="form-control"  name="lyrics" id="lyrics" placeholder="Song Lyrics" cols="30" rows="10">
                            {{ old('lyrics',$record->lyrics) }}
                        </textarea>
                        @error('lyrics')<small class="text-danger">{{ $message }}</small>@enderror
                       
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
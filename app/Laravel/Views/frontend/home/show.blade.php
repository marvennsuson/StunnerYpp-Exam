
@extends('frontend._layouts.auth')

@section('content')
    <div class="col-lg-12">
        @include('frontend._components.notification')

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Show Record
                
                  </h4>
    
                  <div class="form-group">
                    <label for="categ_id">Song Category</label>
                    <select readonly class="form-control {{ $errors->has('categ_id') ? "is-invalid" : ""}}" id="categ_id"  name="categ_id">
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
                    <input readonly type="text" class="form-control {{ $errors->has('title') ? "is-invalid" : ""}}" name="title" id="title" placeholder="Song Title" value="{{ old('title',$record->title) }}" />
                    @error('title')<small class="text-danger">{{ $message }}</small>@enderror
                </div>
                <div class="form-group">
                    <label for="">Song Artist <span class="text-danger">*</span></label>
                    <input readonly type="text" class="form-control {{ $errors->has('artist') ? "is-invalid" : ""}}" name="artist" id="artist" placeholder="Song Artist" value="{{ old('artist',$record->artist) }}" />
                    @error('artist')<small class="text-danger">{{ $message }}</small>@enderror
                </div>
                <div class="form-group">
                    <label for="">Song Lyrics <span class="text-danger">*</span></label>
                    <textarea  readonly class="form-control"  name="lyrics" id="lyrics" placeholder="Song Lyrics" cols="30" rows="10">
                        {{ old('lyrics',$record->lyrics) }}
                    </textarea>
                    @error('lyrics')<small class="text-danger">{{ $message }}</small>@enderror
                   
                </div>
                <div class="form-group">
                <label for="status">Status</label>
                <select readonly class="form-control {{ $errors->has('status') ? "is-invalid" : ""}}" id="status"  name="status">
                    <option value="1" {{ ($record->status == '1') ? 'selected' : false }}> Enabled </option>
                    <option value="0" {{ ($record->status == '0') ? 'selected' : false }}> Disabled </option>
                </select>
                @error('status')<small class="text-danger">{{ $message }}</small>@enderror
                </div> 
                
                
                <div class="modal-footer d-flex justify-content-end">
                    <a class="btn btn-info" href="{{ route('frontend.home.index') }}">Go back</a>
                </div>
        </div>
    </div>
    </div>

    @include('system._components.delete-confirmation-modal')
@endsection
@section('page-styles')

@endsection
@section('page-scripts')


@endsection
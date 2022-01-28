@extends('system._layouts.main')
@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</i></li>
@endsection
@section('content')
    @include('system._components.notification')
    <div class="container-fluid">
        <div class="card-group row-1 ">
            <div class="card ">
                <div class="card-body ">
                    <div class="row d-flex align-items-center">
                        <div class="col-6 text-right">
                            <h3>
                                {{ $record->count() }}      </h3>
                        </div>
                        <div class="col-6 text-left ">
                            <p class="text-wrap ">Total No. of Songs</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body ">
                    <div class="row d-flex align-items-center">
                        <div class="col-6 text-right">
                            <h3>
                              {{ $categories }}
                            </h3>
                        </div>
                        <div class="col-6 text-left ">
                            <p class="text-wrap ">Total No. of Category</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body ">
                    <div class="row d-flex align-items-center">
                        <div class="col-6 text-right">
                            <h3>
                             0
                            </h3>
                        </div>
                        <div class="col-6 text-left ">
                            <p class="text-wrap ">Total No. of Artist</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body ">
                    <div class="row d-flex align-items-center">
                        <div class="col-6 text-right">
                            <h3>
                             {{ $users }}
                            </h3>
                        </div>
                        <div class="col-6 text-left ">
                            <p class="text-wrap ">Total No. of Users</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="card-group row-2 mt-5">

            @forelse ($record as $row)
            <div class="card ">
                <div class="card-body text-center">
                    <div class="row d-flex justify-content-center row-2-card-top">
                        <h6>{{ $row->categ->title }}</h6>
                    </div>
                    <hr>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12">
                            <h6>{{ $row->categ->music->count() }}</h6>
                            <p>Songs</p>
                        </div>
            
                    </div>
                </div>
            </div>
            @empty
                <p><h3>No data Found</h3></p>
            @endforelse

        </div>
    </div>
@endsection

@section('page-styles')
    <style>
        .row-1 p {
            font-size: 14px;
        }

        .row-1 p,
        .row-1 h1 {
            margin-bottom: 0;
        }

        .row-1 {
            margin-bottom: 2em;
        }

        .row-2 hr {
            margin-bottom: 2em;
        }

        .row-2>.card {
            max-width: 400px;
        }

        .container-fluid>.card-group>.card {
            min-width: 200px;
        }

        .card {
            background-color: #21D4FD;
            background-image: linear-gradient(19deg, #21D4FD 0%, #B721FF 100%);
            color: #fff;
            border: 5px solid #fff !important;
        }

    </style>
@endsection

@section('page-scripts')

@endsection

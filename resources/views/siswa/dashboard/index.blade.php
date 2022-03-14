@extends('layouts.app', ['title' => 'Dashboard'])


@section('css')

@endsection


@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Kelas</h4>
                    </div>
                    <div class="card-body">
                        {{ $kelasCount }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
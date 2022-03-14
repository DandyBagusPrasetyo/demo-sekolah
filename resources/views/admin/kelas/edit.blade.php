@extends('layouts.app', ['title' => 'Edit Project'])


@section('css')
@endsection


@section('content')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Form Input</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.kelas.update', $kelas->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Kelas Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $kelas->name) }}"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection

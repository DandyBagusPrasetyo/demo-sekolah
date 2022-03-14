@extends('layouts.app', ['title' => 'List Slider'])


@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="image">Tambah Slider</label>
                        <div class="custom-file">
                            <input type="file" id="image" name="image"
                                class=" @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" id="link" name="link" value="{{ old('link') }}"
                            class="form-control @error('link') is-invalid @enderror">
                        @error('link')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-kelas">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Slider</th>
                                    <th>Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $key => $slider)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img alt="image" src="{{ $slider->image }}" class="rounded-circle" width="200"
                                                data-toggle="tooltip">
                                        </td>
                                        <td>{{ $slider->link }}</td>
                                        <td>
                                            <button onClick="destroy(this.id)" id="{{ $slider->id }}"
                                                class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
    

    <script>
        $(document).ready(function() {
            $('#table-kelas').dataTable( {
                
            } );
        } );
    </script>

    <script>
        //ajax delete
        function destroy(id) {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");

            Swal.fire({
                title: 'APAKAH KAMU YAKIN ?',
                text: "INGIN MENGHAPUS DATA INI!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'BATAL',
                confirmButtonText: 'YA, HAPUS!',
            }).then((result) => {
                if (result.isConfirmed) {
                    //ajax delete
                    jQuery.ajax({
                        url: `/admin/slider/delete/${id}`,
                        data: {
                            "id": id,
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function(response) {
                            if (response.status == "success") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'BERHASIL!',
                                    text: 'DATA BERHASIL DIHAPUS!',
                                    showConfirmButton: false,
                                    timer: 3000
                                }).then(function() {
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'GAGAL!',
                                    text: 'DATA GAGAL DIHAPUS!',
                                    showConfirmButton: false,
                                    timer: 3000
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        }
                    });
                }
            })
        }
    </script>
@endsection

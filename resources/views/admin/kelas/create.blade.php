@extends('layouts.app', ['title' => 'Add Document Project'])


@section('css')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.css">
@endsection


@section('content')
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Create Kelas</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.kelas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input_fields_wrap">
                            <div class="form-group">
                                <label for="name">Nama Kelas</label>
                                <input type="text" id="name" name="name[]"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <a href="#" id="" class="add_field_button btn btn-success" style="float: right;">Add Field</a><br>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
    $(document).ready(function() {
	var max_fields      = 10;
	var wrapper   		= $(".input_fields_wrap");
	var add_button      = $(".add_field_button");
	
	var x = 1; 
	$(add_button).click(function(e){ 
		e.preventDefault();
		if(x < max_fields){ 
			x++; 
			$(wrapper).append('<div><div class="form-group"><label for="name">Nama Kelas</label><input type="text" id="name" name="name[]"class="form-control @error('name') is-invalid @enderror">@error('name')<div class="invalid-feedback"><strong>{{ $message }}</strong></div>@enderror</div><div class="form-group"><a href="#" id="" class="remove_field btn btn-danger" style="float: right;">Remove Field</a><br></div></div>');
		}
	});
	
	$(wrapper).on("click",".remove_field", function(e){
		e.preventDefault(); $(this).parent().parent().remove(); x--;
	})
});
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js"></script>
@endsection

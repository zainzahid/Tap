{{-- \resources\views\users\create.blade.php --}}
@extends('layouts.app')

@section('title', '| Add Group')

@section('content')

<div class='container col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> Add Group</h1>
    <hr>

    <form action="{{ route('groups.create') }}" method='post' enctype="multipart/form-data">
        @csrf
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        @if( session( 'success' ) )
            <div class="alert alert-primary" role="alert">
                {{ session( 'success' ) }}
            </div>
        @endif

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Group Name</label>
            <div class="col-md-6">
                <input class="form-control" name='group_name'/>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Excel File</label>
            <div class="custom-file col-md-6">
                <input type="file" class="custom-file-input"  name="select_file" id="inputFile">
                <label class="custom-file-label" for="inputGroupFile01" id="inputFileLabel">
                    Choose file
                </label>
              </div>
        </div>  

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button class="btn btn-primary" type='submit'>Add!</button>
            </div>
        </div>

    </form>

</div>

@endsection

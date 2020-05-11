@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <br />
                <h1>New category</h1>
                <br />
                <form method="post" action="{{ route('categories.store') }}">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label for="first_name">Name:</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" />
                        @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
                <br />
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
@endsection
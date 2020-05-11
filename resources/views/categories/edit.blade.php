@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>{{ $category->name }} Edit</h1>
                <br />
                <form method="post" action="{{ route('categories.update', $category->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="first_name">Name:</label>
                        <input type="text" class="form-control" name="name" value={{ $category->name }} />
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                <br />
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
@endsection
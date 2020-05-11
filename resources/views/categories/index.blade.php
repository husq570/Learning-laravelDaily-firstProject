@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Categories</h1>

                <a href="{{ route('categories.create')}}" class="btn btn-primary">Create new category</a>
                <br /><br />

                <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a class="btn btn-secondary" href="{{ route('categories.edit', $category->id) }}">Edit</a>
                            <form method="post" action="{{ route('categories.destroy', $category->id) }}" style="display:inline;">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure');">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
@endsection
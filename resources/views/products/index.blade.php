@extends('app')

@section('content')

    <div class="col-lg-12">
        <h1>Products</h1>

        <a href="{{ route('products.create')}}" class="btn btn-primary">Create new product</a>
        <br /><br />

        <table class="table table-stripped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a class="btn btn-secondary" href="{{ route('products.edit', $product->id) }}">Edit</a>
                    <form method="post" action="{{ route('products.destroy', $product->id) }}" style="display:inline;">
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

@endsection
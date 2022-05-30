@extends('dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Suwret ham contetn jazsa boladi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('brand.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($brands as $brand)
            <tr>
                <td>{{ ++$i }}</td>
                <td><img src="/image/{{ $brand->image }}" width="100px"></td>
                <td>{{ $brand->name }}</td>
                <td>{{ $brand->detail }}</td>
                <td>
                    <form action="{{ route('brand.destroy',$brand->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('brand.show',$brand->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('brand.edit',$brand->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $brands->links() !!}

@endsection
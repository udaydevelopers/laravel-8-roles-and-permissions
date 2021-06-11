@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right" style="float: right; padding: 5px;">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('admin.products.create') }}"> Create New Product</a>
                @endcan
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Products</h6>
</div>
<div class="card-body">
<div class="table-responsive">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($products as $product)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $product->name }}</td>
	        <td>{{ $product->detail }}</td>
            <td>{{ $product->category_id }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->count }}</td>
	        <td>
                <form action="{{ route('admin.products.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('admin.products.show',$product->id) }}">Show</a>
                    @can('product-edit')
                    <a class="btn btn-primary" href="{{ route('admin.products.edit',$product->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('product-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
    </div>
    </div>
    </div>

    {!! $products->links() !!}

@endsection
@extends('layouts.admin')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right" style="float: right; padding: 5px;">
        @can('category-create')
            <a class="btn btn-success" href="{{ route('admin.categories.create') }}"> Create New Category</a>
        @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Name</th>
     <th>Parent Category</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($categories as $key => $category)
    <tr>
        <td> {{ ++$i }}</td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->getParentsNames() }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('admin.categories.show',$category->id) }}">Show</a>
            @can('category-edit')
                <a class="btn btn-primary" href="{{ route('admin.categories.edit',$category->id) }}">Edit</a>
            @endcan
            @can('category-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['admin.categories.destroy', $category->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table>
</div>
</div>
</div>
<nav aria-label="Page navigation example">
  <ul class="pagination pg-blue justify-content-center">
    <li>{!! $categories->render()!!}</li>
  </ul>
</nav>

<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
@endsection
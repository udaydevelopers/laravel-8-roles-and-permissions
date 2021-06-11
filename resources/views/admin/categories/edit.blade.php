@extends('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right" style="float: right; padding: 5px;">
                <a class="btn btn-primary" href="{{ route('admin.categories.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Category</h6>
            </div>
    <div class="card-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('admin.categories.update',$category->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="Name">
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Parent:</strong>
		            <select name="parent_id" class="form-select form-control" aria-label="Default select example">
                        <option value="">Select</option>
                        @foreach($parentCategories as $parentCatgory)
                        <option value="{{$parentCatgory->id}}" @if($parentCatgory->id == $category->parent_id) selected @endif>{{$parentCatgory->name}} </option>
                            @if(count($parentCatgory->subcategory))
                                    @include('admin.categories.subCategoryView',['subcategories' => $parentCatgory->subcategory, 'dataParent' => $parentCatgory->id , 'dataLevel' => 1])
                            @endif
                        @endforeach
                    </select>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>
    </div>
    </div>


@endsection
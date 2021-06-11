@foreach($subcategories as $subcategory)
        <option value="{{$subcategory->id}}"  @if($subcategory->id == $category->parent_id) selected @endif>
       {{$subcategory->name}} 
        </option>
	    @if(count($subcategory->subcategory))
            @include('admin.categories.subCategoryView',['subcategories' => $subcategory->subcategory, 'dataParent' => $subcategory->id, 'dataLevel' => $dataLevel ])
        @endif
@endforeach

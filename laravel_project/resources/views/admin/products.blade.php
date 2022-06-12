@extends('admin.master')
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Products</h4>
          <div class="pull-left">
            <a class="btn btn-success" href="{{ route('product.create') }}"> Add New Product</a>
        </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
            <table class="table">
              <thead class=" text-primary">
                <th>
                  ID
                </th>
                <th>
                  Image
                </th>
                <th>
                  Name
                </th>
                <th >
                  Description
                </th>
                <th >
                    Category
                  </th>
                <th >
                  Action
                </th>
              </thead>
              <tbody>
               @foreach ($products as $product)
                  
                
                <tr>
                  <td>
                    {{$product->id;}}
                  </td>
                  <td >
                    <img src="  {{asset('public/adminImage/'.$product->item_image);}}" width="70px" height="70px" alt="Image">
                   
                  </td>
                  <td>
                    {{$product->item_name;}}
                  </td>
                  <td >
                    {{$product->item_description;}}
                  </td>
                 <td>
                  {{$product->category_name ;}}
                 </td>
                  <td>
                    <form action=" {{ route('product.destroy',$product->id) }}" method="POST"> 
                      <a class="btn btn-info" href="{{ route('product.edit',$product->id) }}">Edit</a>
                      @csrf
                      @method('DELETE')
                      
                      <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                  </td>
                </tr>
                @endforeach
                
              </tbody>

            </table>
           
          </div>
        </div>
      </div>
    </div>
   
  </div>
</div>


      @endsection
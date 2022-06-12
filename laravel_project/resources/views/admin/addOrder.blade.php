@extends('admin.master')
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content" style="padding-left: 90px; width: 1500px">
  <div class="row">
    <div class="col-md-8" >
      <div class="card">
        <div class="card-header">
          <h5 class="title">Add Order</h5>
        </div>
        
        <div class="card-body" >
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

          <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
           
            <div class="row">
              <div class="col-md-6 pr-1">
                <div class="form-group">
                  <label>User Name</label>
                  <select class="form-select" aria-label="Default select example" name="userName">
                      <option selected>Choose User Name..</option>
                      @foreach ($users as $user)
                      <option value="{{$user->id}}">{{$user->name}}</option>
                     @endforeach
                    </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 pr-1">
                <div class="form-group">
                  <label>Product</label>
                  <select class="form-select" aria-label="Default select example" name="product">
                      <option selected>Choose Product..</option>
                      @foreach ($products as $product)
                      <option value="{{$product->id}}">{{$product->item_name}}</option>
                     @endforeach
                    </select>
                </div>
              </div>
            </div>
             
         
        <div class="row">
            
        <div class="col-xs-12 col-sm-12 col-md-12 text-left" style="padding-left: 40px">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
       
      </div>
    </div>
  </div>
</div>

@endsection
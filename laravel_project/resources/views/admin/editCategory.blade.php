@extends('admin.master')

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content" style="padding-left: 90px; width: 1500px">
  <div class="row">
    <div class="col-md-8" >
      <div class="card">
        <div class="card-header">
          <h5 class="title">Edit Category</h5>
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

    <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Category Name</label>
                <input type="text" class="form-control" value="{{$category->category_name}}" name='cname'>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Category Description</label>
                <textarea class="form-control" style="height:100px" name="cdescription" >{{$category->category_description}} </textarea>
              </div>
            </div>
          </div>
     
    <div class="row">
        <div class="col-md-6 pr-1">
          <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control" value="{{$category->category_image}}"  name='image'>
          </div>
        </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-left" style="padding-left: 40px">
        <button type="submit" class="btn btn-primary">Submit</button>
</div>
   
  </div>

    </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
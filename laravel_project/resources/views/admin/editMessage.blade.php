@extends('admin.master')
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content" style="padding-left: 90px; width: 1500px">
  <div class="row">
    <div class="col-md-8" >
      <div class="card">
        <div class="card-header">
          <h5 class="title">Edit Message</h5>
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

          <form action="{{ route('message.update',$message->id) }}" method="POST" >
            @csrf
            @method('PUT')

              <div class="row">
                <div class="col-md-6 pr-1">
                  <div class="form-group">
                    <label> Name</label>
                    <input type="text" class="form-control" placeholder=" name" name='name' value="{{$message->message_name}}">
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6 pr-1">
                  <div class="form-group">
                    <label> Email</label>
                    <input type="email" class="form-control" placeholder=" example@mail.com" name='email' value="{{$message->message_email}}"">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 pr-1">
                  <div class="form-group">
                    <label>Message</label>
                    <textarea class="form-control" style="height:100px" name="message" placeholder=".....">{{$message->message}}</textarea>
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
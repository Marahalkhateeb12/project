@extends('admin.master')
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Orders</h4>
          <div class="pull-left">
            <a class="btn btn-success" href="{{ route('order.create') }}"> Add New Order</a>
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
                   User Name
                </th>
                <th>
                  Product Name
                </th>
                <th>
                    Date
                </th>
                <th >
                  Action
                </th>
              </thead>
              <tbody>
               @foreach ($orders as $order)
                  
                
                <tr>
                  <td>
                    {{$order->id;}}
                  </td>  
                  <td>
                    {{$order->user_name;}}
                  </td>
                  <td >
                    {{$order->item_name;}}
                  </td>
                 <td>
                  {{$order->created_at ;}}
                 </td>
                  <td>
                    <form action=" {{ route('order.destroy',$order->id) }}" method="POST"> 
                      <a class="btn btn-info" href="{{ route('order.edit',$order) }}">Edit</a>
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
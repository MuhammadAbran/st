@extends('layouts.custom')
@section('title', 'Customer')
@section('content')
@if ($message = Session::get('success'))
	  <div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">×</button>
		  <strong>{{ $message }}</strong>
	  </div>
	@endif

	@if ($message = Session::get('error'))
	  <div class="alert alert-danger alert-block">
	    <button type="button" class="close" data-dismiss="alert">×</button>
		<strong>{{ $message }}</strong>
	  </div>
	@endif

	@if ($message = Session::get('warning'))
	  <div class="alert alert-warning alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>{{ $message }}</strong>
	</div>
	@endif

	@if ($message = Session::get('info'))
	  <div class="alert alert-info alert-block">
	    <button type="button" class="close" data-dismiss="alert">×</button>
		<strong>{{ $message }}</strong>
	  </div>
	@endif

	@if ($errors->any())
	  <div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert">×</button>
		Please check the form below for errors
	</div>
	@endif
<div class="box">
    <div class="box-header with-border">
        <div class="box-title">
            <h3>Tabel Customer</h3>
        </div>
             <div class="box-tools pull-right">
                 <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                 <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
             </div>
    </div>
    <div class="box-body">
        <table class="table">
            <thead>
                <th>Nama</th>
                <th>Address</th>
                <th>District</th>
                <th>E-mail</th>
                <th>Action</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($customers as $data)
                    <tr>
                        <td>{{$data->first_name . " " . $data->last_name}}</td>
                        <td>{{$data->address}}</td>
                        <td>{{$data->district}}</td>
                        <td>{{$data->email}}</td>
                        <td>
                          <a href="{{ route('customers.edit', $data->customer_id) }}" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span>&nbsp; Edit</a>

                        </td>
                        <td>
                          <form class="delete" action="{{ route('customers.destroy', $data->customer_id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" name="button" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span>&nbsp; Delete</button>
                          </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
				<div class="col-md-10">
					{{ $customers->links() }}
				</div>
    </div>
</div>
@endsection

@section('tambah')
<div class="box-body">
  <form action="{{ route('customers.store') }}" method="post">
    {{ csrf_field() }}
    <div class="col-xs-6">
      <label for="exampleInputEmail1">First Name</label>
      <input type="text" class="form-control" placeholder="Enter First Name" name="depan">
    </div>
    <div class="col-xs-6">
      <label for="exampleInputEmail1">Last Name</label>
      <input type="text" class="form-control" placeholder="Enter Last Name" name="belakang">
    </div>

    <div class="col-xs-6">
      <br>
      <label for="exampleInputEmail1">Adress ID</label>
      <select class="form-control" id="sel1" name="address">
        <option>1</option>
        <option>2</option>
      </select>
      <br>
    </div>
    <div class="col-xs-6">
      <br>
      <label for="exampleInputPassword1">E-Mail</label>
      <input type="email" class="form-control" placeholder="Enter E-Mail"  name="email">
    </div>
  <!-- /.box-body -->

  <div class="col-xs-12">
    <button type="submit" class="btn btn-primary">Save</button>
    <br>
  </div>
  </form>
</div>
@endsection

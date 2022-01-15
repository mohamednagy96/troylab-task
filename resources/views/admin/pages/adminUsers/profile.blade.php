@extends('admin.layouts.master')
@section('content')

<x-card title="Admin Profile">


<form action="{{ route('admin.profile.update') }}" method="Post">
    @csrf
  <div class="form-row">
      <label for="validationServer01">Name</label>
  <input type="text" name="name" class="form-control" value="{{$user->name}}" id="exampleFormControlTextarea1" required >
  </div>
  <div class="form-row">
      <label for="validationServer01">Email</label>
       <input type="text" name="email" class="form-control" value="{{$user->email}}" id="exampleFormControlTextarea1" required >
  </div>
  <div class="form-row">
      <label for="validationServer01">Password</label>
      <input type="password" name="password" class="form-control is-valid"   id="validationServer01">
  </div>
  <br>
<button type="submit" class="btn btn-primary">Update</button>
</form>

</x-card>
@endsection

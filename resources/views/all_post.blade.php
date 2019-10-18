@extends('layouts.app')

@section('content')
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">tag</th>
      <th scope="col">discription</th>
      <th scope="col">Acton</th>
      
    </tr>
  </thead>
  <tbody>

  	
  	@foreach($post as $row)
    <tr>
      <th>{{ $row->id }}</th>
      <td>{{ $row->title }}</td>
      <td>{{ $row->tag }}</td>
      <td>{{ $row->discription }}</td>
      <td><a href="{{URL::to('delete_post/'.$row->id)}}" class="btn btn-danger" id="delete">Delete</a>     
       <a href="" class="btn btn-info">Edit</a></td>

    </tr>
    
  @endforeach
  </tbody>
</table>


@endsection
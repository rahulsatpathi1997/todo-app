@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                <div class="card-header bg-black text-white">
                    <div class="row">
                        <div class="col-sm-10">
                    <h3>Todo List</h3>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{url('/')}}/add">
                            <button type="button" class="btn btn-primary">Add List</button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#ID</th>
                            <th>NAME</th>
                            <th>DEPART</th>
                            <th>WORK</th>
                            <th>DUE DATE</th>
                            <th>ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($todos as $item)
                          <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->depart}}</td>
                            <td>{{$item->work}}</td>
                            <td>{{$item->due}}</td>
                            <td>
                                <a href="{{route('todo.edit',['id' => $item->id])}}">
                                <button type="button" class="btn btn-info">Update</button>
                                </a>
                                <a href="{{route('todo.delete',['id' => $item->id])}}">
                                <button type="button" class="btn btn-danger">Delete</button>
                                </a>
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
@endsection

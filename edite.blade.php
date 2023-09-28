@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header bg-black text-white">
                    <div class="row">
                        <div class="col-sm-10">
                    <h3>Update Todo List</h3>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{url('/')}}/home">
                            <button type="button" class="btn btn-primary">Back</button>
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
                        
                    <form action="{{$url}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <input type="text" class="form-control form-control-sm" value="{{$todos->name}}" name="name" >
                          <span class="text-danger">
                            @error('name')
                               {{$message}} 
                            @enderror
                          </span>
                        </div><br>
                        <div class="form-group">
                          <input type="text" class="form-control form-control-sm" value="{{$todos->depart}}"  name="depart">
                          <span class="text-danger">
                            @error('depart')
                               {{$message}} 
                            @enderror
                          </span>
                        </div><br>
                        <div class="form-group">
                          <input type="text" class="form-control form-control-sm" value="{{$todos->work}}" name="work">
                          <span class="text-danger"> 
                            @error('work')
                               {{$message}} 
                            @enderror
                          </span>
                        </div><br>
                        <div class="form-group">
                            <input type="date" class="form-control form-control-sm" value="{{$todos->due}}" name="due">
                            <span class="text-danger"> 
                              @error('due')
                                 {{$message}} 
                              @enderror
                            </span>
                          </div>
                        <br>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Record</button>
                        </div>
                      </form>

                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

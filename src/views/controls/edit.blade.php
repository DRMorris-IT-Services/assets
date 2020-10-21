@extends('layouts.app')

@section('content')
@foreach($user as $u)
<div class="container"> 
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
  @endif
  
  <div class="row justify-content-end">
    
  <a href="{{route('assays.controls',['id' => AUTH::user()->id])}}"><i class="fa fa-cog text-info"></i></a>
    
  </div>
  
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
    <a class="nav-link" id="home-tab" href="{{route('assays.controls',['id' => AUTH::user()->id])}}" role="tab" aria-controls="home" aria-selected="true">Users</a>
    </li>
    
    
  </ul>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header"><h3>{{ __('Update User Acess - ') }}{{$u->name}}</h3></div>

                <div class="card-body">
                    @if($count == 0)

                    <h4>Setup Required</h4>
                    <p>Please click the button below to setup the user for the first time.</p>
                    <a href="{{route('assays.controls.setup',['id' => $u->id])}}"><button class="btn btn-md btn-success">Setup User</button></a>

                    @else
                    @foreach($controls as $c)
                    <form action="{{ route('assays.controls.update',['id' => $c->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')  

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Access</th>
                                    <th>Allow</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Assay Admin</td>
                                    <td>
                                        @if($c->assay_admin == "on")
                                        <input type="checkbox" name="admin" onchange="submit()" checked>
                                        @else
                                        <input type="checkbox" name="admin" onchange="submit()" >
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>View Assays</td>
                                    <td>
                                        @if($c->assay_view == "on")
                                        <input type="checkbox" name="view" onchange="submit()" checked>
                                        @else
                                        <input type="checkbox" name="view" onchange="submit()" >
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Create New Assay</td>
                                    <td>
                                        @if($c->assay_add == "on")
                                        <input type="checkbox" name="new" onchange="submit()" checked>
                                        @else
                                        <input type="checkbox" name="new" onchange="submit()">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Edit Assay</td>
                                    <td>
                                        @if($c->assay_edit == "on")
                                        <input type="checkbox" name="edit" onchange="submit()" checked>
                                        @else
                                        <input type="checkbox" name="edit" onchange="submit()">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Delete Assay</td>
                                    <td>
                                        @if($c->assay_del == "on")
                                        <input type="checkbox" name="del" onchange="submit()" checked>
                                        @else
                                        <input type="checkbox" name="del" onchange="submit()">
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    @endforeach
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

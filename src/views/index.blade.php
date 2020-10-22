@extends('layouts.app')

@section('content')
<div class="container">
    @include('assets::layouts.alerts')


@if($count == 0)
<div class="row justify-content-end">
<a href="{{route('assets.controls',['id' => AUTH::user()->id])}}"><i class="fa fa-cog text-info"></i></a>
</div>

<h2>Setup Required</h2>
  <p>Please use the 'Clog' icon to setup the users.</p>
@endif
@if($count >= 1)
@foreach($controls as $c)

@if($c->assay_admin == "on")
<div class="row justify-content-end">
  <a href="{{route('assets.controls',['id' => AUTH::user()->id])}}"><i class="fa fa-cog text-info"></i></a>
  </div>
@endif



    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" href="{{route('assets')}}" role="tab" aria-controls="list" aria-selected="true">List</a>
        </li>
        @if($c->asset_add == "on")
        <li class="nav-item">
        <a class="nav-link" id="new-tab" href="#" data-toggle="modal" data-target="#newclient" role="tab" aria-controls="new" aria-selected="true">New Asset</a>
        </li>
        @endif
        

      </ul>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>{{ __('Assets') }}</h3></div>

                <div class="card-body">
                    
                    @if($c->asset_view == "on")
                    <table class="table">
                        <thead>
                            <th>
                                Name
                            </th>
                            <th>
                                Serial No.
                            </th>
                            <th>
                                Asset Tag
                            </th>
                            <th>
                                Purchase Date
                            </th>
                            <th>
                                Warranty Date
                            </th>
                            <th>
                                Issued To
                            </th>
                            <th>
                                Location
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Actions
                            </th>
                        </thead>
                        <tbody>
                        @foreach( $assets as $as)
                        <tr>
                        <td><a href="{{ route('assets.view',[$as->asset_id]) }}" >{{$as->asset_name}}</a></td>
                        <td>{{$as->asset_serial_no}}</td>
                        <td>{{$as->asset_tag_no}}</td>
                        <td>{{date('d/m/y', strtotime($as->asset_purchased_date))}}</td>
                        <td>{{date('d/m/y', strtotime($as->asset_warranty_date))}}</td>
                        <td>{{$as->asset_assigned_to}}</td>
                        <td>{{$as->asset_location}}</td>
                        <td>{{$as->asset_status}}</td>
                        <td>
                        @if($c->asset_edit == "on")
                        <button class="btn btn-sm btn-outline-warning fa fa-edit" data-toggle="modal" data-target="#editassay{{$as->asset_id}}"></button>
                                <!-- NEW CLIENT MODAL -->  
                                <div class="modal fade" id="editassay{{$as->asset_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header card-header bg-warning">
                                                <h4 class="modal-title" id="exampleModalLongTitle">Edit Assay</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="col-md-12" action="{{ route('assets.update',['id' => $as->asset_id]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')  
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                    <h5>Name</h5>
                                                    <input type="text" name="name" class="form-control" placeholder="Assay Name" required value="{{$as->assay_name}}">
                                                    </div>

                                                    <div class="form-group">
                                                    <h5>Barcode</h5>
                                                    <input type="text" name="barcode" class="form-control" placeholder="Barcode" value="{{$as->assay_barcode}}">
                                                    </div>

                                                    <div class="form-group">
                                                    <h5>Lot Number</h5>
                                                    <input type="text" name="assay_lot_no" class="form-control" placeholder="Assay Lot Number" required value="{{$as->assay_lot_no}}">
                                                    </div>

                                                    <div class="form-group">
                                                    <h5>Manufactured Date</h5>
                                                    <input type="text" name="manufactured_date" class="form-control" placeholder="Assay Manufactured Date" required value="{{$as->assay_manufactured_date}}">
                                                    </div>

                                                    <div class="form-group">
                                                    <h5>Statis</h5>
                                                    <select name="status" class="form-control">
                                                    <option>{{$as->assay_status}}</option>
                                                    <option>----</option>
                                                    <option>Approval In Progress</option>
                                                    <option>Approved For Sale</option>
                                                    <option>Un-Approved</option>
                                                    <option>Sold-Out</option>
                                                    </select>
                                                    </div>

                                                                
                                                                        
                                                            
                                                                        
                                                                        
                                                    </div>
                                                            
                                                        <div class="modal-footer card-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Save changes</button>
                                                        </div>
                                                    
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                <!-- END -->
                                @endif
                                @if($c->asset_del == "on")
                                <button class="btn btn-sm btn-outline-danger fa fa-trash" data-toggle="modal" data-target="#asset_del{{$as->id}}"></button>
                                    
                                    <!-- MODAL DELETE INVOICE -->
                                    <form class="col-md-12" action="{{ route('assets.del',['id' => $as->asset_id]) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                            
                                            <div class="modal fade" id="asset_del{{$as->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">REMOVE Asset??</h5>
                                                </div>
                                                <div class="modal-body">
                                                
                                                <h3><i class="fa fa-warning" ></i> WARNING!!</h3>
                                                <h5>You are going to remove this asset, are you sure?</h5>
                                                <h5>This action can <b><u>NOT BE UNDONE!</u></b></h5>
                                                    
                                                </div>
                                                <div class="modal-footer card-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-outline-danger">DELETE</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                            </form>

                                            <!-- END MODAL FOR DELETE CLIENT --> 
                                            @endif
                        </tr>
                         @endforeach
                </tbody>
                    </table>
                    {{ $assets->links() }}
                    @else
                    <p>Sorry, you don't have the access level required to view.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if($c->asset_add == "on")
<!-- NEW CLIENT MODAL -->  
<div class="modal fade" id="newclient" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header card-header">
                <h4 class="modal-title" id="exampleModalLongTitle">New Asset</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="col-md-12" action="{{ route('assets.add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')  
                <div class="modal-body">
                    <div class="form-group">
                    <h5>Name</h5>
                    <input type="text" name="name" class="form-control" placeholder="Assay Name" required>
                    </div>

                    <div class="form-group">
                    <h5>Model</h5>
                    <input type="text" name="model" class="form-control" placeholder="Model" >
                    </div>

                    <div class="form-group">
                    <h5>Serial Number</h5>
                    <input type="text" name="serial_no" class="form-control" placeholder="Serial Number" >
                    </div>

                    <div class="form-group">
                    <h5>Asset Tag</h5>
                    <input type="text" name="asset_tag" class="form-control" placeholder="Asset Tag" >
                    </div>

                    <div class="form-group">
                    <h5>Purchase Date</h5>
                    <input type="text" name="purchase_date" class="form-control" placeholder="Purchase Date (Y-m-d)" >
                    </div>

                    <div class="form-group">
                    <h5>Warranty Date</h5>
                    <input type="text" name="warranty_date" class="form-control" placeholder="Warranty Date (Y-m-d)" >
                    </div>

                    <div class="form-group">
                    <h5>Assigned To</h5>
                    <input type="text" name="assigned_to" class="form-control" placeholder="Assigned To" >
                    </div>

                    <div class="form-group">
                    <h5>Location</h5>
                    <input type="text" name="location" class="form-control" placeholder="Location" >
                    </div>

                    <div class="form-group">
                    <h5>Software</h5>
                    <input type="text" name="software" class="form-control" placeholder="Software" >
                    </div>

                    
                                
                                        
                            
                                        
                                        
                    </div>
                            
                        <div class="modal-footer card-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    
                </div>
        </div>
    </div>
<!-- END -->
@endif

@endforeach
@endif
@endsection

@push('scripts')
   
@endpush
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

@foreach( $assets as $as)

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link" id="list-tab" href="{{route('assets')}}" role="tab" aria-controls="list" aria-selected="true">List</a>
        </li>

        <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" id="purchase-tab" data-toggle="tab" href="#purchase" role="tab" aria-controls="purchase" aria-selected="false">Purchase Info</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" id="network-tab" data-toggle="tab" href="#network" role="tab" aria-controls="network" aria-selected="false">Network</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" id="software-tab" data-toggle="tab" href="#software" role="tab" aria-controls="software" aria-selected="false">Software</a>
        </li>

        <li class="nav-item">
        <a class="nav-link" id="assign-tab" data-toggle="tab" href="#assign" role="tab" aria-controls="assign" aria-selected="false">Assignment</a>
        </li>

        @if($c->asset_edit = "on")
        <li class="nav-item">
        <a class="nav-link bg-gradient-warning text-white" id="assign-tab" href="{{route('assets.edit',['id' => $as->asset_id])}}" role="tab" aria-controls="assign" aria-selected="false">Edit</a>
        </li>
        @endif

        @if($c->asset_del == "on")
        <li class="nav-item">
        <a class="nav-link bg-gradient-danger text-white" id="assign-tab" data-toggle="modal" data-target="#asset_del" href="#" role="tab" aria-controls="assign" aria-selected="false">DELETE</a>
        </li>
        @endif


        

      </ul>
      
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Update Asset - {{$as->asset_name}}</h3></div>

                <div class="card-body">
                    
                    @if($c->asset_edit == "on")
                    <form  action="{{ route('assets.update',['id' => $as->asset_id]) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')  
                    <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <div class="form-group">
                    <h5>Client</h5>
                    <input type="text" name="client" class="form-control" placeholder="Client Name" value="{{$as->asset_client}}" onchange="submit()">
                    </div>

                    <div class="form-group">
                                                    <h5>Name</h5>
                                                    <input type="text" name="name" class="form-control" placeholder="Assay Name" required value="{{$as->asset_name}}" onchange="submit()">
                                                    </div>

                                                    <div class="form-group">
                                                    <h5>Manufacturer</h5>
                                                    <input type="text" name="manufacturer" class="form-control" placeholder="Manufacturer" value="{{$as->asset_manufacturer}}" onchange="submit()" >
                                                    </div>

                                                    <div class="form-group">
                                                    <h5>Model</h5>
                                                    <input type="text" name="model" class="form-control" placeholder="Model" value="{{$as->asset_model}}" onchange="submit()">
                                                    </div>

                                                    <div class="form-group">
                                                    <h5>Serial Number</h5>
                                                    <input type="text" name="serial_no" class="form-control" placeholder="Serial Number" value="{{$as->asset_serial_no}}" onchange="submit()">
                                                    </div>

                                                    <div class="form-group">
                                                    <h5>Barcode</h5>
                                                    <input type="text" name="barcode" class="form-control" placeholder="Barcode" value="{{$as->asset_barcode}}" onchange="submit()">
                                                    </div>

                                                    <div class="form-group">
                                                    <h5>Asset Tag</h5>
                                                    <input type="text" name="asset_tag" class="form-control" placeholder="Asset Tag" value="{{$as->asset_tag_no}}" onchange="submit()">
                                                    </div>

                                                    <div class="form-group">
                                                    <h5>Status</h5>
                                                    <select name="status" class="form-control" onchange="submit()">
                                                    <option>{{$as->asset_status}}</option>
                                                    <option>----</option>
                                                    <option>Approved</option>
                                                    <option>Issued</option>
                                                    <option>In Storage</option>
                                                    <option>Disposed</option>
                                                    </select>
                                                    </div>
                    
                    </div>
                    <div class="tab-pane fade" id="purchase" role="tabpanel" aria-labelledby="purchase-tab">
                    <div class="form-group">
                                                    <h5>Purchase Date</h5>
                                                    <input type="text" name="purchased_date" class="form-control" placeholder="Purchase Date (Y-m-d)" value="{{$as->asset_purchase_date}}" onchange="submit()">
                                                    </div>

                                                    <div class="form-group">
                                                    <h5>Warranty Date</h5>
                                                    <input type="text" name="warranty_date" class="form-control" placeholder="Warranty Date (Y-m-d)" value="{{$as->asset_warranty_date}}" onchange="submit()">
                                                    </div>
                    </div>

                    <div class="tab-pane fade" id="network" role="tabpanel" aria-labelledby="network-tab">
                                                    <div class="form-group">
                                                    <h5>IP Address</h5>
                                                    <input type="text" name="ip" class="form-control" placeholder="IP Address" value="{{$as->asset_ip}}" onchange="submit()">
                                                    </div>
                    </div>

                    <div class="tab-pane fade" id="software" role="tabpanel" aria-labelledby="software-tab">
                    <div class="form-group">
                                                    <h5>Software</h5>
                                                    <input type="text" name="software" class="form-control" placeholder="Software" value="{{$as->asset_software}}" onchange="submit()">
                                                    </div>
                    </div>
                    <div class="tab-pane fade" id="assign" role="tabpanel" aria-labelledby="assign-tab">
                    <div class="form-group">
                                                    <h5>Assigned To</h5>
                                                    <input type="text" name="assigned_to" class="form-control" placeholder="Assigned To" value="{{$as->asset_assigned_to}}" onchange="submit()">
                                                    </div>

                                                    <div class="form-group">
                                                    <h5>Location</h5>
                                                    <input type="text" name="location" class="form-control" placeholder="Location" value="{{$as->asset_location}}" onchange="submit()">
                                                    </div>
                    </div>
                    </div>
</form>
                    
                    @else
                    <p>Sorry, you don't have the access level required to view.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
</div>



@if($c->asset_del == "on")
                                
                                    
                                    <!-- MODAL DELETE INVOICE -->
                                    <form class="col-md-12" action="{{ route('assets.del',['id' => $as->asset_id]) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                            
                                            <div class="modal fade" id="asset_del" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

@endforeach
@endforeach
@endif
@endsection

@push('scripts')
   
@endpush
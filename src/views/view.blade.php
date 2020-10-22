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

      </ul>
      
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Asset - {{$as->asset_name}}</h3></div>

                <div class="card-body">
                    
                    @if($c->asset_view == "on")
                    <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="form-group">
                                                    <h5>Name</h5>
                                                    {{$as->asset_name}}
                                                    </div>

                                                    <div class="form-group">
                                                    <h5>Model</h5>
                                                    {{$as->asset_model}}
                                                    </div>

                                                    <div class="form-group">
                                                    <h5>Serial Number</h5>
                                                    {{$as->asset_serial_no}}
                                                    </div>

                                                    <div class="form-group">
                                                    <h5>Barcode</h5>
                                                    {{$as->asset_barcode}}
                                                    </div>

                                                    <div class="form-group">
                                                    <h5>Asset Tag</h5>
                                                    {{$as->asset_tag_no}}
                                                    </div>

                                                    <div class="form-group">
                                                    <h5>Status</h5>
                                                    {{$as->asset_status}}
                                                    </div>
                    
                    </div>
                    <div class="tab-pane fade" id="purchase" role="tabpanel" aria-labelledby="purchase-tab">
                    <div class="form-group">
                                                    <h5>Purchase Date</h5>
                                                    {{$as->asset_purchase_date}}
                                                    </div>

                                                    <div class="form-group">
                                                    <h5>Warranty Date</h5>
                                                    {{$as->asset_warranty_date}}
                                                    </div>
                    </div>

                    <div class="tab-pane fade" id="software" role="tabpanel" aria-labelledby="software-tab">
                    <div class="form-group">
                                                    <h5>Software</h5>
                                                    {{$as->asset_software}}
                                                    </div>
                    </div>
                    <div class="tab-pane fade" id="assign" role="tabpanel" aria-labelledby="assign-tab">
                    <div class="form-group">
                                                    <h5>Assigned To</h5>
                                                    {{$as->asset_assigned_to}}
                                                    </div>

                                                    <div class="form-group">
                                                    <h5>Location</h5>
                                                    {{$as->asset_location}}
                                                    </div>
                    </div>
                    </div>
                    
                    
                    @else
                    <p>Sorry, you don't have the access level required to view.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
</div>




@endforeach
@endforeach
@endif
@endsection

@push('scripts')
   
@endpush
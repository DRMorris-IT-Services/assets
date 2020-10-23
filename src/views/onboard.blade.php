<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gnosis - Asset Onboarding</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- CoreUI CSS -->
 <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body class="c-app flex-row align-items-center">

<div class="container">
    


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>{{ __('Onboard Assets') }}</h3></div>

                <div class="card-body">

                <form  action="{{ route('assets.onboard.action',) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')  

                    <div class="form-group">
                    <h5>Company</h5>
                    <input type="text" name="client" class="form-control" placeholder="Your Company Name" >
                    </div>

                    <div class="form-group">
                    <h5>Asset Name</h5>
                    <input type="text" name="name" class="form-control" placeholder="Asset Name" value="{{$hostname}}" >
                    </div>

                    <div class="form-group">
                    <h5>Your Name</h5>
                    <input type="text" name="assigned_to" class="form-control" placeholder="Your Name" >
                    </div>

                    <div class="form-group">
                    <h5>Make</h5>
                    <input type="text" name="make" class="form-control" placeholder="Make" value="{{$make}}" >
                    </div>

                    <div class="form-group">
                    <h5>Manufacturer</h5>
                    <input type="text" name="vendor" class="form-control" placeholder="Manufacturer" value="{{$vendor}}" >
                    </div>

                    <div class="form-group">
                    <h5>Serial Number</h5>
                    <input type="text" name="serial_no" class="form-control" placeholder="Serial Number" value="{{$sn}}">
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
                    <h5>Hostname</h5>
                    <input type="text" name="hostname" class="form-control" placeholder="Hostname" value="{{$hostname}}" >
                    </div>

                    <div class="form-group">
                    <h5>IP Address</h5>
                    <input type="text" name="ip" class="form-control" placeholder="IP Address" value="{{$ip}}" >
                    </div>

                    <div class="form-group">
                    <h5>Software</h5>
                    <input type="text" name="software" class="form-control" placeholder="Software" value="{{$os}}" >
                    </div>

                    
                    <div class="card-footer">
                    <button type="submit" class="btn btn-success justify-content-end">Onboard Asset</button>
                    </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

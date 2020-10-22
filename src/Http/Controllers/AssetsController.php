<?php

namespace duncanrmorris\assets\Http\Controllers;

use Illuminate\Routing\Controller;

use duncanrmorris\assets\App\assets;
use duncanrmorris\assets\App\assetscontrols;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(assets $assets, assetscontrols $assetscontrols)
    {
        //

        return view('assets::index',[
            'assets' => $assets->paginate(15),
            'controls' => $assetscontrols->where('user_id',Auth::user()->id)->get(),
            'count' => $assetscontrols->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $asset_id = Str::random(60);
        $barcode = rand();
        

        assets::create([
            'asset_id' => $asset_id,
            'asset_name' => $request['name'], 
            'asset_model' => $request['model'], 
            'asset_serial_no' => $request['serial_no'], 
            'asset_barcode'  => $barcode, 
            'asset_tag_no'  => $request['asset_tag'], 
            'asset_purchase_date'  => $request['purchase_date'], 
            'asset_warranty_date' => $request['warranty_date'], 
            'asset_assigned_to'  => $request['assigned_to'], 
            'asset_location'  => $request['location'], 
            'asset_software'  => $request['software'],
            'asset_status' => "Pending Approval",
        ]);

        return back()->withStatus(__('Asset Successfully Created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\assets  $assets
     * @return \Illuminate\Http\Response
     */
    public function show(assets $assets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\assets  $assets
     * @return \Illuminate\Http\Response
     */
    public function edit(assets $assets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\assets  $assets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, assets $assets, $id)
    {
        //

        assets::where('asset_id', $id)
        ->update([
            'asset_name' => $request['name'], 
            'asset_model' => $request['model'], 
            'asset_serial_no' => $request['serial_no'], 
            'asset_barcode'  => $request['barcode'],
            'asset_tag_no'  => $request['asset_tag'], 
            'asset_purchase_date'  => $request['purchased_date'], 
            'asset_warranty_date' => $request['warranty_date'], 
            'asset_assigned_to'  => $request['assigned_to'], 
            'asset_location'  => $request['location'], 
            'asset_software'  => $request['software'],
            'asset_status' => $request['status'],
        ]);

        return back()->withStatus(__('Assay Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\assets  $assets
     * @return \Illuminate\Http\Response
     */
    public function destroy(assets $assets, $id)
    {
        //

        assets::where('asset_id', $id)
        ->delete();

        return back()->withDelete(__('Asset Successfully Deleted.'));
    }
}

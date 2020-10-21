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

        $assay_id = Str::random(60);
        $barcode = $request['barcode'];

        if($barcode == ""){
            $barcode = rand();
        }else{
            $barcode == $request['barcode'];
        }

        assets::create([
            'assay_id' => $assay_id,
            'assay_name' => $request['name'],
            'assay_barcode' => $barcode,
            'assay_lot_no' => $request['assay_lot_no'],
            'assay_manufactured_date' => $request['manufactured_date'],
            'assay_status' => "Pending Approval",
        ]);

        return back()->withStatus(__('Assay Successfully Created.'));
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

        assets::where('assay_id', $id)
        ->update([
            'assay_name' => $request['name'],
            'assay_barcode' => $request['barcode'],
            'assay_lot_no' => $request['assay_lot_no'],
            'assay_manufactured_date' => $request['manufactured_date'],
            'assay_status' => $request['status'],
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

        assets::where('assay_id', $id)
        ->delete();

        return back()->withDelete(__('Assay Successfully Deleted.'));
    }
}

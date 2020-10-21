<?php
 
namespace duncanrmorris\assets\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use App\User;

use duncanrmorris\assets\App\assetscontrols;


class AssetscontrolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $users, assetscontrols $assetscontrols, $id)
    {
        //

        return view('assets::controls.list',[
            'users' => $users->get(),
            'check' => $assetscontrols->where('user_id',$id)->count(),
            'controls' => $assetscontrols->where('user_id',$id)->get(),
            ]);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(assetscontrols $assetscontrols, $id)
    {
        //
        assetscontrols::create([
            'user_id' => $id,
            'asset_admin' => 'on',
        ]);

        return back()->withStatus(__('Access Levels successfully updated.'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\backupcontrols  $backupcontrols
     * @return \Illuminate\Http\Response
     */
    public function show(assetscontrols $assetscontrols, User $user, $id)
    {
        //
        return view('assets::controls.view',[
            'count' => $assetscontrols->where('user_id',$id)->count(),
            'controls' => $assetscontrols->where('user_id',$id)->get(),
            'user' => $user->where('id',$id)->get()
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\backupcontrols  $backupcontrols
     * @return \Illuminate\Http\Response
     */
    public function edit(assetscontrols $assetscontrols, User $user, $id)
    {
        //
        return view('assets::controls.edit',[
            'count' => $assetscontrols->where('user_id',$id)->count(),
            'controls' => $assetscontrols->where('user_id',$id)->get(),
            'user' => $user->where('id',$id)->get()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\backupcontrols  $backupcontrols
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, assetscontrols $assetscontrols, $id)
    {
        //

        assetscontrols::where('id',$id)
        ->update([
        'asset_admin' => $request['admin'],
        'asset_view' => $request['view'],
        'asset_add' => $request['new'],
        'asset_edit' => $request['edit'],
        'asset_del' => $request['del'],
        ]);
        return back()->withStatus(__('Access Levels successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\backupcontrols  $backupcontrols
     * @return \Illuminate\Http\Response
     */
    public function destroy(clients $backupcontrols)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\data_pembeli;
use App\Models\Laptopdijual;
use Illuminate\Http\Request;
use App\Models\Laptopdijualuser;

class LaptopdijualuserController extends Controller
{
    public function index()
    {
        $data = Laptopdijual::with('stock')->paginate();
        $datajual = Laptopdijual::all();
        $pesan = data_pembeli::all();
        return view('user.laptopdijual.laptopdijual',compact('data','datajual','pesan'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laptopdijualuser  $laptopdijualuser
     * @return \Illuminate\Http\Response
     */
    public function show(Laptopdijualuser $laptopdijualuser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laptopdijualuser  $laptopdijualuser
     * @return \Illuminate\Http\Response
     */
    public function edit(Laptopdijualuser $laptopdijualuser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laptopdijualuser  $laptopdijualuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laptopdijualuser $laptopdijualuser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laptopdijualuser  $laptopdijualuser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laptopdijualuser $laptopdijualuser)
    {
        //
    }
}

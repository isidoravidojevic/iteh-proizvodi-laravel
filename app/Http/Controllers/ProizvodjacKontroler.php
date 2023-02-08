<?php

namespace App\Http\Controllers;

use App\Models\Proizvodjac;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProizvodjacKontroler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proizvodjaci = DB::table('proizvodjacs')->get();

        return response()->json([
            'Message' => $proizvodjaci
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
        $validator = Validator::make($request->all(), [
            'naziv' => 'required',
            'adresa' => 'required',
            'email' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'Message' => $validator->errors()
            ]);
        }

        DB::table('proizvodjacs')->insert([
            'naziv' => $request->naziv,
            'adresa' => $request->adresa,
            'email' => $request->email,
        ]);

        return response()->json([
            'Message' => 'Successfully saved'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proizvodjac  $proizvodjac
     * @return \Illuminate\Http\Response
     */
    public function show(Proizvodjac $proizvodjac)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proizvodjac  $proizvodjac
     * @return \Illuminate\Http\Response
     */
    public function edit(Proizvodjac $proizvodjac)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proizvodjac  $proizvodjac
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proizvodjac $proizvodjac)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proizvodjac  $proizvodjac
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('proizvodjacs')->where('id', '=', $id)->delete();

        return response()->json([
            'Message' => 'Successfully deleted'
        ]);
    }
}

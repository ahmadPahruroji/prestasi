<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Jurusan;
use Alert;
class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data["jurusans"] = Jurusan::orderBy('created_at','desc')->get();
        return view('jurusan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data["jurusans"] = Jurusan::get();
        return view('jurusan.create',$data);
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
        // dd($request);
        $jurusan = new Jurusan;
        $jurusan->fill($request->all());
        // $biodata->user_id = Auth::user()->id;
        $jurusan->save();

        return redirect()->route('jurusans.index', $jurusan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data["jurusans"] = Jurusan::find($id);
        return view('jurusan.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $jurusan = Jurusan::find($id);
        $jurusan->fill($request->all());
        $jurusan->update();

        // Alert::success('ok','berhasil');
        return redirect()->route('jurusans.index')->with(['success' => 'Data berhasil Di ubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Jurusan::find($id)->delete();
        return response()->json($data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ServiceImport;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::paginate(10);
        if($services)
            return response()->json($services);

        return response()->json(['error' => 'Response not found'], 401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new Service();
        $service->name        = $request->name;
        $service->description = $request->description;
        $service->price       = $request->price;
        $service->save();

        if($service)
            return response()->json([
                'message' => 'service successfully updated',
                'service' => $service
            ], 201);

        return response()->json(['error'=>'Response not found'], 401);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servico = Service::find($id);

        if($servico)
            return response()->json($servico);

        return response()->json(['error'=>'Response not found'], 401);
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
        $service = Service::find($id);

        $service->name        = $request->name;
        $service->description = $request->description;
        $service->price       = $request->price;
        $service->save();

        if($service)
            return response()->json([
                'message' => 'Service successfully updated',
                'service' => $service
            ], 201);

        return response()->json(['error'=>'Response not found'], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request)
    {
        Excel::import(new ServiceImport, $request->file('file')->store('temp'));
        return response()->json([
            'message' => 'Service successfully uploaded'
        ], 201);
    }

    public function fileImportExport()
    {
       return view('file-import');
    }
}

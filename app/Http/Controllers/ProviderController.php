<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\ProviderRequest;

class ProviderController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::with('services')->paginate(10);

        if($providers)
            return response()->json($providers);

        return response()->json(['error' => 'Response not found'], 401);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProviderRequest $request)
    {

        try{

            $provider = Provider::create($request->all());

            $provider->services()->sync($request->services);

            return response()->json([
                'message' => 'Provider successfully created',
                'provider' => $provider
            ], 201);

        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provider = Provider::find($id);

        if($provider)
            return response()->json($provider);

        return response()->json(['error'=>'Response not found'], 401);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProviderRequest $request, $id)
    {
        $provider = Provider::findOrFail($id);

        $provider->update($request->all());

        $provider->services()->sync($request->services);

        if($provider)
            return response()->json([
                'message' => 'Provider successfully updated',
                'provider' => $provider
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
        //
    // }
}

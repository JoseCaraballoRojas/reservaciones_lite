<?php

namespace Vanguard\Http\Controllers;

use Illuminate\Http\Request;

use Vanguard\Http\Requests;
use Vanguard\Repositories\Sucursal\SucursalRepository;
use Vanguard\Http\Requests\SucursalRequest;
use Vanguard\Empresa;
use Vanguard\User;
use Vanguard\Sucursal;
class SucursalesController extends Controller
{

     protected $sucursales;

     public function __construct(SucursalRepository $sucursales)
     {
       $this->sucursales = $sucursales;
     }

     /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
    public function index()
    {
        $sucursales = Sucursal::orderBy('id', 'DESC')->paginate(5);

        $sucursales->each(function ($sucursales){
          $sucursales->empresa;
          $sucursales->user;
        });

          return view('sucursales.index')
              ->with('sucursales', $sucursales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        return view('sucursales.create', [
            'users' => $this->sucursales->getUsers(),
            'empresas' => $this->sucursales->getEmpresas(),
            'edit' => $edit
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SucursalRequest $request)
    {
        $sucursal = new Sucursal($request->all());
        $sucursal->save();
        return redirect()->route('sucursales.index')
            ->withSuccess('Sucursal creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $sucursal = Sucursal::find($id);
      $contacto1= $this->sucursales->findUser($sucursal->contacto1_id);
      if ($sucursal->contacto2_id)
      {
          $contacto2= $this->sucursales->findUser($sucursal->contacto2_id);
      }
      return view('sucursales.view', compact('sucursal', 'contacto1', 'contacto2'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sucursal = Sucursal::find($id);
        $sucursal->user;
        $sucursal->empresa;
        $edit = true;
        $users = $this->sucursales->getUsers();
        $empresas = $this->sucursales->getEmpresas();
        return view('sucursales.edit', compact('edit', 'users', 'empresas', 'sucursal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SucursalRequest $request, $id)
    {
        $sucursal = Sucursal::find($id);
        $sucursal->fill($request->all());
        $sucursal->save();
        return redirect()->route('sucursales.index')
            ->withSuccess('Sucursal actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $sucursal = Sucursal::find($id);
      $sucursal->delete();
      return redirect()->route('sucursales.index')
          ->withSuccess('Sucursal eliminada con exito');
    }
}

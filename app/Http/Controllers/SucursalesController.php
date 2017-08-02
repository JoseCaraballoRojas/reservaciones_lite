<?php

namespace Vanguard\Http\Controllers;

use Illuminate\Http\Request;

use Vanguard\Http\Requests;
use Vanguard\Repositories\Sucursal\SucursalRepository;
use Vanguard\Http\Requests\SucursalRequest;
use Vanguard\Http\Requests\SucursalUpdateRequest;
use Vanguard\Empresa;
use Vanguard\User;
use Vanguard\Sucursal;
class SucursalesController extends Controller
{

     protected $sucursales;

     public function __construct(SucursalRepository $sucursales)
     {
        $this->middleware('auth');
        $this->sucursales = $sucursales;
        $this->middleware('permission:users.manage');
     }

     /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
    public function index()
    {
        $sucursales = $this->sucursales->index();

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
        $name = 'null';
      if ($request->file('imagen')) {

          $logo = $request->file('imagen');
          $name = 'reservaciones_' . time() . '.' . $logo->getClientOriginalExtension();
          $path = public_path() . '/img/sucursales/';
          $logo->move($path, $name);

      }
      $request['logo'] = $name;

        $this->sucursales->create($request->except('imagen'));

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
        $sucursal = $this->sucursales->findSucursalByID($id);
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
    public function update(SucursalUpdateRequest $request, $id)
    {
        $name = 'null';
        if ($request->file('imagen')) {

            $logo = $request->file('imagen');
            $name = 'reservaciones_' . time() . '.' . $logo->getClientOriginalExtension();
            $path = public_path() . '/img/sucursales/';
            $logo->move($path, $name);
        }
        $request['logo'] = $name;

        $sucursal = $this->sucursales->findSucursalByID($id);
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
      $sucursal = $this->sucursales->findSucursalByID($id);
      $sucursal->delete();
      return redirect()->route('sucursales.index')
          ->withSuccess('Sucursal eliminada con exito');
    }

}

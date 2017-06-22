<?php

namespace Vanguard\Http\Controllers;

use Illuminate\Http\Request;

use Vanguard\Http\Requests;
use Vanguard\Repositories\Empresa\EmpresaRepository;
use Vanguard\Http\Requests\EmpresaRequest;
use Vanguard\Empresa;
use Vanguard\User;


class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $empresas;

    public function __construct(EmpresaRepository $empresas)
    {
      $this->empresas = $empresas;
    }

    public function index()
    {
        $empresas = $this->empresas->index();
        $empresas->each(function ($empresas){
          $empresas->user;
        });

        return view('empresas.index')
            ->with('empresas', $empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        return view('empresas.create', [
            'users' => $this->empresas->getUsers(),
            'edit' => $edit
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequest $request)
    {
      
      $this->empresas->create($request->all());
      
      return redirect()->route('empresas.index')
          ->withSuccess('Empresa creada con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $empresa = $this->empresas->findEmpresayByID($id);
      $contacto1= $this->empresas->findUser($empresa->contacto1_id);
      if ($empresa->contacto2_id)
      {
          $contacto2= $this->empresas->findUser($empresa->contacto2_id);
      }
      return view('empresas.view', compact('empresa', 'contacto1', 'contacto2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $empresa = $this->empresas->findEmpresayByID($id);
      $empresa->user;
      $edit = true;
      $users= $this->empresas->getUsers();
      return view('empresas.edit', compact('edit','users', 'empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaRequest $request, $id)
    {
      $empresa = $this->empresas->findEmpresayByID($id);
      $empresa->fill($request->all());
      $empresa->save();
      return redirect()->route('empresas.index')
          ->withSuccess('Empresa actualizada con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $empresa = $this->empresas->findEmpresayByID($id);
      $empresa->delete();
      return redirect()->route('empresas.index')
          ->withSuccess('Empresa eliminada con exito');
    }
}

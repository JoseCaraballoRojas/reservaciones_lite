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
    protected $users;

    public function __construct(EmpresaRepository $users)
    {
      $this->users = $users;
    }

    public function index()
    {
      $empresas = Empresa::orderBy('id', 'DESC')->paginate(5);
      $empresas->each(function ($empresas){
        $empresas->username;
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
            'users' => $this->users->getUsers(),
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
      $empresa = new Empresa($request->all());
      $empresa->save();
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
      $empresa = Empresa::find($id);
      $empresa->user;
      $edit = true;
      $users= $this->users->getUsers();
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
      $empresa = Empresa::find($id);
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
      $empresa = Empresa::find($id);
      $empresa->delete();
      return redirect()->route('empresas.index')
          ->withSuccess('Empresa eliminada con exito');
    }
}

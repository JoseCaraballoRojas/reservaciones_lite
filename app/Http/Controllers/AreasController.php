<?php

namespace Vanguard\Http\Controllers;

use Illuminate\Http\Request;

use Vanguard\Http\Requests;
use Vanguard\Repositories\Area\AreaRepository;
use Vanguard\Http\Requests\AreaRequest;
use Vanguard\User;
use Vanguard\Sucursal;
use Vanguard\Area;

class AreasController extends Controller
{
    protected $areas;

    public function __construct(AreaRepository $areas)
    {
      $this->areas = $areas;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::orderBy('id', 'DESC')->paginate(5);

        $areas->each(function ($areas){
          $areas->sucursal;
          $areas->user;
        });

          return view('areas.index')
              ->with('areas', $areas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        return view('areas.create', [
            'users' => $this->areas->getUsers(),
            'sucursales' => $this->areas->getSucursales(),
            'edit' => $edit
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request)
    {
        $areas = new Area($request->all());
        $areas->save();
        return redirect()->route('areas.index')
            ->withSuccess('Area creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $area = Area::find($id);
        $responsable = $this->areas->findUser($area->responsable_id);

        return view('areas.view', compact('area', 'responsable'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::find($id);
        $area->user;
        $area->sucursal;
        $edit = true;
        $users = $this->areas->getUsers();
        $sucursales = $this->areas->getSucursales();
        return view('areas.edit', compact('edit', 'users', 'sucursales', 'area'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $request, $id)
    {
        $area = Area::find($id);
        $area->fill($request->all());
        $area->save();
        return redirect()->route('areas.index')
            ->withSuccess('Area actualizada con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = Area::find($id);
        $area->delete();
        return redirect()->route('areas.index')
            ->withSuccess('Area eliminada con exito');

    }
}

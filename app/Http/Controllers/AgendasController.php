<?php

namespace Vanguard\Http\Controllers;

use Illuminate\Http\Request;

use Vanguard\Http\Requests;
use Vanguard\Repositories\Agenda\AgendaRepository;
use Vanguard\Http\Requests\AgendaRequest;
use Vanguard\User;
use Vanguard\Area;
use Vanguard\Agenda;

class AgendasController extends Controller
{

    protected $agendas;

    public function __construct(AgendaRepository $agendas)
    {
      $this->agendas = $agendas;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agendas = Agenda::orderBy('id', 'DESC')->paginate(5);

        $agendas->each(function ($agendas){
          $agendas->area;
          $agendas->user;
        });

          return view('agendas.index')
              ->with('agendas', $agendas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        $motivos = ['turno' => 'turno', 'tiempo' => 'tiempo'];
        return view('agendas.create', [
            'users' => $this->agendas->getUsers(),
            'empresas' => $this->agendas->getEmpresas(),
            'motivos' => $motivos,
            'edit' => $edit
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgendaRequest $request)
    {
        $agenda = new Agenda($request->except(['sucursal']));
        $agenda->save();
        return redirect()->route('agendas.index')
            ->withSuccess('Agenda creada con exito');
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
      $agenda = Agenda::find($id);
      $agenda->user;
      $agenda->area;
      $empresa_id = $this->agendas->getSucursalByID($agenda->area->sucursal_id);
      //dd($empresa_id);
      $edit = true;
      $motivos = ['1' => 'turno', '2' => 'tiempo'];
      $users = $this->agendas->getUsers();
      $empresas = $this->agendas->getEmpresas();
      $sucursales = $this->agendas->getSucursales();

      $areas = $this->agendas->getAreas();
      return view('agendas.edit',
      compact('edit', 'users', 'empresas', 'empresa_id', 'sucursales', 'areas', 'agenda', 'motivos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgendaRequest $request, $id)
    {
      $agenda = Agenda::find($id);
      $agenda->fill($request->except(['sucursal']));
      $agenda->save();
      return redirect()->route('agendas.index')
          ->withSuccess('Agenda actualizada con exito');
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
    }

    public function getSucursalesByID(Request $request, $id)
    {
        if ($request->ajax()) {
            $sucursales = $this->agendas->getSucursalesByID($id);
            return response()->json($sucursales);
        }
    }

    public function getAreasByID(Request $request, $id)
    {
        if ($request->ajax()) {
            $areas = $this->agendas->getAreasByID($id);
            return response()->json($areas);
        }
    }
}

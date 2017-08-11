<?php

namespace Vanguard\Http\Controllers;

use Illuminate\Http\Request;

use Vanguard\Http\Requests;
use Vanguard\Repositories\Agenda\AgendaRepository;
use Vanguard\Http\Requests\AgendaRequest;
use Vanguard\Http\Requests\AgendaUpdateConfigRequest;
use Vanguard\User;
use Vanguard\Area;
use Vanguard\Agenda;
use Auth;
use Carbon\Carbon;
use Vanguard\Services\Logging\UserActivity\Logger;

class AgendasController extends Controller
{

    protected $agendas;

    protected $logger;

    public function __construct(AgendaRepository $agendas, Logger $logger)
    {
      $this->middleware('auth');
      $this->agendas = $agendas;
      $this->logger = $logger;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $agendas = $this->agendas->getAgendas();

        $agendas->each(function ($agendas){
          $agendas->empresa;
          $agendas->user;
        });

          return view('agendas.index')
              ->with('agendas', $agendas);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function agendasResponsable()
    {
        $id = Auth::user()->id;
        $agendas = $this->agendas->getAgendaByResponsableID($id);

        $agendas->each(function ($agendas){
          $agendas->area;
          $agendas->user;
        });

          return view('agendas.agendasResponsable')
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
        $motivos = ['1' => 'turno', '2' => 'tiempo'];
        return view('agendas.create', [
            'users' => $this->agendas->getUsers(),
            'empresas' => $this->agendas->getEmpresas(),
            'reasons' => $this->agendas->getReasons(),
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

        $agenda = $this->agendas->create($request->all());

        $data = 'Creacion de Agenda: ' . $agenda->empresa->nombre ;

        $userActivities = $this->logger->log($data);


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
        $agenda = $this->agendas->findAgendaByID($id);
        $agenda->each(function ($agenda){
          $agenda->empresa;
          $agenda->reason;
          $agenda->user;
        });

        return view('agendas.view', [
            'agenda' => $agenda
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $agenda = $this->agendas->findAgendaByID($id);
      $agenda->user;
      $agenda->empresa;

      $edit = true;
      $motivos = ['1' => 'turno', '2' => 'tiempo'];
      $users = $this->agendas->getUsers();
      $empresas = $this->agendas->getEmpresas();
      $reasons = $this->agendas->getReasons();
      return view('agendas.edit',
      compact('edit', 'users', 'empresas', 'agenda', 'motivos', 'reasons'));
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
      $agenda = $this->agendas->findAgendaByID($id);
      $agenda->fill($request->all());
      $agenda->save();

      $data = 'Edicion de Agenda: ' . $agenda->empresa->nombre ;

      $userActivities = $this->logger->log($data);

      return redirect()->route('agendas.index')
          ->withSuccess('Agenda actualizada con exito');
    }

    /**
    * Configurar agendas
    *
    * @param  int  $id
    *
    * @return \Illuminate\Http\Response
    */
    public function configAgenda($id)
    {
        $agenda = $this->agendas->findAgendaByID($id);
        $reasons = $this->agendas->getReasons();
        return view('agendas.config', compact('agenda', 'reasons'));
    }

    /**
    * Configurar agendas
    *
    * @param  int  $id
    *
    * @return \Illuminate\Http\Response
    */
    public function configAgendaUpdate(Request $request)
    {

        $agenda = $this->agendas->findAgendaByID($request->id);
        $agenda->fill($request->all());
        $agenda->save();
        return redirect()->back()
            ->withSuccess('Configuracion de ageda actualizada con exito');
    }
    /**
    * Mostrar citas de la agenda
    *
    * @param int $id
    *
    * @return \Illuminate\Http\Response
    */
    public function getCitasAgendaByID($id)
    {
        $agenda = $this->agendas->findAgendaByID($id);
        $agenda->each(function ($agenda){
          $agenda->empresa;
          $agenda->user;
        });
        $citas = $this->agendas->getCitasAgendaByID($id);
        $citas->each(function ($citas){
          $citas->agenda->empresa;
          $citas->agenda->user;
          $citas->reason;
        });

          return view('agendas.viewCitas', compact('agenda', 'citas'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agenda = $this->agendas->findAgendaByID($id);
        $agenda->delete();

        $data = 'Eliminacion de Agenda: ' . $agenda->empresa->nombre ;

        $userActivities = $this->logger->log($data);

        return redirect()->route('agendas.index')
            ->withSuccess('Agenda eliminada con exito');
    }


    public function getAgendasByID(Request $request, $id)
    {
        if ($request->ajax()) {
            $agendas = $this->agendas->getAgendasByID($id);
            return response()->json($agendas);
        }
    }

    public function getAgendaByID(Request $request, $id)
    {
        if ($request->ajax()) {
            $agenda = $this->agendas->getAgendaByID($id);
            return response()->json($agenda);
        }
    }
}

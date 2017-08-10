<?php

namespace Vanguard\Http\Controllers;

use Illuminate\Http\Request;

use Vanguard\Http\Requests;
use Vanguard\Repositories\Holiday\HolidayRepository;
use Vanguard\Http\Requests\HolidayRequest;
use Vanguard\Services\Logging\UserActivity\Logger;

class HolidaysController extends Controller
{

    protected $holidays;

    protected $logger;

    public function __construct(HolidayRepository $holidays, Logger $logger)
    {
        $this->middleware('auth');
        $this->holidays = $holidays;
        $this->logger = $logger;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $holidays = $this->holidays->index();
        $holidays->each(function ($holidays){
          $holidays->agenda->empresa;
        });

          return view('holidays.index')
              ->with('holidays', $holidays);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        return view('holidays.create', [
            'edit' => $edit
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HolidayRequest $request)
    {
      $agenda_id = $this->holidays->getAgenda();
      $holidays = $request->all();
      $holidays = array_add($holidays, 'agendas_id', $agenda_id[0]);

      $holiday = $this->holidays->create($holidays);

      $data = 'Creacion de Dia Festivo: ' . $holiday->day;

      $userActivities = $this->logger->log($data);

      return redirect()->route('holidays.index')
          ->withSuccess('Dia Festivo creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $holiday = $this->holidays->findHolidayByID($id);
        $empresas = $this->holidays->getEmpresas();
        $edit = true;
        return view('holidays.edit',
        compact('edit', 'holiday', 'empresas'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HolidayRequest $request, $id)
    {

        $holiday = $this->holidays->findHolidayByID($id);
        $holiday->fill($request->all());
        $holiday->save();

        $data = 'Edicion de Dia Festivo: ' . $holiday->day;

        $userActivities = $this->logger->log($data);

        return redirect()->route('holidays.index')
            ->withSuccess('Dia Festivo actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $holiday = $this->holidays->findHolidayByID($id);
        $holiday->delete();

        $data = 'Eliminacion de Dia Festivo: ' . $holiday->day;

        $userActivities = $this->logger->log($data);

        return redirect()->route('holidays.index')
            ->withSuccess('Dia Festivo eliminado con exito');
    }
}

<?php

namespace Vanguard\Http\Controllers;

use Illuminate\Http\Request;

use Vanguard\Http\Requests;
use Vanguard\Repositories\Agenda\AgendaRepository;
use Vanguard\Repositories\Cita\CitaRepository;
use Auth;
class CitasController extends Controller
{

    protected $citas;
    protected $agendas;

    public function __construct(CitaRepository $citas, AgendaRepository $agendas)
    {
      $this->citas = $citas;
      $this->agendas = $agendas;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('citas.indexAdmin');
    }

    public function indexCliente()
    {
        $id = Auth::user()->id;
        $appointments = $this->citas->getAppointmentsByID($id);
        $appointments->each(function ($appointments){
          $appointments->agenda->area;
          $appointments->reason;
        });

        //dd($appointments);
        return view('citas.indexCliente', [
            'appointments' => $appointments
        ]);

    }

    public function indexResponsable()
    {
        return view('citas.indexResponsable');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

      return view('citas.create', [
          'empresas' => $this->agendas->getEmpresas(),
          'reasons' => $this->agendas->getReasons()
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
     {
       //dd($request->all());

       $this->citas->create($request->all());

       if (Auth::user()->roles->first()->name == 'Client') {
         return redirect()->route('citas.indexCliente')
             ->withSuccess('Cita creada con exito');
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
         $appointment = $this->citas->findAppointmentByID($id);

         $appointment->each(function ($appointment){
           $appointment->agenda->area->sucursal->empresa;
           $appointment->reason;
           $appointment->agenda->user;
         });
         //$responsable = $this->areas->findUser($area->responsable_id);
         //dd($appointment);
         return view('citas.viewCliente', [
             'appointment' => $appointment
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
     public function update(Request $request, $id)
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

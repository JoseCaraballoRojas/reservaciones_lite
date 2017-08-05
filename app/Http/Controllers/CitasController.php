<?php

namespace Vanguard\Http\Controllers;

use Illuminate\Http\Request;

use Vanguard\Http\Requests;
use Vanguard\Repositories\Agenda\AgendaRepository;
use Vanguard\Repositories\Cita\CitaRepository;
use Auth;
use Vanguard\Cita;
use Carbon\Carbon;
use Vanguard\Mailers\UserMailer;


class CitasController extends Controller
{

    protected $citas;
    protected $agendas;

    public function __construct(CitaRepository $citas, AgendaRepository $agendas)
    {
      $this->middleware('auth');
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

    public function citasResponsable()
    {
      $id = Auth::user()->id;
        $citas = $this->citas->getAppointmentsByID($id);

      return view('citas.citas-responsable');
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

       $this->citas->create($request->all());

       if (Auth::user()->roles->first()->name == 'Client') {
         return redirect()->route('citas.indexCliente')
             ->withSuccess('Cita creada con exito');
       }
       if (Auth::user()->roles->first()->name == 'User') {
         return redirect()->route('agendas.agendasResponsable')
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
         #code..

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
         #code...
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
       $cita = $this->citas->findCitaByID($id);

       $cita->delete();
       if (Auth::user()->roles->first()->name == 'Client') {
         return redirect()->route('citas.indexCliente')
             ->withSuccess('Cita eliminada con exito');
       }
       if (Auth::user()->roles->first()->name == 'User') {
         return redirect()->route('agendas.agendasResponsable')
             ->withSuccess('Cita eliminada con exito');
       }
       if (Auth::user()->roles->first()->name == 'Admin') {
         return redirect()->route('agendas.citas', $cita->agenda_id)
            ->withSuccess('Cita eliminada con exito');
       }

     }
     /**
     * aprobar las citas solicitadas por los clientes en las agendas
     *
     *@param  int  $id
     *@return \Illuminate\Http\Response
     **/
     public function aprobar(Request $request, $id)
     {

         $cita = $this->citas->findCitaByID($id);
         $estatus = 'aprobada';
         $cita->appointment_status = $estatus;
         $cita->fill($request->all());
         $cita->save();
         return redirect()->route('agendas.citas', $cita->agenda_id)
           ->withSuccess('Cita aprobada con exito');

     }

     /**
     * cancelar las citas solicitadas por los clientes en las agendas
     *
     *@param  int  $id
     *@return \Illuminate\Http\Response
     **/
     public function cancelar(Request $request,UserMailer $mailer, $id)
     {

         $cita = $this->citas->findCitaByID($id);
         $agenda = $this->agendas->findAgendaByID($cita->agenda_id);

         $confirmar = $agenda->cancel_with_confirmation_email;

         if ($confirmar == "1") {

            if (Auth::user()->roles->first()->name == 'Client') {

               $this->sendConfirmationCancelCita($mailer, $id );
               return redirect()->route('citas.indexCliente')
                   ->withSuccess('Cita cancelada con exito');
             }

         }
         else{
            $estatus = 'Cancelada';
            $cita->appointment_status = $estatus;
            $cita->fill($request->all());
            $cita->save();

            if (Auth::user()->roles->first()->name == 'Client') {
               return redirect()->route('citas.indexCliente')
                   ->withSuccess('Cita cancelada con exito');
             }
             if (Auth::user()->roles->first()->name == 'User') {
               return redirect()->route('agendas.agendasResponsable')
                   ->withSuccess('Cita cancelada con exito');
             }
             if (Auth::user()->roles->first()->name == 'Admin') {
               return redirect()->route('agendas.citas', $cita->agenda_id)
                  ->withSuccess('Cita cancelada con exito');
             }

            return redirect()->route('agendas.citas', $cita->agenda_id)
                ->withSuccess('se le envio un correo para confirmar la cancelacion de la cita');
         }

         $estatus = 'Cancelada';
         $cita->appointment_status = $estatus;
         $cita->fill($request->all());
         $cita->save();
         return redirect()->route('agendas.citas', $cita->agenda_id)
           ->withSuccess('Cita cancelada con exito');

     }

     public function getCitasByAgendaAndDay(Request $request)
     {
         if ($request->ajax()) {
            $citas = $this->citas->getCitasByAgendaAndDay($request);
            return response()->json($citas);
        }
     }

     /**
     * @param UserMailer $mailer
     * @param $user
     */
    private function sendConfirmationCancelCita(UserMailer $mailer, $id)
    {
        $cita = $this->citas->findCitaByID($id);

        $token = str_random(60);
        $user = Auth::user();

        $cita->confirmation_token = $token;

        $cita->save();

        $mailer->sendConfirmationCancelCita($user, $token);
    }

    /**
     * Confirm cancel cita by email.
     *
     * @param $token
     * @return $this
     */
    public function confirmCancelEmail($token)
    {
        $cita = $this->citas->findCitaByConfirmationToken($token);

        if($cita)
        {

            $estatus = 'Cancelada';
            $cita->appointment_status = $estatus;
            $cita->confirmation_token = null;

            $cita->save();

            return redirect()->to('login')
                ->withSuccess(trans('app.email_confirmed_cancel_cita'));
        }

        return redirect()->to('login')
            ->withErrors(trans('app.wrong_confirmation_token'));
    }

}

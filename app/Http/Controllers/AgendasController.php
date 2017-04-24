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
        return view('agendas.create', [
            'users' => $this->agendas->getUsers(),
            'empresas' => $this->agendas->getEmpresas(),
            //'sucursales' => $this->areas->getSucursales(),
            //'areas' => $this->areas->getAreas(),
            'edit' => $edit
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
        //
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
        //
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
        //
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
}

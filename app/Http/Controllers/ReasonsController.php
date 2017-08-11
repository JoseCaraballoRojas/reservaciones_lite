<?php

namespace Vanguard\Http\Controllers;

use Illuminate\Http\Request;

use Vanguard\Http\Requests;
use Vanguard\Repositories\Reason\ReasonRepository;
use Vanguard\Http\Requests\ReasonRequest;
use Vanguard\Reason;
use Vanguard\Services\Logging\UserActivity\Logger;

class ReasonsController extends Controller
{

    /**
    * @var ReasonRepository
    */
    protected $reasons;

    protected $logger;
    /**
    * ReasonController constructor.
    * @param ReasonRepository $reasons
    */
    public function __construct(ReasonRepository $reasons, Logger $logger)
    {
        $this->middleware('auth');
        $this->reasons = $reasons;
        $this->logger = $logger;
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $perPage = 7;

        $reasons = $this->reasons->getReasons($perPage);

        return view('reasons.index', compact('reasons'));

          return view('reasons.index')
              ->with('reasons', $reasons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        return view('reasons.create', ['edit' => $edit]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReasonRequest $request)
    {
        $reason = $this->reasons->create($request->all());

        $data = 'Creacion de Razon: ' . $reason->reason ;

        $userActivities = $this->logger->log($data);

        return redirect()->route('reasons.index')
            ->withSuccess('Razon creada con exito');
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
        $edit = true;
        $reason = $this->reasons->findReasonByID($id);

        return view('reasons.edit', compact('reason', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReasonRequest $request, $id)
    {
        $reason = $this->reasons->findReasonByID($id);
        $reason->fill($request->all());
        $reason->save();

        $data = 'Edicion de Razon: ' . $reason->reason ;

        $userActivities = $this->logger->log($data);

        return redirect()->route('reasons.index')
            ->withSuccess('Razon actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reason = $this->reasons->findReasonByID($id);
        $reason->delete();

        $data = 'Eliminacion de Razon: ' . $reason->reason ;

        $userActivities = $this->logger->log($data);

        return redirect()->route('reasons.index')
            ->withSuccess('Razon eliminada con exito');
    }
}

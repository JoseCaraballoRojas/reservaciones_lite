<?php

namespace Vanguard\Http\Controllers;

use Illuminate\Http\Request;

use Vanguard\Http\Requests;
use Vanguard\Repositories\Reason\ReasonRepository;
use Vanguard\Http\Requests\ReasonRequest;
use Vanguard\Reason;
class ReasonsController extends Controller
{

    /**
    * @var ReasonRepository
    */
    protected $reasons;
    /**
    * ReasonController constructor.
    * @param ReasonRepository $reasons
    */
    public function __construct(ReasonRepository $reasons)
    {
      $this->reasons = $reasons;
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
        $this->reasons->create($request->all());

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
}

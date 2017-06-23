<?php

namespace Vanguard\Http\Controllers;

use Illuminate\Http\Request;

use Vanguard\Http\Requests;
use Vanguard\Role;
use Vanguard\Repositories\Cliente\ClienteRepository;

class ClientesController extends Controller
{

    protected $clientes;

    public function __construct(ClienteRepository $clientes)
    {
        $this->middleware('auth');
        $this->clientes = $clientes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roleName = 'client';
        $clientes = $this->clientes->getUsersWithRole($roleName);

        $clientes->each(function ($clientes){
          $clientes->users;
        });
        return view('clientes.index',  compact('clientes'));
    }
    
}

<?php
namespace App\Services\Security\Http\Controllers;

use View;
use App\Ip;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SecurityController extends Controller {
    
    public function __construct()
    {
        View::share('title', 'Sécurité');
    }

    public function index() {
        $ips = Ip::all();
        return view('security::index', compact('ips'));
    }

    public function store(Request $request)
    {
        Ip::create($request->all());
        return $this->index();
    }

    public function destroy($id)
    {
        Ip::find($id)->delete();
        return $this->index();
    }

}
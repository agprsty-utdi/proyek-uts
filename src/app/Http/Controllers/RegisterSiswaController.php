<?php

namespace App\Http\Controllers;

use App\Models\RegisterSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request()->get('search');
        $p = RegisterSiswa::paginate();

        $registerSiswa = DB::table('register_siswas')
            ->where('nama','LIKE','%'.$search.'%')
            ->paginate($p->perPage());

        return view('registerPangkat.index', compact('registerSiswa'))
        ->with('i', (request()->input('page', 1) - 1) * $p->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RegisterSiswa $registerSiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegisterSiswa $registerSiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegisterSiswa $registerSiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegisterSiswa $registerSiswa)
    {
        //
    }
}

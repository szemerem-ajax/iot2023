<?php

namespace App\Http\Controllers;

use App\Models\Uzem;
use Illuminate\Http\Request;

class UzemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plants = Uzem::all();
        return view('uzems.index', [
            'plants' => $plants
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Uzem $uzem)
    {
        $data = $uzem->load(['machines']);
        return view('uzems.show', [
            'plant' => $data
        ]);
    }
}

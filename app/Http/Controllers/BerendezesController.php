<?php

namespace App\Http\Controllers;

use App\Models\Berendezes;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BerendezesController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Berendezes::find($id);
        if ($data === null)
            throw new NotFoundHttpException;

        $data = $data->load(['eloMeresek', 'meresek', 'gyerekek']);
        return view('berendezesek.show', [
            'machine' => $data
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Rank;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

class RankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('rank_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['ranks'] = Rank::orderBy('updated_at','DESC')->get();

        return view('admin.ranks.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function show(Rank $rank)
    {
        abort_if(Gate::denies('rank_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data['rank'] = $rank;

        return view('admin.ranks.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function edit(Rank $rank)
    {
        $data['rank'] = $rank;

        return view('admin.ranks.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rank $rank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rank  $rank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rank $rank)
    {
        //
    }
}

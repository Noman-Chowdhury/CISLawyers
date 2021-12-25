<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Law;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CaseController extends Controller
{

    public function index()
    {
        if (\request()->ajax()) {
            if (\request()->service){
                $cases = ServiceRequest::where('service_id', \request()->service)->with('user','service')->latest();
            }else{
                $cases = ServiceRequest::latest()->with('user','service');
            }
            return DataTables::of($cases)
                ->addIndexColumn()
                ->addColumn('action', function ($case) {
                    return view('admin.pages.action', compact('case'));
                })->addColumn('date', function ($case) {
                    return $case->created_at->diffForHumans();
                })
                ->rawColumns(['action','date'])
                ->tojson();
        }
        return view('admin.case.index');
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

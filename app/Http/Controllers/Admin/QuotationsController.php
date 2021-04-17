<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Quotations;
use App\Http\Requests\CreateQuotationsRequest;
use App\Http\Requests\UpdateQuotationsRequest;
use Illuminate\Http\Request;

class QuotationsController extends Controller
{

    /**
     * Display a listing of quotations
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $quotations = Quotations::all();

        return view('admin.quotations.index', compact('quotations'));
    }

    /**
     * Show the form for creating a new quotations
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.quotations.create');
    }

    /**
     * Store a newly created quotations in storage.
     *
     * @param CreateQuotationsRequest|Request $request
     */
    public function store(CreateQuotationsRequest $request)
    {
        Quotations::create($request->all());

        return redirect()->route(config('coreadmin.route').'.quotations.index');
    }

    /**
     * Show the form for editing the specified quotations.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $quotations = Quotations::find($id);
        
        
        return view('admin.quotations.edit', compact('quotations'));
    }

    /**
     * Update the specified quotations in storage.
     * @param UpdateQuotationsRequest|Request $request
     *
     * @param  int  $id
     */
    public function update($id, UpdateQuotationsRequest $request)
    {
        $quotations = Quotations::findOrFail($id);

        

        $quotations->update($request->all());

        return redirect()->route(config('coreadmin.route').'.quotations.index');
    }

    /**
     * Remove the specified quotations from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        Quotations::destroy($id);

        return redirect()->route(config('coreadmin.route').'.quotations.index');
    }

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Quotations::destroy($toDelete);
        } else {
            Quotations::whereNotNull('id')->delete();
        }

        return redirect()->route(config('coreadmin.route').'.quotations.index');
    }
    
    public function generateQuotaion($id = null)
    {
        $quotation = Quotations::findOrFail($id);
        return view('admin.exportword', ['data'=>$quotation->toArray()]);
        dd($quotation->toArray());
    }
}

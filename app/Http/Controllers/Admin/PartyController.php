<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Party;
use App\Http\Requests\CreatePartyRequest;
use App\Http\Requests\UpdatePartyRequest;
use Illuminate\Http\Request;



class PartyController extends Controller {

	/**
	 * Display a listing of party
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $party = Party::all();

		return view('admin.party.index', compact('party'));
	}

	/**
	 * Show the form for creating a new party
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.party.create');
	}

	/**
	 * Store a newly created party in storage.
	 *
     * @param CreatePartyRequest|Request $request
	 */
	public function store(CreatePartyRequest $request)
	{
	    
		Party::create($request->all());

		return redirect()->route(config('coreadmin.route').'.party.index');
	}

	/**
	 * Show the form for editing the specified party.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$party = Party::find($id);
	    
	    
		return view('admin.party.edit', compact('party'));
	}

	/**
	 * Update the specified party in storage.
     * @param UpdatePartyRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdatePartyRequest $request)
	{
		$party = Party::findOrFail($id);

        

		$party->update($request->all());

		return redirect()->route(config('coreadmin.route').'.party.index');
	}

	/**
	 * Remove the specified party from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Party::destroy($id);

		return redirect()->route(config('coreadmin.route').'.party.index');
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
            Party::destroy($toDelete);
        } else {
            Party::whereNotNull('id')->delete();
        }

        return redirect()->route(config('coreadmin.route').'.party.index');
    }

}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryStoreRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    protected function index(Request $request)
    {
        $Countries = Country::all();

        if($request->has('search')){
            $Countries = Country::where('country_code', 'like', "%{$request->search}%")
                ->orWhere('name', 'like',"%{$request->search}%")
                ->get();
        }

        return view('countries.index', compact('Countries'));
    }

    protected function create()
    {
        return view('countries.create');
    }

    protected function store(CountryStoreRequest $request)
    {
        Country::create($request->validated());

        return redirect()->route('countries.index')->with('message', 'Country Create Successfully');
    }

    protected function edit(Country $country)
    {
        return view('countries.edit', compact('country'));
    }

    protected function update(CountryStoreRequest $request, Country $country)
    {
        $country->update($request->validated());

        return redirect()->route('countries.index')->with('message', 'Country Updated Successfully');
    }

    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('countries.index')->with('message', 'Country deleted successfully.');
    }
}

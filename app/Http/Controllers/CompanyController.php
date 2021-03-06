<?php

namespace App\Http\Controllers;

use App\Company;
use Validator;
use Redirect;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate();

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'cif' => 'required|string|max:191',
        ]);

        if (request('email')) {
            $this->validate(request(), [
                'email' => 'string|email|max:191',
            ]);

            $department->email = request('email');
        }

        if($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }

        Company::create($request->all());

        return back()->with('status', 'Company created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'cif' => 'required|string|max:191',
        ]);

        $company->name = request('name');
        $company->cif = request('cif');

        if (request('email')) {
            $this->validate(request(), [
                'email' => 'string|email|max:191',
            ]);

            $department->email = request('email');
        }

        if($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }

        $company->save();

        return back()->with('status', 'Updated company data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return back()->with('status', 'Company deleted');
    }
 }
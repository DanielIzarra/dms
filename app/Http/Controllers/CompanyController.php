<?php

namespace App\Http\Controllers;

use App\User;
use App\Company;
use Validator;
use Redirect;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $permissions = Permission::all();

        return view('companies.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Company $company, User $user)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:191',
            'cif' => 'required|string|max:191|unique:companies',
            'user_name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if (request('company_email')) {
            $this->validate(request(), [
                'company_email' => 'string|email|max:191',
            ]);

            $company->email = request('company_email');
        }

        if($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }

        $company->name = request('company_name');
        $company->cif = request('cif');

        $company->save();

        $companyId = Company::where('cif', '=', request('cif'))->pluck('id');
        $user->company_id = $companyId[0];
        
        $user->name = request('user_name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        
        $user->save();

        $user->permissions()->sync($request->get('permissions'));

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

            $company->email = request('email');
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
<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Validator;

class CompanyController extends Controller
{
    const RESULTS_IN_PAGE = 5;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companys = Company::orderBy('name')->paginate(self::RESULTS_IN_PAGE);
            // $members = Member::all()->sortBy('surname');
            return view('company.index', ['companys' => $companys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'company_name' => ['required', 'min:3', 'max:50'],
            'company_address' => ['required', 'min:5', 'max:150']
        ]
 
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }


        $company = new Company;
        $company->name = $request->company_name;
        $company->address = $request->company_address;
        $company->save();

        // return redirect()->route('company.index');
        return redirect()->route('company.index')
        ->with('success_message', 'Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit', ['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $validator = Validator::make($request->all(),
        [
            'company_name' => ['required', 'min:3', 'max:50'],
            'company_address' => ['required', 'min:5', 'max:150']
        ]
 
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $company->name = $request->company_name;
        $company->address = $request->company_address;
        $company->save();

        // return redirect()->route('company.index');
        return redirect()->route('company.index')
        ->with('success_message', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        if($company->getCustomer->count()){
            return redirect()
            ->route('company.index')->with('info_message', 'Can`t delete company, because there are customers set to it !');
        }
        
        $company->delete();
        // return redirect()->route('company.index');
        return redirect()->route('company.index')
        ->with('success_message', 'Deleted successfully.');
    }
}

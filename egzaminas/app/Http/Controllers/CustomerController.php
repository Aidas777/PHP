<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Company;
use Illuminate\Http\Request;
use Validator;

class CustomerController extends Controller
{
    const RESULTS_IN_PAGE = 9;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(Request $request)
    {
        // $customers = Customer::paginate(self::RESULTS_IN_PAGE)->withQueryString()->sortBy('surname');
        $customers = Customer::orderBy('surname')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
        $companys = Company::orderBy('name')->paginate(self::RESULTS_IN_PAGE)->withQueryString();

        if ($request->sort) {
            if ('name' == $request->sort && 'asc' == $request->sort_dir) {
                $customers = Customer::orderBy('name')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
            }
            else if ('name' == $request->sort && 'desc' == $request->sort_dir) {
                $customers = Customer::orderBy('name', 'desc')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
            }
            else if ('phone' == $request->sort && 'asc' == $request->sort_dir) {
                $customers = Customer::orderBy('phone')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
                // dd($request->sort_dir);
            }
            else if ('phone' == $request->sort && 'desc' == $request->sort_dir) {
                $customers = Customer::orderBy('phone', 'desc')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
            }
            else {
                $customers = Customer::paginate(self::RESULTS_IN_PAGE)->withQueryString();
            }
        }

        else if ($request->filter && 'company' == $request->filter) {
            $customers = Customer::where('company_id', $request->company_id)->paginate(self::RESULTS_IN_PAGE)->withQueryString();
        }
        else if ($request->search && 'all' == $request->search) {

        }
        else {
            // nieko nesortinam
            $customers = Customer::orderBy('surname')->paginate(self::RESULTS_IN_PAGE)->withQueryString();
        }
        

        return view('customer.index', [
            'customers' => $customers,
            'sortDirection' => $request->sort_dir ?? 'asc',
            'companys' => $companys,
            'company_id' => $request->company_id ?? '0',
            's' => $request->s ?? ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::paginate(self::RESULTS_IN_PAGE)->withQueryString()->sortByDesc('weight');
        $companys = Company::orderBy('name')->get();
        return view('customer.create', ['customers' => $customers, 'companys' => $companys]);
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
            'customer_name' => ['required', 'min:3','max:32'],
            'customer_surname' => ['required', 'min:3', 'max:32'],
            'customer_phone' => ['required', 'min:5', 'max:24'],

            'customer_email' => ['required', 'min:5', 'max:64'],
            'customer_comment' => ['required','min:1'],
            // 'company_id' => ['required']
        ]
 
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
 
 
        $customer = new Customer;
        $customer->name = $request->customer_name;
        $customer->surname = $request->customer_surname;
        $customer->phone = $request->customer_phone;

        $customer->email = $request->customer_email;
        $customer->comment = $request->customer_comment;
        $customer->company_id = $request->company_id;

        $customer->save();
        // return redirect()->route('customer.index');

        return redirect()->route('customer.index')
        ->with('success_message', 'Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $companys = Company::orderBy('name')->get();
        return view('customer.edit', ['customer' => $customer, 'companys' => $companys]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validator = Validator::make($request->all(),
        [
            'customer_name' => ['required', 'min:3','max:32'],
            'customer_surname' => ['required', 'min:3', 'max:32'],
            'customer_phone' => ['required', 'min:5', 'max:24'],

            'customer_email' => ['required', 'min:5', 'max:64'],
            'customer_comment' => ['required'],
            'company_id' => ['required']
        ]
 
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
 
        $customer->name = $request->customer_name;
        $customer->surname = $request->customer_surname;
        $customer->phone = $request->customer_phone;

        $customer->email = $request->customer_email;
        $customer->comment = $request->customer_comment;
        $customer->company_id = $request->company_id;

        $customer->save();
        // return redirect()->route('customer.index');

        return redirect()->route('customer.index')
        ->with('success_message', 'Added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        // return redirect()->route('customer.index');
        return redirect()->route('customer.index')
        ->with('success_message', 'Deleted successfully.');
    }
}

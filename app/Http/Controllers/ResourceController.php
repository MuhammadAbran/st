<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Pagination\LengthAwarePaginator;

class ResourceController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      // dd(Customer::all());
      $data['customers'] = Customer::join('address', 'customer.address_id', '=', 'address.address_id')
      ->orderBy('customer_id', 'desc')->paginate(10);
      // dd($data);
      return view('customer', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
      $data = [
        'first_name' => $req->input('depan'),
        'address_id' => $req->input('address'),
        'store_id' => 1,
        'last_name' => $req->input('belakang'),
        'email' => $req->input('email')
      ];
        // dd($req->address);
        Customer::create($data);

        return redirect('/cus')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $data = Customer::where('customer_id', $id)->first();

        return view('editCustomer', compact('data', 'id'));
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
      // dd($request);
      $data = [
          'first_name' => $request->input('depan'),
          'last_name' => $request->input('belakang'),
          'address_id' => $request->input('address'),
          'email' => $request->input('email'),
      ];

      Customer::where('customer_id', $id)->update($data);

      return redirect('/cus')->with(['info' => 'Data Berhasil Di Update!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::destroy($id);

        return redirect('/cus')->with(['error' => 'Data Berhasil Di Hapus!']);
    }
}

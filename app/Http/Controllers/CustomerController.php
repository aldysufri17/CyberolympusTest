<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('nama', 'ASC')->paginate(10);
        return view('customers.index', compact('customers'));
    }

    public function store(Request $request)
    {
        Customer::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
        ]);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $cs = Customer::find($id);
        return response()->json($cs);
    }

    public function update(Request $request)
    {
        $id = $request->id;

        Customer::whereId($id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
        ]);

        return response()->json([
            'status' => 200,
        ]);
    }

    public function delete(Request $request)
    {
        $id = $request->id;

        Customer::whereId($id)->delete();

        return response()->json([
            'status' => 200,
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->nama;
        $customers = Customer::where('nama', 'like', "%" . $search . "%")
            ->paginate(10);
        return view('customers.index', compact('customers'));
    }

    public function filter()
    {
        $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
        $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
        $customers = Customer::whereBetween('created_at', [$start_date, $end_date])->paginate();
        return view('customers.index', compact('customers'));
    }
}

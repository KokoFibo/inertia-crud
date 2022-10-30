<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Customer;
use Illuminate\Support\Facades\Request;

class IndexController extends Controller
{
    public function index()
    {
        $customer = Customer::all();
        // return Inertia::render('Customer/Index', [
        //     'customer' => Customer::paginate(5)
        // ]);

        return Inertia::render('Customer/Index', [
            'customer' => Customer::query()
            ->when(Request::input('search'), function($query, $search) {
                $query->where('nama', 'like', '%' . $search . '%' );
            })
            ->paginate(5)
            ->withQueryString()
            ->through(fn($customer) => [
                'id' =>$customer->id,
                'nama' =>$customer->nama,
                'email' =>$customer->email,
            ]),
            'filters' => Request::only(['search'])
        ]);
    }
}

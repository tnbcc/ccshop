<?php

namespace App\Http\Controllers;

use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Http\Requests\UserAddressRequest;

class UserAddressesController extends Controller
{
    public function index(Request $request)
    {
        return view('user_addresses.index',[
             'addresses' => $request->user()->addresses,
        ]);
    }

    public function create(UserAddress $address)
    {
        return view('user_addresses.create_and_edit',compact('address'));
    }

    public function store(UserAddressRequest $request)
    {
        $request->user()->addresses()->create($request->only([
            'province',
            'city',
            'district',
            'address',
            'zip',
            'contact_name',
            'contact_phone',
        ]));

        return redirect()->route('user_addresses.index');
    }
    public function edit(UserAddress $address)
    {
        $this->authorize('own', $address);
        return view('user_addresses.create_and_edit',compact('address'));
    }

    public function update(UserAddress $address, UserAddressRequest $request)
    {
        $this->authorize('own', $address);
        $address->update($request->only([
            'province',
            'city',
            'district',
            'address',
            'zip',
            'contact_name',
            'contact_phone',
        ]));

        return redirect()->route('user_addresses.index');
    }

    public function destory(UserAddress $address)
    {
        $this->authorize('own', $address);
        $address->delete();
       // 把之前的 redirect 改成返回空数组
        return [];
    }
}

<?php

namespace App\Livewire\App\Shop\Cart;

use App\Models\City;
use App\Models\Province;
use App\Models\UserAddress;
use Livewire\Component;

class Checkout extends Component
{

    public $title;
    public UserAddress $userAddress;
    public $country_id;
    public $province_id;
    public $city_id;
    public $address;
    public $zipcode;

    public function add()
    {

    }

    public function remove(UserAddress $userAddress)
    {

    }

    public function updatingCityId($value)
    {
        dd($value);
    }

    public function render()
    {
        $provinces = Province::where('country_id', config('bap.default-country'))->get();
        $cities = City::where('province_id', $provinces->first()->id)->get();
        $userAddresses = UserAddress::where('user_id', auth()->user()->id)->get();
        return view('livewire.app.shop.cart.checkout', compact('userAddresses', 'provinces', 'cities'));
    }
}

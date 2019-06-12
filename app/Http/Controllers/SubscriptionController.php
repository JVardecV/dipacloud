<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::all();
        return view('index', compact('plans'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $token = $request->get('stripeToken');
        $subscription = $request->get('plan_type');

        Auth()->user()->newSubscription('main',$subscription)->create($token);

        Auth()->user()->assignRole('Suscriptor');

        return back()->with('info',['success','Ahora estás suscrito.']);
    }

    
}

<?php

namespace App\Http\Controllers;

use App\Plan;
use Auth;
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

    public function subscriptions()
    {
        $subscriptions = Auth::user()->subscriptions;
        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function resume()
    {
        
        $subscription = \request()->user()->subscription(\request('plan_name'));

        if($subscription->cancelled() && $subscription->onGracePeriod()){
            \request()->user()->subscription(\request('plan_name'))->resume();
            return back()->with('info',['success','La suscripción continuará.']);
        }

        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cancel()
    {
        Auth::user()->subscription(\request('plan_name'))->cancel();
        return back()->with('info',['success','La suscripción se ha cancelado.']);    
    }


    //Facturas
    public function facturas()
    {
        $facturas = Auth::user()->invoices();
        return view('admin.subscriptions.facturas', compact('facturas'));
    }


    public function showfactura(Request $request, $invoiceId)
    {
        return $request->user()->downloadInvoice($invoiceId, [
            'vendor'  => 'DipaCloud',
            'product' => 'Suscripción en la plataforma'
        ]);
    }









}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PartnerRequest;

class PartnerController extends Controller
{
    public function create()
    {
        return view('partnerForm');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'organisation' => 'required|string|max:255',
            'type'         => 'required|string|in:Entreprise,ONG,Institution,Autre',
            'type_autre'   => 'nullable|string|max:255|required_if:type,Autre',
            'contact'      => 'required|string|max:255',
            'fonction'     => 'nullable|string|max:255',
            'email'        => 'required|email|max:255',
            'phone'        => 'required|string|max:50',
            'country'      => 'nullable|string|max:100',
            'message'      => 'nullable|string',
            'accept'       => 'required|accepted',
        ]);

        // Envoyer un email
        Mail::to('globaluniversalwelfare@gmail.com')->send(new PartnerRequest($validated));

        return redirect()->route('partnerForm')->with('success', 'Votre demande a bien été envoyée. Nous vous répondrons rapidement.');
    }
}
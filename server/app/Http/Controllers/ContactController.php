<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Front'ta belirtilen key'leri kendi değişkenlerimize atıyoruz. 
        $nameSurname  = $request->input('nameSurname');
        $email        = $request->input('email');
        $subject      = $request->input('subject');
        $message      = $request->input('message');

        //Validation işlemleri.
        if (empty($nameSurname)) {
            return response()->json(['error' => 'Ad-soyad zorunludur!'], 400);
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return response()->json(['error' => 'Geçerli bir e-posta adresi giriniz!'], 400);
        }elseif (empty($subject)) {
            return response()->json(['error' => 'Konu zorunludur!'], 400);
        }elseif (empty($message)) {
            return response()->json(['error' => 'Bu alan boş bırakılamaz!'], 400);
        } else {
            //Veri tabanına kaydetme işlemleri.
            $newMessage = new Contact;
            $newMessage -> nameSurname = $nameSurname;
            $newMessage -> email       = $email;
            $newMessage -> subject     = $subject;
            $newMessage -> message     = $message;
            $newMessage -> save();

            //Geri dönüş mesajı.
            return response()->json(['success' => 'Mesaj başarı ile gönderildi!', 'newMessage' => $newMessage], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}

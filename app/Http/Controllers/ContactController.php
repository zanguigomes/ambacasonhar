<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactStoreRequest;
use App\Mail\Contact;
use App\Models\MailBox;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('site-pages.contact');
    }

    public function store(ContactStoreRequest $request) : RedirectResponse
    {
        $request->except(['_token']);

        $mailBox = new MailBox();

        $mailBox->name    = strip_tags($request->input('name'));
        $mailBox->email         = strip_tags($request->input('email'));
        $mailBox->phone         = strip_tags($request->input('phone'));
        $mailBox->subject       = strip_tags($request->input('subject'));
        $mailBox->message       = strip_tags($request->input('message'));


        Mail::to('zanguigomes.dev@gmail.com','Zangui Gomes')
            ->send(new Contact([
                'fromName'      => $mailBox->name,
                'fromEmail'     => $mailBox->email,
                'phone'         => $mailBox->phone,
                'subject'       => $mailBox->subject,
                'message'       => $mailBox->message,
        ]));

        try {
            if($mailBox->save()){
                return back()->with("success", "Olá, " . $request->name . ". Obrigado por nos contactar. Retornarmos o mais breve possível");
            }


        } catch (\Exception $error) {
            return back()->with("error", "Ocorreu um erro inesperado: " . $error->getMessage() );
        }

    }
}

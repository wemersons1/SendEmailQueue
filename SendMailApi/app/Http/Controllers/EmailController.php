<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use App\Services\SendMailList;

class EmailController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string',
            'sender' => 'required|string',
            'recipient_list' => 'required|string',
            'body' => 'required|string',
        ]);

        $sendMailList = new SendMailList($request);

        $sendMailList->execute();
                
        return response()->json([
            "message" => "Operação realizada"
        ]);
    }

    public function index() {
        $emails = new Email();

        return response()->json($emails->paginate());
    }

    public function show($id) {
        $email = Email::find($id);

        if(!$email) {
            return response()->json([
                "message" => "E-mail não encontrado"
            ], 400);
        }

        return response()->json($email);
    }
}

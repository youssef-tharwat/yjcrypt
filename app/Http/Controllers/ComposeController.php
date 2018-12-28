<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Encryption\Encrypter;
use Illuminate\Notifications\Notification;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ComposeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

        $cipher = 'AES-128-CBC';

        $key = Encrypter::generateKey($cipher);

        return view('dashboard.compose')->with('key', $key);
    }



    public function store(Request $request){

        $messages = [
            'exists' => 'The email entered does not exist.',
        ];

        Validator::make($request->all(), [
            'to' => '|required|exists:messages|max:255',
        ], $messages)->validate();

        $key = hex2bin($request->key);

        // Message Encryption

        $encrypter = new Encrypter($key); // Setting Custom Key

        $encrpyted_message = $encrypter->encrypt($request->message); // Message Encryption

        // File Encryption

        $file =  $request->file('attachment');

        $fileContent = $file->get();

        $encryptedContent = $encrypter->encrypt($fileContent);

        $fileName = (pathinfo($request->file('attachment')->getClientOriginalName(), PATHINFO_FILENAME));

        $fileExtension = $request->file('attachment')->getClientOriginalExtension();

        Storage::put($fileName.'.dat', $encryptedContent);

        // File Encryption End

        $user = User::whereemail($request->to)->firstorFail(); // Getting User to send to //Todo Validate the request because when the user is not found it displays an error

        Message::create([
            'to' => $user->email,
            'subject'=> $request->subject,
            'from' => Auth::user()->email,
            'message'=> $encrpyted_message,
            'key'=> $key,
            'attempts'=> 0,
            'decrypted' =>0,
            'attachment' => $fileName,
            'extension' => $fileExtension,
        ]);

        return back();

    }

}

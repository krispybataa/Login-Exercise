<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home(){
        $contacts = Contact::all();
        return view('user.home', compact('contacts'));
    }

    public function index(){
        $user = Auth::user();
        $contacts = Contact::where('adder_id', $user->id)->get();
        return view('user.home', compact('contacts'));

    }

    public function addContact(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_no' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->contact_no = $request->contact_no;
        $contact->email = $request->email;
        $contact->adder_id = Auth::user()->id;
        $contact->save();

        return redirect()->route('user.home')->with('success', 'Contact added successfully');
    }

    public function removeContact($id){
        $contact = Contact::find($id);

        if ($contact && $contact->adder_id == Auth::id()){
            $contact->delete();
            return redirect()->route('user.home')->with('success', 'Contact removed successfully');
        }

        return redirect()->route('user.home')->with('error', 'You are not authorized to remove this contact');
    }

    public function contacts(){
        $user = Auth::user();
        $contacts = Contact::where('adder_id', $user->id)->get();
        return view('user.contacts', compact('contacts'));
    }
}

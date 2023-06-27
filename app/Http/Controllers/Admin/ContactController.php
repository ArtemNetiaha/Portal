<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Exports\ContactExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends Controller
{
    public function index(){
        $contacts=Contact::latest()->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    public function destroy(Contact $contact){
        $contact->delete();
        
        return to_route('admin.contacts.index');
    }
    public function export ()
    {
        $contact=Contact::select('email')->get();
    return Excel:: download (new ContactExport($contact),'contacts.xlsx');
    }
}

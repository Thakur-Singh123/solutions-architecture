<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactForm;

class ContactFormController extends Controller
{
    //Function for all contacts
    public function all_contacts() {
        //Get all contacts detail
        $all_contacts = ContactForm::OrderBy('ID', 'DESC')->get();
        return view('admin.contacts.all-contacts-list', compact('all_contacts'));
    }

    //Function for delete contact
    public function delete_contact(Request $request) {
        //Get ajax request
        $contact_id = $request->contact_id;
       //Delete contact
       $is_delete_contact = ContactForm::where('id', $contact_id)->delete();
       //Check if Contact is deleted or not
        if ($is_delete_contact){
            echo '<p style="color:green;">Contact deleted successfully.</p>';
            echo '<script>setTimeout(function(){ window.location.href = ""; }, 3000);</script>';
        } else {
            echo '<p style="color:green;">Oops something wrong.</p>';
        }
    }
}

<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;

class ContactController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tablename='contacts';
    }
    // return all the records or users from database
    public function index()
    {
        $total_Contacts = $this->database->getReference($this->tablename)->getSnapshot()->numChildren();
        $getContacts = $this->database->getReference($this->tablename)->getValue();
        return view('firebase.contact.index',compact('getContacts','total_Contacts'));
    }
    // return the page create
    public function create()
    {
        return view('firebase.contact.create');
    }
    //post the data to the database ,Add new record to database
    public function store(Request $request)
    {

        $postData=[
            'fname'=>$request->first_name,
            'lname'=>$request->last_name,
            'phone'=>$request->phone,
            'email'=>$request->email
        ];
        $postRef = $this->database->getReference($this->tablename)->push($postData);
        if($postRef)
        {
            return redirect('contacts')->with('status','contact added succesfully');
        }
        else
        {
            return redirect('contacts')->with('status','contact not Added');
        }

    }
    //get the data of a specefic data
    public function update_fields($id)
    {
        $getContactById = $this->database->getReference($this->tablename)->getChild($id)->getValue();

        if($getContactById)
        {
            return view("firebase.contact.update_page",compact('getContactById','id'));
        }
        else
        {
            return redirect('contacts')->with('status','The user with that id is not exist');

        }
    }
    //update the data fields
    public function update(Request $request,$id)
    {
        $updateData=[
            'fname'=>$request->first_name,
            'lname'=>$request->last_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
        ];
        $responseUpdate=$this->database->getReference($this->tablename.'/'.$id)->update($updateData);
        if($responseUpdate)
        {
            return redirect('contacts')->with('status','the data updates Successfully');
        }
        else
        {
            return redirect('contacts')->with('status','Can not update the data');
        }
    }
    //delete a record from database
    public function delete($id)
    {
        $responseDelete =$this->database->getReference($this->tablename.'/'.$id)->remove();
        if($responseDelete)
        {
            return redirect('contacts')->with('status','the data deleted Successfully');
        }
        else
        {
            return redirect('contacts')->with('status','Can not delete the data');
        }
    }

}

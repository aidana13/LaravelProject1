<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller{
    public function __invoke()
    {
        return "Okay";
    }
    public function submit(ContactRequest $req)
    {
        //dd($req->input('subject'));
        // $val = $req->validate([
        //     'subject' => 'required|min:5|max:50',
        //     'message' => 'required|min:15|max:5000'
        // ]);

        $contact = new Contact();
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('contact-data')->with('success', 'Сообщение было добавлено!');
    }
    public function allData(){
        $contact = new Contact;
        //return view('messages', ['data'=> $contact->where('subject', '=', 'Berik')->get()]); //запись по объекту 
        //return view('messages', ['data'=> $contact->orderBy('id', 'desc')->skip(1)->take(2)->get()]);  //сортировка по убыванию, пропускаем 1 запись, и колво записей
        //return view('messages', ['data'=> $contact->inRandomOrder()->get()]); //все записи в рандомном порядке
        //return view('messages', ['data'=> [$contact->inRandomOrder()->first()]]); //в рандомном порядке
        //return view('messages', ['data'=> [$contact->find(2)]]);  //выводит запись по номеру id
        return view('messages', ['data'=> $contact->all()]);   // все записи из бд

        //$contact = Contact::all();
        //dd($contact);
    }
    public function showOneMessage($id){
        $contact = new Contact;
        return view('one-message', ['data' => $contact->find($id)]);
    }
    public function updateMessage($id){
        $contact = new Contact;
        return view('update-message', ['data' => $contact->find($id)]);
    }
    public function updateMessageSubmit($id, ContactRequest $req)
    {
        $contact = Contact::find($id);
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();

        return redirect()->route('contact-data-one', $id)->with('success', 'Сообщение было обновлено!');
    }
    public function deleteMessage($id){
        Contact::find($id)->delete();
        return redirect()->route('contact-data')->with('success', 'Сообщение было удалено!');
    }
}

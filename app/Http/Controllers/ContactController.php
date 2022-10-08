<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use PDF;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::id());
        $contacts = Contact::where('user_id', Auth::id())->orderBy('name', 'asc')->get();
        $favouritecontacts = Contact::where('user_id', Auth::id())->where('favourite', 1)->orderBy('name', 'asc')->get();
        return view('contact.index', compact('contacts'))->with(compact('favouritecontacts'))->with('user', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create')->with('user', Auth::user());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        //upload
        $path = $request->file('photo')->store('public/contacts');
        $storagepath = Storage::path($path);
        $img = Image::make($storagepath);

        // resize image instance
        $img->resize(320, 320);

        // insert a watermark
        // $img->insert('public/watermark.png');

        // save image in desired format
        $img->save($storagepath);
        $u = User::find(Auth::id());
        // dd($u->id);
        $data = [
            'name' => $request->name,
            'user_id' => $u->id,
            'phone' => $request->phone,
            'email' => $request->email,
            'photo' => $path
        ];
        // dd($data);
        Contact::create($data);
        // return redirect()->route('contact.index');

        // $contact = Contact::create($request->validated());
        return redirect()->route('contact.index')->with('success', 'Contact created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contact.show', compact('contact'))->with('user', Auth::user());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contact.edit', compact('contact'))->with('user', Auth::user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //upload
        $path = $request->file('photo')->store('public/contacts');
        $storagepath = Storage::path($path);
        $img = Image::make($storagepath);

        // resize image instance
        $img->resize(320, 320);

        // insert a watermark
        // $img->insert('public/watermark.png');

        // save image in desired format
        $img->save($storagepath);

        if ($contact->photo) {
            Storage::delete($contact->photo);
        }

        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->photo = $path;
        $contact->save();

        return redirect()->route('contact.index')->with('success', 'Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contact.index')->with('success', 'Contact deleted successfully.');
    }

    public function trashed()
    {
        $contacts = Contact::onlyTrashed()->get();
        return view('contact.trashed', compact('contacts'))->with('user', Auth::user());
    }

    public function trashedRestore($id)
    {
        $contact = Contact::onlyTrashed()->findOrFail($id);
        $contact->restore();
        return redirect()->route('contact.index')->with('success', 'Contact restored successfully.');
    }

    public function trashedDelete($id)
    {
        $contact = Contact::onlyTrashed()->findOrFail($id);
        $contact->forceDelete();
        if ($contact->photo) {
            Storage::delete($contact->photo);
        }
        return redirect()->route('contact.index')->with('success', 'Contact deleted permanently.');
    }
    public function export_contact_pdf()
    {
        $contacts = Contact::all();
        $pdf = PDF::loadView('contact.pdf', compact('contacts'));
        return $pdf->download('Contactlist.pdf');
    }

    public function favorite(Request $request){
        $contact = Contact::find($request->id);
        $contact->favourite = $request->favourite;
        if($contact->save()){
            return response()->json(['done'=> 1,'message'=>'Favorite updated successfully']);
        }else{
            return response()->json(['done'=> 0,'message'=>'Favorite not updated']);
        }
    }
    // search
    public function search(Request $request)
    {
        $searchdata = $request->term;
        $con = Contact::select('id','name')->where('name','LIKE',"%{$searchdata}%")->get();
        $items = [];
        foreach ($con as $c) {
            $items[] = [
                'label' => $c->name,
                'value' => $c->name,
                'id' => $c->id
            ];
        }
        return response()->json($items);

    }
}

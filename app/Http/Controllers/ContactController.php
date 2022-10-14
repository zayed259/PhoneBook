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

    public function index(Request $request)
    {
        $contacts_query = Contact::where('user_id', Auth::user()->id)->orderBy('name', 'asc');
        if ($request->has('filter') && $request->get('filter') != '') {
            $contacts_query->where("name", "like", $request->get("filter") . "%");
        }
        if ($request->has('search') && $request->get('search') != '') {
            $contacts_query->where("name", "like", "%" . $request->get("search") . "%")
                ->orWhere("email", "like", "%" . $request->get("search") . "%")
                ->orWhere("phone", "like", "%" . $request->get("search") . "%");
        }
        $contacts = $contacts_query->latest()->get();

        if ($request->ajax()) {
            $view = view('contact.list', ['contacts' => $contacts]);
            $html = $view->render();
            return response()->json(array('error' => false, 'message' => 'success', 'data' => $html));
        }
        $favouritecontacts = Contact::where('user_id', Auth::id())->where('isfavourite', '1')->orderBy('name', 'asc')->get();
        return view('contact.index', ['title' => 'Contact List', 'contacts' => $contacts])->with(compact('favouritecontacts'))->with('user', Auth::user());
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
        $data = [
            'name' => $request->name,
            'user_id' => $u->id,
            'phone' => $request->phone,
            'email' => $request->email,
            'photo' => $path
        ];
        Contact::create($data);
        return redirect()->route('contact.index')->with('message', 'Contact created successfully.');
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

        return redirect()->route('contact.index')->with('message', 'Contact updated successfully.');
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
        return redirect()->route('contact.index')->with('message', 'Contact deleted successfully.');
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
        return redirect()->route('contact.index')->with('message', 'Contact restored successfully.');
    }

    public function trashedDelete($id)
    {
        $contact = Contact::onlyTrashed()->findOrFail($id);
        $contact->forceDelete();
        if ($contact->photo) {
            Storage::delete($contact->photo);
        }
        return redirect()->route('contact.index')->with('message', 'Contact deleted permanently.');
    }
    public function export_contact_pdf()
    {
        $contacts = Contact::orderBy('name', 'asc')->get();
        $pdf = PDF::loadView('contact.pdf', compact('contacts'));
        return $pdf->download('Contactlist.pdf');
    }

    public function favorite($id)
    {
        $contact = Contact::find($id);
        if (Auth::user()->id == $contact->user_id) {
            if ($contact->isfavourite == 1) {
                $contact->isfavourite = '0';
                $contact->save();
                return back()->with('message', 'Contact removed from favourite list');
            }
            if ($contact->isfavourite == 0) {
                $contact->isfavourite = '1';
                $contact->save();
                return back()->with('message', 'Contact added to favourite list');
            }
        } else {
            return back()->with('warning', 'You are not authorized to hide/show this blog!!!');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Display a list of contacts with optional search
    public function index(Request $request)
    {
        $query = Contact::query();
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
        }
        $contacts = $query->orderBy('id', 'desc')->get();

        return view('contacts.index', compact('contacts'));
    }

    // Show the form for creating a new contact
    public function create()
    {
        return view('contacts.create');
    }

    // Store a newly created contact in storage
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'phone' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')
                         ->with('success', 'Contact created successfully.');
    }

    // Show the form for editing the specified contact
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    // Update the specified contact in storage
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name'  => 'required',
            'phone' => 'required',
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')
                         ->with('success', 'Contact updated successfully.');
    }

    // Remove the specified contact from storage
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')
                         ->with('success', 'Contact deleted successfully.');
    }

    // Handle bulk import of contacts via XML file upload
    public function import(Request $request)
    {
        $request->validate([
            'xml_file' => 'required|file|mimes:xml,txt',
        ]);

        $file = $request->file('xml_file');
        $content = file_get_contents($file->getRealPath());

        // Since the file contains plain text lines in the format:
        // Name+CountryCode PhoneNumber
        // We use strpos to find the first occurrence of '+'.
        $lines = preg_split('/\r\n|\r|\n/', $content);
        $imported = 0;

        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line)) {
                continue;
            }

            // Find the position of the first '+' character.
            $pos = strpos($line, '+');
            if ($pos === false) {
                // If no plus sign is found, skip this line.
                continue;
            }

            // The name is the substring before the '+'.
            $name = trim(substr($line, 0, $pos));

            // The phone number is the substring from the '+' (including the plus sign) onward.
            $phone = trim(substr($line, $pos));

            // Create the contact (email and address will be null)
            Contact::create([
                'name'    => $name,
                'phone'   => $phone,
                'email'   => null,
                'address' => null,
            ]);

            $imported++;
        }

        return redirect()->route('contacts.index')
                        ->with('success', "Imported {$imported} contacts successfully.");
    }
}

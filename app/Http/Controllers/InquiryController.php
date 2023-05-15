<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use App\Events\InquiryRegistered;

class InquiryController extends Controller
{
    public function index()
    {
        return view('contact-us');
    }

    /**
     * Register an inquiry.
     */
    public function store(Request $request)
    {
        $input = $request->validate(
            [
                'firstname' => 'required|string|min:4|max:24',
                'lastname' => 'required|string|min:4|max:24',
                'email' => 'required|string|email|max:255',
                'phone' => [
                    'required',
                    'string',
                    'regex:/((?:\+|00)[17](?: |\-)?|(?:\+|00)[1-9]\d{0,2}(?: |\-)?|(?:\+|00)1\-\d{3}(?: |\-)?)?(0\d|\([0-9]{3}\)|[1-9]{0,3})(?:((?: |\-)[0-9]{2}){4}|((?:[0-9]{2}){4})|((?: |\-)[0-9]{3}(?: |\-)[0-9]{4})|([0-9]{7}))/'
                ],
                'message' => 'required|string'
            ]
        );

        extract($input);
        $name = $firstname . " " . $lastname;

        try {
            $inquiry = new Inquiry([
                'author_name' => $name,
                'author_email' => $email,
                'author_phone' => $phone,
                'message' => $message
            ]);
            $inquiry->saveOrFail();
        } catch (\Throwable $th) {
            return redirect()->route('contact-us')->with('error', 'We could not save your inquiry. Please try again later.');
        }

        InquiryRegistered::dispatch($inquiry);

        return redirect()->route('contact-us')->with('success', 'Your inquiry was saved successfully.');
    }
}

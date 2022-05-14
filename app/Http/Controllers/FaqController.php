<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $faqs = Faq::orderBy('pertanyaan')->get();
        return view('backend.faq.index', compact('faqs'));
    }
}

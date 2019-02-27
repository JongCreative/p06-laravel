<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function users() {
        $title = 'This is the users page!!';
        //return view('pages.users', compact('title')); 
        return view('pages.users')->with('aapje', $title);

    }public function index() {
        $title = 'This is the index page!!';
        //return view('pages.index', compact('title')); 
        return view('pages.index')->with('aapje', $title);

    }
    public function about() {
        $title = 'This is the about page!!';
        return view('pages.about')->with('aapje', $title);
    }
    public function services() {
        $data = array(
            'aapje' => 'Services',
            'languages' => ['HTML', 'CSS', 'JavaScript', 'PHP', 'Laravel', 'Scrum']
        );
        return view('pages.services')->with($data);
    }
}

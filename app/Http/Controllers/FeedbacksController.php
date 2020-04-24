<?php

namespace App\Http\Controllers;

use App\Feedbacks;
use Illuminate\Http\Request;

class FeedbacksController extends Controller
{
    public function index()
    {
        $title = 'Контакты';
        return view('contacts', compact('title'));
    }

    public function show()
    {
        $feeds = Feedbacks::latest()->get();
        $title = 'Обратная связь';
        return view('admin.feedbacks', compact('title', 'feeds'));
    }

    public function store()
    {
        $this->validate(request(), [
            'email' => 'required',
            'body' => 'required',
        ]);

        Feedbacks::create(request()->all());

        return redirect('/admin/feedbacks');
    }
}

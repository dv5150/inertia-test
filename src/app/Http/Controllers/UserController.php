<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function create(): Response
    {
        $this->authorize('create', auth()->user());

        return Inertia::render('Users/Create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $this->authorize('create', auth()->user());

        User::create($request->only(['name', 'email', 'password']));

        return Redirect::route('users.create')
            ->with('success', 'User created successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Model\User;
use Validator;
use Redirect;
use App\Http\Requests;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = User::paginate(15);

        return view('user.index', compact('user'));
    }

}

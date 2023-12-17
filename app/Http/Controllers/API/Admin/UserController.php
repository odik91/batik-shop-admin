<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function getUser(Request $request)
	{
		return response()->json($request->user(), 200);
	}
}

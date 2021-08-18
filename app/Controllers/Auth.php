<?php

namespace App\Controllers;

class Auth extends BaseController
{
	public function index()
	{
		return view('./operator/home');
	}
	public function login()
	{
		return view('./auth/login');
	}
}

<?php

namespace App\Infrastructure\Repositories\JWTRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

interface IJWTRepository
{
    public function refreshToken():string;
    public function generateToken(Request $request, Validator $validator):string;
    public function verifyToken(string $token):bool;
    public function getDataFromToken(Request $request);
}

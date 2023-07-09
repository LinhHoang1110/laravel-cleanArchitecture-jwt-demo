<?php

namespace App\UseCase\Product;

use App\Infrastructure\Repositories\JWTRepository\IJWTRepository;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\JWTAuth;

class JWTService implements IJWTRepository
{

    protected IProductRepository $jwtRepo;

    public function __construct(IProductRepository $jwtRepo)
    {
        $this->jwtRepo = $jwtRepo;
    }

    public function refreshToken(): string
    {
        return auth()->refresh();
    }

    public function generateToken(Request $request, Validator $validator): string
    {
        return auth()->attempt($validator->validated());
    }

    public function verifyToken(string $token): bool
    {
        return auth()->check();
    }

    public function getDataFromToken(Request $request): string
    {

    }
}


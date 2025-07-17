<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\MahasiswaDinus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'nim' => 'required|string',
            'password' => 'required|string',
        ]);

        $student = MahasiswaDinus::find($request->nim);

        if (!$student || !Hash::check($request->password, $student->pass_mhs)) {
            throw ValidationException::withMessages([
                'nim' => ['NIM atau password salah.'],
            ]);
        }

        $student->tokens()->delete();

        return response()->json([
            'message' => 'Login berhasil',
            'token' => $student->createToken('api-token-'.$student->nim_dinus)->plainTextToken,
        ]);
    }
}

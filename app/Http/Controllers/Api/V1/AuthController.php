<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\MahasiswaDinus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/**
 * @group Autentikasi
 * Endpoint untuk proses login dan manajemen token mahasiswa.
 */
class AuthController extends Controller
{
    /**
     * Login Mahasiswa
     * * Endpoint ini digunakan oleh mahasiswa untuk login ke dalam sistem dengan menggunakan NIM dan password.
     * Jika berhasil, API akan mengembalikan sebuah Bearer Token baru yang harus digunakan
     * untuk otentikasi pada semua endpoint yang memerlukan login.
     *
     * @bodyParam nim string required NIM mahasiswa. Example: "A11.2022.00001"
     * @bodyParam password string required Password mahasiswa. Example: "123456"
     *
     * @response 200 {
     * "message": "Login berhasil",
     * "token": "1|aBcDeFgHiJkLmNoPqRsTuVwXyZ1234567890"
     * }
     *
     * @response status=422 {
     * "message": "NIM atau password salah. (and 1 more error)",
     * "errors": {
     * "nim": [
     * "NIM atau password salah."
     * ]
     * }
     * }
     */
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
            'token' => $student->createToken('api-token-' . $student->nim_dinus)->plainTextToken,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class AuthController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'signup', 'forgotPassword', 'resetPassword']]);
    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = auth()->attempt($credentials)) {
            $response = [
                'code' => 401,
                'error' => 'Unauthorized',
            ];
            return response()->json($response, 401);
        }

        $user = User::where('email', $request->get('email'))->first();

        $token = $this->respondWithToken(JWTAuth::fromUser($user));
        $response = [
            'code' => 200,
            'data' => [
                'user' => $user,
                'token' => $token,
            ],
            'message' => 'user login successfully'
        ];
        return response()->json($response, 200);
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            $response = [
                'code' => 400,
                'error' => $validator->errors(),
            ];
            return response()->json($response, 400);
        }
        $user = User::create([
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'password' => Hash::make($request->get('password')),
        ]);

        $credentials = $request->only('email', 'password');

        if ($token = $this->guard()->attempt($credentials)) {

            $token = $this->respondWithToken(JWTAuth::fromUser($user));
            $response = [
                'code' => 200,
                'data' => [
                    'user' => $user,
                    'token' => $token,
                ],
                'message' => 'user register successfully'
            ];
            return response()->json($response, 200);
        }
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUser()
    {
        $response = [
            'code' => 200,
            'data' => [
                'user' => $this->guard()->user()
            ],
            'message' => 'User details fetch successfully'
        ];
        return response()->json($response);
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        try {
            $this->guard()->logout();
            $response = [
                'code' => 200,
                'message' => 'Successfully logged out'
            ];
        } catch (\Exception $exc) {
            $response = [
                'code' => $exc->getCode(),
                'message' => $exc->getMessage()
            ];
        }
        return response()->json($response);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                    'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }

    public function uploadImage(Request $request)
    {
        $user = $this->guard()->user();
        if ($file = $request->hasFile('image')) {

            $file = $request->file('image');

            $fileName = 'file-' . date('Y-m-d') . '-' . date('H-i-s') . '.' . $file->getClientOriginalExtension();

            $destinationPath = public_path() . '/uploads/';

            $file->move($destinationPath, $fileName);

            $fileUrl = url('uploads/' . $fileName);

            $user->update([
                'image' => $fileUrl,
            ]);
        }
        $response = [
            'code' => 200,
            'data' => [
                'user' => $user,
            ],
            'message' => 'Image uploaded successfully'
        ];
        return response()->json($response, 200);
    }

    public function updateProfile(Request $request)
    {
        $data = $request->only('address', 'mobile', 'name');
        $validator = Validator::make($request->all(), [
                    'mobile' => 'digits:10'
        ]);

        if ($validator->fails()) {
            $response = [
                'code' => 400,
                'error' => $validator->errors(),
            ];
            return response()->json($response, 400);
        }
        $user = $this->guard()->user();
        $user->update($data);
        $response = [
            'code' => 200,
            'data' => [
                'user' => $user,
            ],
            'message' => 'Profile updated successfully'
        ];
        return response()->json($response, 200);
    }

    public function forgotPassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $encryptedValue =  Crypt::encryptString($request->email);
        $message = 'User not found';
        if ($user) {
            $token = str_random(60);
            $email = Crypt::encryptString($request->email);
            DB::table('password_resets')->insert([
                'email' => $user->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            $data = array('name' => $user->name, 'url' => env('FRONT_END_BASE_URL') . '/home?token=' . $token . '&email=' . $email . '&forgot=true');
            Mail::to($user->email)->send(new \App\Mail\Mailer($data));
            $message = 'Email send successfully';
        }
        $response = [
            'code' => 200,
            'message' => $message
        ];
        return response()->json($response, 200);
    }

    public function resetPassword(Request $request)
    {
        $data = $request->all();
        $data['email'] = Crypt::decryptString($data['email']);
        $validator = Validator::make($data, [
                    'email' => 'required|email|exists:users,email',
                    'password' => 'required|confirmed|min:6',
                    'token' => 'required']);

        //check if payload is valid before moving on
        if ($validator->fails()) {
            $response = [
                'code' => 400,
                'error' => $validator->errors(),
            ];
            return response()->json($response, 400);
        }

        $email = Crypt::decryptString($request->email);
        $tokenData = DB::table('password_resets')
                        ->where('token', $request->token)
                        ->where('email', $email)->first();
        if (!$tokenData) {
            $response = [
                'code' => 400,
                'error' => 'Invalid token',
            ];
            return response()->json($response, 400);
        }
        $user = User::where('email', $tokenData->email)->first();

        if (!$user) {
            $response = [
                'code' => 400,
                'error' => 'User Not found',
            ];
            return response()->json($response, 400);
        };

        $user->password = Hash::make($request->password);

        $user->update();

        //Delete the token
        DB::table('password_resets')->where('email', $user->email)
                ->delete();
        $response = [
            'code' => 200,
            'message' => 'Password updated successfully',
        ];
        return response()->json($response, 200);
    }

}

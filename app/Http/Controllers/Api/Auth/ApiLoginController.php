<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\LoginRequest;

class ApiLoginController extends Controller
{
    /**
     * @OA\Post(
     * path="/api/login",
     * summary="Login",
     * description="Login",
     * operationId="Login",
     * tags={"AUTH"},
     * @OA\RequestBody(
     *      @OA\JsonContent(
     *      @OA\Property (property="email", type="string", description="User email", example="admin@gmail.com"),
     *      @OA\Property (property="pass", type="string", description="User password", example="12341234"),
     *      ),
     * 
     * ),
     * @OA\Response(
     *    response=200,
     *    description="All showed posts",
     *    @OA\JsonContent(
     *       @OA\Property (property="data", type="array", collectionFormat="multi",
     *            @OA\Items(
     *               @OA\Property (property="title", type="string", description="Post title", example="Great Title"),
     *               @OA\Property (property="description", type="string", description="Post description",
     *                              example="Quis nemo impedit magnam enim rerum ipsa."),
     *               @OA\Property (property="image", type="string", description="Post cover",
     *                              example="http://portal/storage/images/image.webp"),
     *               @OA\Property (property="date", type="string", description="Post date", example="02 May 2023"),
     *             )
     *          ),
     *         )
     * )
     * )
     *     )
     * )
     */
    public function store(LoginRequest $request){
        $user=User::where('email',$request->email)->first();
        if(Hash::check($request->pass, $user->password)){
            $user->tokens()->delete();
            $token=$user->createToken('login');
            return ['token'=>$token->plainTextToken];
        }
        return response()->json(['status'=>'wrong passwodr'],403);
    }
}

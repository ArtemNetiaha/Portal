<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\Api\PostIdRequest;
use Illuminate\Database\Schema\PostgresSchemaState;

class ApiPostController extends Controller
{
    /**
     * @OA\Get(
     * path="/api/posts",
     * summary="Get all posts",
     * description="Get all posts",
     * operationId="allPosts",
     * tags={"POSTS"},
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
    public function index()
    {
        return PostResource::collection(Post::where('show', 1)->get());
    }
        /**
     * @OA\Get(
     * path="/api/posts/{id}",
     * summary="Get one posts",
     * description="Get one posts",
     * operationId="showPosts",
     * tags={"POSTS"},
     * @OA\Parameter(
     * description="Post ID",
     * name="id",
     * in="path",
     * required=true,
     * example="1"
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

    public function show(PostIdRequest $request)
    {
        
        return Post::where('id',$request->id)->with('blocks','category','tags','comments')->first();
    }

     /**
     * @OA\Post(
     * path="/api/posts",
     * summary="Create Post",
     * description="Create Post",
     * operationId="reatePost",
     * tags={"POSTS"},
     * security={{"sanctum":{}}},
     * @OA\RequestBody(
     *      @OA\JsonContent(
     *      @OA\Property (property="title", type="string", description="Post title", example="Super Post"),
     *      @OA\Property (property="description", type="string", description="Post description", example="Description log for post"),
     *      @OA\Property (property="category_id", type="integer", description="CID", example="2"),
     * ),
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

    public function store(StorePostRequest $request)
    {
        
        $post=Post::create($request->validated());
        return response()->json(['status'=>'created', 'post'=>$post], Response::HTTP_CREATED);
    }

}

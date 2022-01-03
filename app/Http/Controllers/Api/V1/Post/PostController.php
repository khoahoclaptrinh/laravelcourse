<?php

namespace App\Http\Controllers\Api\V1\Post;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Repositories\Post\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{

    private $postRepository;
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $params['page'] = !empty($request->page) ? $request->page : 1;
        $params['search'] = $request->q ?? null;
        $posts = $this->postRepository->getAll($params);
        $items = $posts->toArray();
        $data = [
            'current_page'=>!empty($request->page) ? $request->page : 1,
            'total'=>!empty($posts->total()) ? $posts->total() : 0,
            'perPage'=>!empty($posts->perPage()) ? $posts->perPage() : 2,
            'items' =>$items['data'],
            'to' =>$items['to']
        ];
        return ResponseHelper::success('Thành công',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->postRepository->getByID($id);
        if(!$post){
            return ResponseHelper::error('Dữ liệu không tồn tại trong hệ thống');
        }

        return ResponseHelper::success('Thành công',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

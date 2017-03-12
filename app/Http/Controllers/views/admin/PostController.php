<?php

namespace App\Http\Controllers\views\admin;

use Auth;
use App\Models\Post;
use App\Traits\SlugTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    use SlugTrait;

    /**
     * list pages
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function index(Request $request)
    {
        try
        {
            if ( Auth::user()->cant('create', Post::class)) return redirect()->back();


            $status = null;
            if ( $request->has('status') && $request->status != '' ) {
                if ( in_array($request->status, ['published', 'unpublished']) ) {
                    $status = $request->status;
                }
            }

            $keywords = $request->keywords;

            $posts = Post::when($keywords, function($query) use ($keywords) {
                return $query->where('title', 'rlike', $keywords);
            })
            ->when($status, function($query) use ($status) {
                return $query->where('status', $status);
            })
            ->orderBy('id', 'desc')
            ->paginate(50);

            return view('admin.posts.index', ['posts' => $posts]);
        }
        catch (Exception $e) {
            return redirect()->back()->withErrors($e);
        }
    }



    /**
     * Create new page
     *
     * @return view()
     */
    public function create()
    {
        if ( Auth::user()->cant('create', Post::class))
        return redirect()->back()->withErrors(['authorization' => 'You are not authorized']);

        return view('admin.posts.create');
    }


    /**
     * Store a new page
     *
     * @param  Request $request
     *
     * @return redirect()
     */
    public function store(Request $request)
    {
        if ( Auth::user()->cant('create', Post::class))
        return redirect()->back()->withErrors(['authorization' => 'You are not authorized']);

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug'  => 'required'
        ]);

        if($validator->fails())
            return redirect()->back()->withErrors(['validator' => 'Title & slug are required']);

        //Check if the slug exists using slug trait
        $slug = $this->getUniqueSlug($request->slug, 'pages');

        $post = Post::create([
            'title'             => $request->title,
            'slug'              => $slug,
            'tags'              => $request->tags,
            'image'             => $request->image,
            'template'          => $request->template,
            'excerpt'           => $request->excerpt,
            'content'           => $request->content,
            'status'            => $request->status,
            'category_id'       => $request->category_id,
            'last_updated_by'   => Auth::user()->id
        ]);

        return redirect()->route('posts.edit', ['id' => $post->id]);
    }




    /**
     * Display page for editing
     *
     * @param  integer $id page's id
     *
     * @return view()
     */
    public function edit($id)
    {
        if ( Auth::user()->cant('create', Post::class))
        return redirect()->back()->withErrors(['authorization' => 'You are not authorized']);

        $post = Post::find($id);
        if ( !$post ) return redirect()->route('post.index');
        return view('admin.post.edit', ['post' => $post]);
    }



    /**
     * Update a page
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function update(Request $request, $id)
    {
        try
        {
            if ( Auth::user()->cant('create', Post::class))
            return redirect()->back()->withErrors(['authorization' => 'You are not authorized']);

            $validator = Validator::make($request->all(), [
                'title' => 'required'
            ]);

            if($validator->fails())
                return redirect()->back()->withErrors(['validator' => 'Title is required']);


            $post = Post::find($id);
            if ( !$post ) return redirect()->back();

            $post->tags             = $request->tags;
            $post->title            = $request->title;
            $post->image            = $request->image;
            $post->status           = $request->status;
            $post->template         = $request->template;
            $post->excerpt          = $request->excerpt;
            $post->content          = $request->content;
            $post->category_id      = $request->category_id;
            $post->last_updated_by  = Auth::user()->id;
            $post->save();

            return redirect()->back()->with('message', 'Post successfully update!');
        }
        catch (Exception $e) {
            return redirect()->back()->withErrors($e);
        }

    }

}

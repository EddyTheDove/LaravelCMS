<?php

namespace App\Http\Controllers\views\admin;

use Auth;
use App\Models\Page;
use App\Traits\SlugTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
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
            if ( Auth::user()->cant('create', Page::class)) return redirect()->back();


            $status = null;
            if ( $request->has('status') && $request->status != '' ) {
                if ( in_array($request->status, ['published', 'unpublished']) ) {
                    $status = $request->status;
                }
            }

            $keywords = $request->keywords;

            $pages = Page::when($keywords, function($query) use ($keywords) {
                return $query->where('title', 'rlike', $keywords);
            })
            ->when($status, function($query) use ($status) {
                return $query->where('status', $status);
            })
            ->orderBy('id', 'desc')
            ->paginate(50);

            return view('admin.pages.index', ['pages' => $pages]);
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
        if ( Auth::user()->cant('create', Page::class))
        return redirect()->back()->withErrors(['authorization' => 'You are not authorized']);

        return view('admin.pages.create');
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
        if ( Auth::user()->cant('create', Page::class))
        return redirect()->back()->withErrors(['authorization' => 'You are not authorized']);

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug'  => 'required'
        ]);

        if($validator->fails())
            return redirect()->back()->withErrors(['validator' => 'Title & slug are required']);

        //Check if the slug exists using slug trait
        $slug = $this->getUniqueSlug($request->slug, 'pages');

        $page = Page::create([
            'title'             => $request->title,
            'slug'              => $slug,
            'tags'              => $request->tags,
            'image'             => $request->image,
            'template'          => $request->template,
            'excerpt'           => $request->excerpt,
            'content'           => $request->content,
            'status'            => $request->status,
            'last_updated_by'   => Auth::user()->id
        ]);

        return redirect()->route('pages.edit', ['id' => $page->id]);
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
        if ( Auth::user()->cant('create', Page::class))
        return redirect()->back()->withErrors(['authorization' => 'You are not authorized']);

        $page = Page::find($id);
        if ( !$page ) return redirect()->route('pages.index');
        return view('admin.pages.edit', ['page' => $page]);
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
            if ( Auth::user()->cant('create', Page::class))
            return redirect()->back()->withErrors(['authorization' => 'You are not authorized']);

            $validator = Validator::make($request->all(), [
                'title' => 'required'
            ]);

            if($validator->fails())
                return redirect()->back()->withErrors(['validator' => 'Title is required']);


            $page = Page::find($id);
            if ( !$page ) return redirect()->back();

            $page->tags             = $request->tags;
            $page->title            = $request->title;
            $page->image            = $request->image;
            $page->status           = $request->status;
            $page->template         = $request->template;
            $page->excerpt          = $request->excerpt;
            $page->content          = $request->content;
            $page->last_updated_by  = Auth::user()->id;
            $page->save();

            return redirect()->back()->with('message', 'Page successfully update!');
        }
        catch (Exception $e) {
            return redirect()->back()->withErrors($e);
        }

    }

}

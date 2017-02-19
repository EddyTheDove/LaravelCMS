<?php

namespace App\Http\Controllers\views\admin;

use Auth;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
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




    public function create()
    {
        return view('admin.pages.create');
    }

}

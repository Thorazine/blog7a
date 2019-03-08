<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use App\Image;
use Exception;
use DB;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::get();

        return view('admin.pages.index')
            ->with('pages', $pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            // logica
            $page = new Page;
            $page->title = $request->title;
            $page->slug = $request->slug;
            $page->active = ($request->active) ? 1 : 0;
            $page->body = $request->body;
            $page->save();

            $file = pathinfo($request->image->getClientOriginalName());

            // page id is set!
            $image = new Image;
            $image->page_id = $page->id;
            $image->title = $file['filename'];
            $image->author = '';
            $image->filename = str_slug($file['filename']);
            $image->extension = strtolower($file['extension']);
            $image->width = 0;
            $image->height = 0;
            $image->filesize = 0;
            $image->save();

            $request->file('image')->storeAs('', $file['filename'].'.'.$file['extension']);

            DB::commit();

            return redirect()->route('admin.pages.index');
        }
        catch(Exception $e) {
            // later
            DB::rollback();

            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        try {
            DB::beginTransaction();

            // logica

            DB::commit();
        }
        catch(Exception $e) {
            // later
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('delete');
        try {
            DB::beginTransaction();

            // logica

            DB::commit();
        }
        catch(Exception $e) {
            // later
            DB::rollback();
        }
    }
}

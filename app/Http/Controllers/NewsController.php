<?php

namespace App\Http\Controllers;

use App\News;
use App\ImagesNews;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('news.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate([
        'title' => 'required',
        'images' => 'required',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'references' => 'required',
        'detail' => 'required|min:100',
      ],[]);

      $news = new News;
      $news->title = $request->input('title');
      $news->detail = $request->input('detail');
      $news->references = $request->input('references');
      $news->save();
      if($files=$request->file('images')){
        $n = 1;
        foreach($files as $file){
          $ext = $file->getClientOriginalExtension();
          $name=time().$n.'.'.$ext;
          $upload = $file->move(
            public_path().'/images_news', $name);
            $n++;
            $image = new ImagesNews;
            $image->news_id = $news->id;
            $image->image = '/images_news' . '/' . $name;
            $image->save();
          }
        }
        if($upload){
          return redirect()
          ->back()
          ->with(['status' => 'success', 'message' => 'Image uploaded successfully!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
      return view('news.edit', ['news' => $news,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
      // $news->title = $request->input('title');
      // $news->detail = $request->input('detail');
      // $news->references = $request->input('references');
      // // $news->save();
      // if($files=$request->file('images')){
      //   $n = 1;
      //   foreach($files as $file){
      //     $ext = $file->getClientOriginalExtension();
      //     $name=time().$n.'.'.$ext;
      //     $upload = $file->move(
      //       public_path().'/images_news', $name);
      //       $n++;
      //       $image = new ImagesNews;
      //       $image->news_id = $news->id;
      //       $image->image = '/images_news' . '/' . $name;
            // $image->save();
        //   }
        // }
        // if($upload){
          // return redirect()
          // ->back()
          // ->with(['status' => 'success', 'message' => 'Image uploaded successfully!']);
        // }
        return "Yeahhhhhhhhhh";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}

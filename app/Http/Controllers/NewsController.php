<?php

namespace App\Http\Controllers;

use App\News;
use App\ImagesNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $news = News::all();
        return view('news.index', ['news' => $news]);
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
        'detail' => 'required',
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
          $upload = $file->storeAs(
            'public/images_news', $name);
            $n++;
            $image = new ImagesNews;
            $image->news_id = $news->id;
            $image->image = 'images_news' . '/' . $name;
            $image->save();
          }
        }
        if($upload){
          return redirect("/news/".$new->id);
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
        $imagesnews =  ImagesNews::where('news_id', '=', $news->id)->get();
        $morenews = News::select('id','title','updated_at')->orderBy('updated_at')->limit(7)->get();
        $imagesnewscover =  ImagesNews::where('news_id', '=', $news->id)->get()[0];
        $newsdaytime = explode(" ", $news->created_at);
        return view('news.show', ['news' => $news, 'imagesnews' => $imagesnews, "imagesnewscover" => $imagesnewscover, "newsday" => $newsdaytime[0], 'morenews' => $morenews]);
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
      $news->title = $request->input('title');
      $news->detail = $request->input('detail');
      $news->references = $request->input('references');
      $news->save();
      if($files=$request->file('images')){
        $n = 1;
        foreach($files as $file){
          $ext = $file->getClientOriginalExtension();
          $name=time().$n.'.'.$ext;
          $upload = $file->storeAs(
            'public/images_news', $name);
            $n++;
            $image = new ImagesNews;
            $image->news_id = $news->id;
            $image->image = 'images_news' . '/' . $name;
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
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
      $news->delete();
      return redirect('/news');
    }
}

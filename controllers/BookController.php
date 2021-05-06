<?php
  // file: controllers/ProfessorController.php

  require_once('book.php');

  class BookController extends Controller {

    public function index() {
      $books = DB::table('book')->get();  
      return view('book/index',
       ['books'=>$books,
        'titles'=>'Book List','login'=>Auth::check()]);
    }

    public function show($id) {
      $book = DB::table('book')->find($id);
      
      return view('book/show',
        ['book'=>$book,
         'titles'=>'Book Detail', 'show'=>true,'create'=>false,'edit'=>false,'login'=>Auth::check()]);
    }
    public function create() {
      if (!Auth::check()) return redirect('/login');
      $item = ['title'=>'','edition'=>'',
      'copyright'=>'','language'=>''
      ,'pages'=>'','author'=>''
      ,'author_id'=>'','publisher'=>''
      ,'publisher_id'=>''];
      
      return view('book/show',
        ['titles'=>'Book Create', 'book'=>$item,'show'=>false,'create'=>true,'edit'=>false,'login'=>Auth::check()]);
    }  
    
    public function store() {
      if (!Auth::check()) return redirect('/login');
      $title = Input::get('title');
      $edition = Input::get('edition');
      $copyright = Input::get('copyright');
      $language = Input::get('language');
      $pages = Input::get('pages');
      $author = Input::get('author');
      $author_id = Input::get('author_id');
      $publisher = Input::get('publisher');
      $publisher_id = Input::get('publisher_id');
      $item = ['title'=>$title,'edition'=>$edition,
      'copyright'=>$copyright,'language'=>$language
      ,'pages'=>$pages,'author'=>$author
      ,'author_id'=>$author_id,'publisher'=>$publisher
      ,'publisher_id'=>$publisher_id];

      DB::table('book')->insert($item);
      return redirect('/book');
    }  
    
    public function edit($id) {  
      if (!Auth::check()) return redirect('/login');
      $bk = DB::table('book')->find($id);
      return view('book/show',
       ['book'=>$bk,
       'titles'=>'Book Edit', 'show'=>false,'create'=>false,'edit'=>true,'login'=>Auth::check()]);
    }  
    
    public function update($id) {
      if (!Auth::check()) return redirect('/login');
      $title = Input::get('title');
      $edition = Input::get('edition');
      $copyright = Input::get('copyright');
      $language = Input::get('language');
      $pages = Input::get('pages');
      $author = Input::get('author');
      $author_id = Input::get('author_id');
      $publisher = Input::get('publisher');
      $publisher_id = Input::get('publisher_id');
      $item = ['title'=>$title,'edition'=>$edition,
      'copyright'=>$copyright,'language'=>$language
      ,'pages'=>$pages,'author'=>$author
      ,'author_id'=>$author_id,'publisher'=>$publisher
      ,'publisher_id'=>$publisher_id];
      
      DB::table('book')->update($id,$item);
      return redirect('/book');
    }
    
    public function destroy($id) {  
      if (!Auth::check()) return redirect('/login');
      DB::table('book')->delete($id);
      return redirect('/book');
    }
  }
?>
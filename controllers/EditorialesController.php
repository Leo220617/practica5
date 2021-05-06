<?php
  // file: controllers/ProfessorController.php

  require_once('editorial.php');

  class EditorialesController extends Controller {

    public function index() {  
      $editorial = DB::table('publisher')->get();  
      return view('editorial/index',
       ['editorial'=>$editorial,
        'title'=>'editorial List','login'=>Auth::check()]);
    }

    public function show($id) {
      $editorial = DB::table('publisher')->find($id);
       
      return view('editorial/show',
        ['editorial'=>$editorial,
         'title'=>'editorial Detail', 'show'=>true,'create'=>false,'edit'=>false,'login'=>Auth::check()]);
    }
    public function create() {
      if (!Auth::check()) return redirect('/login');
      $item = ['publisher'=>'','country'=>'',
      'founded'=>'','genere'=>''
      ,'books__book_id'=> '','books__title'=>''
      ];
      return view('editorial/create',
        ['title'=>'editorial Create', 'editorial'=>$item,'show'=>false,'create'=>true,'edit'=>false,'login'=>Auth::check()]);
    }  
    
    public function store() {
      if (!Auth::check()) return redirect('/login');
      $publisher = Input::get('publisher');
      $country = Input::get('country');
      $founded = Input::get('founded');
      $genere = Input::get('genere');
      $books__book_id = Input::get('books__book_id');
      $books__title = Input::get('books__title');
     // $books__title_id = Input::get('books__title_id');
      $item = ['publisher'=>$publisher,'country'=>$country,
      'founded'=>$founded,'genere'=>$genere
      ,'books__book_id'=>$books__book_id,'books__title'=>$books__title
      ];
      DB::table('publisher')->insert($item);
      return redirect('/editorial');
    }  
    
    public function edit($id) {  
      if (!Auth::check()) return redirect('/login');
      $bk =  DB::table('publisher')->find($id);
      return view('editorial/edit',
       ['editorial'=>$bk,
       'title'=>'editorial Edit', 'show'=>false,'create'=>false,'edit'=>true,'login'=>Auth::check()]);
    }  
    
    public function update($id) {
      if (!Auth::check()) return redirect('/login');
      $publisher = Input::get('publisher');
      $country = Input::get('country');
      $founded = Input::get('founded');
      $genere = Input::get('genere');
      $books__book_id = Input::get('books__book_id');
      $books__title = Input::get('books__title');
     // $books__title_id = Input::get('books__title_id');
      $item = ['publisher'=>$publisher,'country'=>$country,
      'founded'=>$founded,'genere'=>$genere
      ,'books__book_id'=>$books__book_id,'books__title'=>$books__title
      ];

      DB::table('publisher')->update($id,$item);
      return redirect('/editorial');
    }
    
    public function destroy($id) {  
      if (!Auth::check()) return redirect('/login');
      DB::table('publisher')->delete($id);
      return redirect('/editorial');
    }
  
  }
?>
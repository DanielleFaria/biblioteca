<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lending;
use App\Models\Book;
use App\Models\Author;
use Validator;
use Auth;
use DB;

class LendingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $lendings_query = Lending::with('user');
        
        if(Auth::user()->role == 0){
            $lendings_query->where("user_id", Auth::user()->id);
        }

        $lendings = $lendings_query->get();

        $books = Book::get();
        $selected_cat = [];

        return view('lending.index', compact('lendings', 'books', 'selected_cat' ));
    }

    public function add()
    {
	    $lendings = Lending::get();
        $books = Book::get();
        $author = Author::get();
        $selected_cat = [];

        return view('lending.add', compact('lendings', 'books', 'author', 'selected_cat' ));
    }

    public function save(Request $request)
    {
        $d_start = date('Y/m/d');
        $d_end =  date('Y/m/d', strtotime('+7 days'));
        

        $lending = Lending::create([
            'user_id' => auth()->user()->id,
            'date_start' =>  $d_start, 
            'date_end' => $d_end 
        ]);

        $lending->book()->sync($request->input('book'));
        
        return redirect()->route('lending.index');
    }
    

    public function update($id)    {
        $d_finsh = date('Y/m/d');
        $lending = Lending::find($id);
       

        $lending->update([
            'date_finish' => $d_finsh
         ]);
       

        return redirect()->route('lending.index');
    }
    

}
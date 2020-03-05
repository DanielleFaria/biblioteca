<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;
use App\Models\Author;
use Validator;
use DB;

class BookController extends Controller
{
    private $path = 'images/book';
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
	    $books = Book::get();
        $authors = Author::get();
        $selected_cat = [];
        return view('book.index', compact('books', 'authors', 'selected_cat' ));
    }

    public function add()
    {
        $authors = Author::get();        
    	return view('book.add', compact('authors'));
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:255',
            'description' => 'required',
        ]);

        if(!$validator->fails()){                     

            if (!empty($request->file('image')) && $request->file('image')->isValid()) {
                $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move($this->path, $fileName);
            }

            $book = Book::create([
                'title' => $request->input('title'), 
                'description' => $request->input('description'),
                'image' => $fileName
            ]);

            $book->authors()->sync($request->input('author'));

            return redirect()->route('book.index');
        }

          return redirect()->route('author.index');       
    }


    public function edit($id)
    {
        $book = Book::find($id);
       

        if(!empty($book)){
            $authors = Author::get();
             
            $selected_cat = array();

            foreach ($book->authors as $author) {
                $selected_cat[] = $author->pivot->author_id;
            }
            return view('book.edit', compact('book', 'authors', 'selected_cat' ));
        }

        return redirect()->route('book.index');
    }

    public function update(Request $request, $id)
    {
        $image = $request->file('image');
        $author = $request->input('author');

        $book = Book::find($id);

        $fileName = NULL;

        if (!empty($request->file('image')) && $request->file('image')->isValid()) {
            if(!empty($request->input('deleteimage')) && file_exists($this->path . '/' . $request->input('deleteimage'))){
                unlink($this->path . '/' . $request->input('deleteimage'));
            }
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($this->path, $fileName);
        }

        if(!$fileName){
            $book->update([
                'name' =>  $request->input('name'),
                'description' =>  $request->input('description')
             ]);

        }else{
            $book->update([
                'name' =>  $request->input('name'),
                'description' =>  $request->input('description'),
                'image' => $fileName
             ]);
        }

         if(!empty($author)){
            $book->authors()->sync($author);
         }        

        return redirect()->route('book.index');
    }

    public function delete($id)
    {
        $book =  Book::find($id);

        if($book){
            $book->authors()->detach();
            $result = $book->delete();
        }

        return redirect()->route('book.index');
    }

}

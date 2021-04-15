<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Models\Comment;

class BlogController extends Controller
{
    /**
     * @param Blog $blog
     * @return BlogResource
     */
    public function show($id) {
        return Blog::findorFail($id); //searches for the object in the database using its id and returns it.
    }

    /**
     * @return mixed
     */
    public function index(){
        return Blog::orderBy('created_at', 'asc')->get();  //returns values in ascending order
    }

    /**
     * @param Request $request
     * @return Comment
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request){

        $this->validate($request, [ //inputs are not empty or null
            'title' => 'required',
            'description' => 'required',
        ]);

        $comment = new Comment();
        $comment->title = $request->input('title'); //retrieving user inputs
        $comment->description = $request->input('description');  //retrieving user inputs
        $comment->save(); //storing values as an object
        return $comment; //returns the stored value if the operation was successful.
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id){
        $this->validate($request, [ // the new values should not be null
            'title' => 'required',
            'description' => 'required',
        ]);

        $comment = Comment::findorFail($id); // uses the id to search values that need to be updated.
        $comment->title = $request->input('title'); //retrieves user input
        $comment->description = $request->input('description');//retrieves user input
        $comment->save();//saves the values in the database. The existing data is overwritten.
        return $comment; // retrieves the updated object from the database
    }

    /**
     * @param $id
     * @return string
     */
    public function destroy($id){ //receives an object's id
        $comment = Comment::findorFail($id); //searching for object in database using ID
        if($comment->delete()){ //deletes the object
            return 'deleted successfully'; //shows a message when the delete operation was successful.
        }
    }
}

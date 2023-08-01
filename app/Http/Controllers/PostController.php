<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index(){
        $posts = Post::get();

        return response()->json(['posts' => $posts]);
    }
    public function store(Request $request){
        // $post = new Post;
        // $post->title = $request->form_data['title'];
        // $post->content = $request->form_data['content'];
        // $post->user_id = $request->input('user_id');
        // $post->save();

        $post = Post::create([
            'title' => $request->form_data['title'], 
            'content' => $request->form_data['content'], 
            'user_id' => $request->input('user_id')
        ]);

        return response()->json('NICE');
    }

    public function uploadImage(Request $request){

        $request->validate([
            'files' => 'required|array',  // Ensure 'files' is an array
            'files.*' => 'image|mimes:jpeg,png,gif|max:5120', // Validate each file in the array
        ]);
        $post = Post::findOrFail(1);

        if ($request->hasFile('files')) {
            DB::beginTransaction();
    
            try {
                foreach ($request->file('files') as $file) {
                    $hashName = $file->store(
                        'posts',
                        'public'
                    );
    
                    // Delete the previous image if you want to replace it
                    Storage::disk('public')->delete('posts/' . $post->hash_image_name);
    
                    // Update the post with the new image information
                    $post->image = $file->getClientOriginalName();
                    $post->hash_image_name = $hashName;
                    $post->save();
                }
    
                DB::commit();
                return response()->json(['message' => 'Files uploaded successfully.']);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Failed to upload files.'], 500);
            }
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = null;
        // $data = Post::firstWhere('id', 1);
        // $data = Post::findOr(11, function () {
        //    abort(404);
        // });

        // $data = Post::where('id', '>', 10)->firstOr(function () {
        //     abort(404);
        // });

        // $data = Post::findOrFail(11);
        // $data = Post::where('id', '>', 11)->firstOrFail();
        // dd($data);

        // Retrieve flight by name or create it if it doesn't exist...
        // $data = Post::firstOrCreate([
        //     'title' => 'Sed doloribus doloribus quibusdam cumque ad.'
        // ]);

        // Retrieve Post by name or create it with the name, user_id, and content attributes...
        // $data = Post::firstOrCreate(
        //     //WHERE TITLE IS = VALUE
        //     ['title' => 'Sed doloribus doloribus quibusdam cumque ad. fwf'],

        //     // ADD TITLE ATTRIBUTE WITH THIS DATA BELOW
        //     ['user_id' => 1756, 'content' => 'Sheesh']
        // );

        // Retrieve Post by title or instantiate a new Flight instance...
        // $data = Post::firstOrNew([
        //     'title' => 'Sed doloribus doloribus quibusdam cumque ad.'
        // ]);

        // $data->content = 'AYO';
        // $data->save();
        
        /** USING SAVE = save method may also be used to update models that already exist in the database */

        // $data = new Post;
            
        // $data->title =  'heasafahe boi';
        // $data->user_id = 1757;
        // $data->content = 'WOW';
        // $data->save();
 

        /** USING CREATE need to specify either a fillable or guarded */
        // $data = Post::create([
        //     'title' => 'London to Paris',
        //     'user_id' => '1758',
        //     'content' => 'NYAKWSD',
        // ]);

        /** MASS UPDATES */
        // $data = Post::where('user_id', 1757)
        // ->update(['deleted_at' => now()]);
        

        /** UPDATE MODEL ATTRIBUTE ON THE FLY JUST LIKE SAVE() */
        // $data = Post::create([
        //     'title' => 'PARAK BRODIE',
        //     'user_id' => '1759',
        //     'content' => 'AYOASWSD',
        // ]);

        // $data->fill(['title' => 'Amsterdam to Frankfurt']);

        /** UPDATE OR CREATE */
        // $data = Post::updateOrCreate(
        //     ['id' => '1'],
        //     ['title' => 'updateOrCreate', 'content' => 'update']
        // );
        // $data = Post::updateOrCreate(
        //     ['id' => '17'],
        //     ['title' => 'updateOrCreate 1',  'user_id' => '1760', 'content' => 'create']
        // );

        /** UPSERT */
        // $data = Post::upsert([
        //     ['id' => 18, 'user_id'=>1759, 'title' => 'updateOrCreate', 'content' => 'NEW SHIT', 'deleted_at' =>null],
        //     ['id' => 19, 'user_id'=>1759, 'title' => 'BRODIE', 'content' => 'NEW SHIT', 'deleted_at' => null]
        // ], ['title'], ['deleted_at']);
        

        /** PERMANENTLY DELETE MODELS DESTROY & forceDelete() - SOFTDELETE;  */
        // $data =  Post::destroy([17, 18, 19]);

        /** DUMP ELOQUENT QUERIES */
        // DB::table('users')->where('votes', '>', 100)->dumpRawSql();
 
        // DB::table('users')->where('votes', '>', 100)->ddRawSql();


        /** REPLICATE existing model instance && CHANGE ATTRIBUTE ON THE FLY */ 
        // $original = Post::create([
        //     'title' => 'ANYEONG HASEYO NEW',
        //     'user_id' => '1765',
        //     'content' => 'ORIGINAL',
        // ]);
         
        /** CHANGE ATTRIBUTE ON THE FLY */
        // $data = $original->replicate()->fill([
        //     'content' => 'REPLICATE'
        // ]);
         
          /** EXCLUDE SOME ATTRIBUTE FROM THE ORIGINAL */
        // $original = Post::findOrFail(2);
        // $data = $original->replicate();

        // $data->save();

        /** SOFT DELETE */

         /** DETERMINE IF THE MODEL IS SOFTDELETED */
        // if ($post->trashed()) {
        //     // ...
        // }

        /** UNDELETE THE SOFTDELETED MODEL */
        // $post->restore();

        /** MASS RESTORE SOFTDELETED MODELS */
        // Post::withTrashed()
        // ->where('user_id', 1756)
        // ->restore();

        /** INCLUDE THE SOFT DELETED MODELS IN FETCH */
        // Post::withTrashed()
        // ->where('user_id', 1756)
        // ->get();
      
        /** ONLY FETCH  THE SOFT DELETED MODELS  */
        // Post::onlyTrashed()
        // ->get();
      
        /** USING LOCAL SCOPE */
        // $data = Post::deletedAt()->published()->get();

        /** THIS */
        // $data = Post::deletedAt()->orWhere(function ($query) {
        //     $query->id();
        // })->get();
         
        /** OR THIS */
        // $data = Post::deletedAt()->orWhere->id()->get();

        // $data = Post::findId(2)->first();

        /** ACCESSOR & MUTATOR */
        // $data = Post::findOrFail(10);

        // $post = new Post;
        // $post->title = 'AWAWFAWFAWF';
        // $post->user_id = 1;
        // $post->content ='nice';
        // $post->save();

        #REQUEST CYCLE
        #EXAMPLE : 
            #scheme://subdomain.domain:port/path?query#fragment

        // dd($request->path()); #/
        // dd($request->is('admin/*')); # boolean
        // dd($request->routeIs('sheesh')); #/ boolean
        // dd($request->url()); #http://laravel-practical.test:8080
        // dd($request->fullUrl());  #http://laravel-practical.test:8080 with query string
        // dd($request->fullUrlWithQuery(['type' => 'phone']));  #http://laravel-practical.test:8080/?type=phone appent query string on the fly
        // dd($request->fullUrlWithoutQuery(['type'])); #http://laravel-practical.test:8080 remove certain  query string on the fly;
        // dd($request->host()); #domain
        // dd($request->httpHost()); #domain with port
        // dd($request->schemeAndHttpHost()); http domain + port
        // dd($request->isMethod('post')); #check request method
        // dd($request->header('X-Header-Name')); #retrieve  declared header  
        // dd($request->header('X-Header-Name', 'default')); #retrieve if declared header exists if not set default value 
        // dd($request->hasHeader('X-Header-Name')); #boolean
        // dd($request->bearerToken()); #get bearer token if exists
        //dd($request->ip()); #get ip of the user
        // dd( $request->query('name')) #get the specified query string;
        // dd( $request->query('name','default')) #get the specified query string if not set default value;
        // $request->only(['username', 'password']);
        // $request->except(['credit_card']);
        
        /** FILES */
        // $file = $request->file('photo'); #retrieve uploaded file
        //  $request->hasFile('photo') #check if photo file exists
        // $request->file('photo')->isValid() #you may verify that there were no problems uploading the file via the isValid
         
        // return view('test',['data' => $data]);
    }
}

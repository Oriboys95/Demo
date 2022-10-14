<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index (){
        return view('admin.posts.index');
    }

    /**
     * post list.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $posts = DB::table('post as p')
                ->select('p.id as id', 'p.nome as nome', 'p.testo as testo', 'p.user_id as user_id', 'u.name as username')
        ->leftJoin('users as u', 'u.id', '=', 'p.user_id')
        ->get();
        return $posts;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $richiesta = $request->all();
        $id = $request['key'];
        $values= $request['values'];
        $values = json_decode($values, true);

        $post = new Post();
        $post->nome = $values['nome'];
        if (array_key_exists('testo', $values)){
        $post->testo = $values['testo'];
    }
        $post->user_id = $values['user_id'];
        $post->save();



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $richiesta = $request->all();
        $id = $request['key'];
        $values= $request['values'];
        $values = json_decode($values, true);

        $post = Post::find($id);
        //faccio ovunque il controllo perchè mi invia solo i dati modificati quindi potrebbero non esistere alcune chiavi
        if (array_key_exists('nome', $values)){
            $post->nome = $values['nome'];
        }
        if (array_key_exists('testo', $values)){
            $post->testo = $values['testo'];
        }
        if (array_key_exists('user_id', $values)){
            $post->user_id = $values['user_id'];
        }

        $post->save();






    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {

        $richiesta = $request->all();
        $id = $request['key'];
        $values= $request['values'];
        $values = json_decode($values, true);
        $post = Post::find($id)->delete();

    }
}

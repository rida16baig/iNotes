<?php

namespace App\Http\Controllers;

// use App\Models\Post;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function create()
    {
        return view('posts.create');

    }
    public function store(Request $request)
    {
        $validated_data = $request->validate([ 
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
        $result = Post::create($validated_data);

        if ($result) {
            return redirect()->back()->with('msg', 'Note created successfully!');
        }
    }

    public function read()
    {

        return view('posts.read', [ 'data' => Post::withoutTrashed()->paginate(10)]);
    }
    

    public function edit($id)
    {
        $post = POST::find($id);
        return view('posts.edit', [ 'id' => $post ]);
        // dd($result);
    }


    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $validated_data = $request->validate([ 
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
        ]);


        $result = Post::where('id', $id)->update($validated_data);

        if ($result) {
            return redirect()->route('post.read')->with('success', 'Note updated successfully');
        }


    }


    public function delete($id)
    {
        $result = Post::destroy($id);

        if ($result) {
            return redirect()->route('post.read')->with('msg', 'Note deleted successfully');
        }

    }

    public function trashed()
    {
        $trashedPosts = Post::onlyTrashed()->get();

        if ($trashedPosts->isEmpty()) {
            return redirect()->route('post.read')->with('msg', 'Recycle Bin is empty, No notes in Recycle Bin found');
        } else {
            return view('posts.trashed', [ 'trashed_data' => $trashedPosts ]);
        }

    }


    public function restore($id)
    {
        $result = Post::onlyTrashed()->where('id', $id)->restore();

        if ($result) {
            return redirect()->back()->with('msg', 'Note Restored successfully');
        }
    }

    public function forceDelete($id)
    {
        $result = Post::onlyTrashed()->where('id', $id)->forceDelete();

        if ($result) {
            return redirect()->back()->with('msg', 'Note deleted permanently successfully');
        }

    }

    public function deleteAll()
    {
        $result = Post::onlyTrashed()->forceDelete();
        if ($result) {
            return redirect()->route('post.read')->with('msg', 'All notes are deleted permanently.');
        }
    }
}
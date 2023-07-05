<?php

    namespace App\Http\Controllers;

    use App\Models\Post;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\Request;

    class PostController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return Application|Factory|View
         */
        public function index()
        {
            // Get all the posts ordered by published date
            $posts = Post::orderBy('published_at', 'desc')->get();

            return view('posts.index', compact('posts'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Application|Factory|View
         */
        public function create()
        {
            return view('posts.create');
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            //
        }

        /**
         * Display the specified resource.
         *
         * @param Post $post
         * @return Application|Factory|View
         */
        public function show(Post $post)
        {
            return view('posts.show', compact('post'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param Post $post
         * @return Application|Factory|View
         */
        public function edit(Post $post): Application|Factory|View
        {

        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param Post $post
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Post $post)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param Post $post
         * @return \Illuminate\Http\Response
         */
        public function destroy(Post $post)
        {
            //
        }
    }

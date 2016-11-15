<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    const ITEMS_PER_PAGE = 10;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function listPosts($page = 1)
    {
        $page = max(1, (int)$page);

        $posts = Post::orderBy('created_at', 'desc')
            ->forPage($page, self::ITEMS_PER_PAGE)
            ->get();

        return view(
            'admin.listPosts',
            [
                'posts' => $posts,
                'page'  => $page,
            ]
        );
    }

    public function editPost($postId = null)
    {
        if (null === $postId) {
            $post = new Post();
        } else {
            $post = Post::find($postId);

            if (empty($post)) {
                abort(404);
            }
        }

        return view('admin.editPost', [
            'categories' => Category::all(),
            'post'       => $post,
        ]);
    }

    public function savePost(Request $request, $postId = null)
    {
        if (null === $postId) {
            $post = new Post();
        } else {
            $post = Post::find($postId);

            if (empty($post)) {
                abort(404);
            }

            if ('1' == $request->get('is_delete', 0)) {
                $post->delete();
                return redirect()->intended('/admin/posts');
            }
        }

        $this->validate($request, [
            'title'       => 'required',
            'category_id' => 'required',
            'body'        => 'required',
        ]);

        if (empty($post->author)) {
            $post->author = Auth::user()->username;
        }

        $post->title        = $request->get('title');
        $post->category_id  = $request->get('category_id');
        $post->body         = $request->get('body');
        $post->is_published = (int)$request->get('is_published', 0);

        $post->save();

        return redirect()->intended(url('/admin/posts', [$post->_id]));
    }

    public function listCategories()
    {
        $categories = Category::all()->forPage($page, self::ITEMS_PER_PAGE);

        return view('admin.listCategories', ['categories' => $categories]);

    }

    public function editCategory($categoryId = null)
    {
        if (null === $categoryId) {
            $category = new Category();
        } else {
            $category = Category::find($categoryId);

            if (empty($category)) {
                abort(404);
            }
        }

        return view('admin.editCategory', [
            'category' => $category,
        ]);

    }

    public function saveCategory(Request $request, $categoryId = null)
    {
        if (null === $categoryId) {
            $category = new Category();
        } else {
            $category = Category::find($categoryId);

            if (empty($category)) {
                abort(404);
            }
        }

        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required',
        ]);

        $category->name = $request->get('name');
        $category->slug = $request->get('slug');

        $category->save();

        return redirect()->intended(url('/admin/categories', [$category->_id]));
    }
}

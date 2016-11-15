<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;

class BlogController extends Controller
{
    const ITEMS_PER_PAGE = 10;

    public function listPosts($page = 1, $categorySlug = null)
    {
        $page = max(1, (int)$page);

        $postQuery = Post::where('is_published', '=', 1)
            ->orderBy('created_at', 'desc')
            ->forPage($page, self::ITEMS_PER_PAGE);

        if ($categorySlug) {
            $categories = Category::where('slug', '=', $categorySlug)->get();

            if (!count($categories)) {
                abort(404);
            }

            $category = $categories->get(0);

            $postQuery->where('category_id', '=', $category->_id);
        }

        return view(
            'blog.listPosts',
            [
                'posts'    => $postQuery->get(),
                'page'     => $page,
                'category' => $categorySlug,
            ]
        );
    }

    public function listPostsByCategory($categorySlug = null, $page = 1)
    {
        return $this->listPosts($page, $categorySlug);
    }

    public function viewPost($postId)
    {
        $post = Post::find($postId);

        if (empty($post)) {
            abort(404);
        }

        $category = Category::find($post->category_id);

        return view('blog.viewPost', ['post' => $post, 'category' => $category]);
    }
}

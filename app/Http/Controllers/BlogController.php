<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use App\Repositories\Contracts\PostRepositoryInterface;

class BlogController extends Controller
{
    public function __construct(private readonly PostRepositoryInterface $posts) {}

    public function index()
    {
        $category = request('category');
        $posts = $this->posts->paginate(12, $category);
        $categories = PostCategory::orderBy('name')->get();

        return $this->renderPage('pages.blog', 'blog', 'lims-green', compact('posts', 'categories', 'category'));
    }

    public function show(string $slug)
    {
        $post = $this->posts->findBySlug($slug);

        return $this->renderPage('blog.show', 'blog', 'lims-green', compact('post'));
    }
}

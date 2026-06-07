<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Posts\CreatePost;
use App\Actions\Posts\DeletePost;
use App\Actions\Posts\UpdatePost;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\PostCategory;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct(private readonly PostRepositoryInterface $repository) {}

    public function index()
    {
        $posts = $this->repository->paginateAll(20);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = PostCategory::orderBy('name')->get();
        return view('admin.posts.create', compact('categories'));
    }

    public function store(StorePostRequest $request, CreatePost $action)
    {
        $data = $request->validated();

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('posts', 'public');
        }

        $action->handle($request->user(), $data);

        return redirect()->route('admin.posts.index')->with('success', 'Post criado com sucesso.');
    }

    public function edit(Post $post)
    {
        $categories = PostCategory::orderBy('name')->get();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(UpdatePostRequest $request, Post $post, UpdatePost $action)
    {
        $data = $request->validated();

        if ($request->hasFile('cover_image')) {
            if ($post->cover_image) {
                Storage::disk('public')->delete($post->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('posts', 'public');
        }

        $action->handle($post, $data);

        return redirect()->route('admin.posts.index')->with('success', 'Post atualizado com sucesso.');
    }

    public function destroy(Post $post, DeletePost $action)
    {
        $action->handle($post);
        return redirect()->route('admin.posts.index')->with('success', 'Post excluído.');
    }
}

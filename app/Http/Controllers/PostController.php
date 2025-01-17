<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display the last 10 posts on the dashboard.
     */
    public function index()
    {
        $posts = Post::latest()->take(10)->get(); // Get the latest 10 posts
        return view('dashboard', compact('posts')); // Pass posts to the dashboard view
    }

    /**
     * Store a new post.
     */
    public function store(StorePostRequest $request)
    {
        // Check if the authenticated user is an admin
        if (!auth()->user()->isAdmin()) {
            return redirect()->route('dashboard')->with('error', 'Unauthorized action.');
        }

        // Handle file upload
        $coverPath = null;
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
        }

        // Store the post using the validated data
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'cover' => $coverPath, // Save the cover image path
            'user_id' => auth()->id(), // Assign the post to the logged-in user
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Post created successfully!');
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified post.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // Check if the authenticated user is an admin
        if (!auth()->user()->isAdmin()) {
            return redirect()->route('dashboard')->with('error', 'Unauthorized action.');
        }

        // Log the incoming request data
        \Log::info('Post update request data:', $request->all());

        // Handle file upload
        if ($request->hasFile('cover')) {
            // Delete the old cover image if it exists
            if ($post->cover) {
                \Storage::disk('public')->delete($post->cover);
            }

            // Store the new cover image
            $coverPath = $request->file('cover')->store('covers', 'public');
            $post->cover = $coverPath;
        }

        // Update the post using the validated data
        $post->update($request->validated());

        // Log the post data after saving
        \Log::info('Post data after saving:', $post->toArray());

        // Redirect back with a success message
        return redirect()->route('dashboard')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified post from storage.
     */
    public function destroy(Post $post)
    {
        // Check if the authenticated user is an admin
        if (!auth()->user()->isAdmin()) {
            return redirect()->route('dashboard')->with('error', 'Unauthorized action.');
        }

        // Delete the post
        $post->delete();

        // Redirect back with a success message
        return redirect()->route('dashboard')->with('success', 'Post deleted successfully!');
    }
}

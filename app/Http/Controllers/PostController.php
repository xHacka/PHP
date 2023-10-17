<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller {
    private $filename = "posts.json";
    private $posts;

    public function __construct() {
        $this->posts = database_path($this->filename);
    }

    private function getPosts() {
        return json_decode(file_get_contents($this->posts), true);
    }

    private function savePosts($posts) { 
        file_put_contents($this->posts, json_encode($posts, JSON_PRETTY_PRINT));
    }

    private function error($id) {
        return response()->json(["error" => "Post not found, id: $id"], 404);
    }

    public function index() {
        return response()->json($this->getPosts(), 200);
    }

    public function view($id) {
        $posts = $this->getPosts();
        if (array_key_exists($id, $posts)) {
            return response()->json($posts[$id], 200);
        } else {
            return $this->error($id);
        }
    }

    public function store(Request $request) {
        $posts = $this->getPosts();
        $newPost = $request->only("title", "content");
        $id = count($posts);
        $posts[$id] = $newPost;
        $this->savePosts($posts);
        $newPost["id"] = $id;
        return response()->json($newPost, 201);
    }

    public function update(Request $request, $id) { 
        $posts = $this->getPosts();
        if (!array_key_exists($id, $posts)) {
            return $this->error($id);
        }
        $updatedPost = $request->only("title", "content");
        $posts[$id] = array_merge($posts[$id], $updatedPost);
        $this->savePosts($posts);
        return response()->json($this->posts[$id], 201);
    }

    public function delete($id) { 
        $posts = $this->getPosts();
        if (!array_key_exists($id, $posts)) {
            return $this->error($id);
        }
        unset($posts[$id]);
        $this->savePosts($posts);
        return response()->json(["msg" => "Deleted Successfully"], 200);
    }
}

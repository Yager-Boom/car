<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();
        if (!$about) {
            $about = About::create([
                'title' => '關於我們',
                'content' => '請編輯關於我們的內容',
                'image' => null
            ]);
        }
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $about = About::findOrFail($id);
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $about = About::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['title', 'content']);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($about->image && file_exists(public_path($about->image))) {
                unlink(public_path($about->image));
            }

            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/about'), $filename);
            $data['image'] = 'images/about/' . $filename;
        }

        $about->update($data);

        return redirect()->route('admin.about.index')->with('success', '關於我們更新成功');
    }
}

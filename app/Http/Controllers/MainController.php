<?php

namespace App\Http\Controllers;

use App\Models\PrivateImg;
use App\Models\PublicImg;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function public_index()
    {
        $items = PublicImg::all();
        return view('public_image.index', compact('items'));
    }


    public function public_create()
    {
        return view('public_image.create');
    }


    public function public_store(Request $request)
    {
        $valid = $request->validate([

            'title' => ['required', 'string', 'max:255'],
            'image' => ['required', 'mimes:png,jpg,jpeg', 'max:2048'],
        ]);


        if ($request->hasFile('image'))
            $valid['image'] = $request->file('image')->store('uploads/img', 'public');

        if (PublicImg::create($valid))
            return redirect()->route('public.index');
    }
    public function public_edit(PublicImg $item)
    {
        return view('public_image.edit', compact('item'));
    }

    public function public_update(Request $request, PublicImg $item)
    {

        $valid = $request->validate([

            'title' => ['required', 'string', 'max:255'],
            'image' => ['required', 'mimes:png,jpg,jpeg', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            if (Storage::disk('public')->exists($item->getRawOriginal('image')))
                Storage::disk('public')->delete($item->getRawOriginal('image'));
            $valid['image'] = $request->file('image')->store('uploads/img', 'public');
        }

        if ($item->update($valid))
            return redirect()->route('public.index');
    }


    public function public_delete(PublicImg $item)
    {
        if (Storage::disk('public')->exists($item->getRawOriginal('image')))
            Storage::disk('public')->delete($item->getRawOriginal('image'));

        $item->delete();

        return redirect()->route('public.index');
    }


    public function private_index()
    {
        $private_items = PrivateImg::all();
        return view('private_image.index', compact('private_items'));
    }

    public function private_create()
    {
        return view('private_image.create');
    }



    public function private_store(Request $request)
    {
        $valid = $request->validate([

            'title' => ['required', 'string', 'max:255'],
            'image' => ['required', 'mimes:png,jpg,jpeg', 'max:2048'],
        ]);


        if ($request->hasFile('image'))
            $valid['image'] = $request->file('image')->store('uploads/img', 'public');

        if (PublicImg::create($valid))
            return redirect()->route('public.index');
    }
}
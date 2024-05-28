<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $customTitle = ' - Список слайдерів';
        $sliders = Slider::query()->paginate(5);
        return view('admin.sliders.index', compact('customTitle', 'sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $customTitle = ' - Новий слайд';
        return view('admin.sliders.create', compact('customTitle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request['is_active'] = isset($request['is_active']);
        $request->validate([
            'name' => 'required|string|max:255|min:1',
            'title' => 'nullable|string|max:500',
            'tagline' => 'nullable|string|max:500',
        ]);

        $data = $request->all();
        $data['photo'] = Slider::uploadSlider($data);
        Slider::query()->create($data);
        $request->session()->flash('success', 'Слайд додано');
        return redirect()->route('sliders.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Slider $slider)
    {
        $customTitle = ' - Редагування слайду ' . $slider->name;
        return view('admin.sliders.edit', compact('slider', 'customTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Slider $slider)
    {
        $request['is_active'] = isset($request['is_active']);
        $request->validate([
            'name' => 'required|string|max:255|min:1',
            'title' => 'nullable|string|max:500',
            'tagline' => 'nullable|string|max:500',
        ]);

        $data = $request->all();
        $data['photo'] = Slider::uploadSlider($data);
        if ($slider->photo && !str_starts_with($data['base64image'], 'front')) {
            Storage::delete($slider->photo);
        }

        $slider->update($data);
        $request->session()->flash('success', 'Інформація оновлена');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Slider $slider)
    {
        if ($slider->photo) {
            Storage::delete($slider->photo);
        }
        $slider->delete();
        return redirect()->route('sliders.index')->with('success', 'Слайд видалено');
    }
}

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
        $cust_title = ' - Список слайдерів';
        $sliders = Slider::query()->paginate(5);
        return view('admin.sliders.index', compact('cust_title', 'sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $cust_title = ' - Новий слайд';
        return view('admin.sliders.create', compact('cust_title'));
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Slider $slider)
    {
        $cust_title = ' - Редагування слайду ' . $slider->name;
        return view('admin.sliders.edit', compact('slider', 'cust_title'));
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
        if ($slider->photo && !str_starts_with($data['base64image'], 'front')) Storage::delete($slider->photo);

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
        if ($slider->photo) Storage::delete($slider->photo);
        $slider->delete();
        return redirect()->route('sliders.index')->with('success', 'Слайд видалено');
    }
}

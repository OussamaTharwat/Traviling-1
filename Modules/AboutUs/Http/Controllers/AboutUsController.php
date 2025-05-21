<?php

namespace Modules\AboutUs\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Illuminate\Support\Facades\DB;
use Modules\AboutUs\Http\Requests\AboutUsRequest;
use Modules\AboutUs\Models\AboutUs;
use Modules\AboutUs\Transformers\AboutUsResource;

class AboutUsController extends Controller
{
    use HttpResponse;

    public function show()
    {
        $data = AboutUs::query()->with('image')->first();

        return $this->okResponse(new AboutUsResource($data));
    }

    public function update(AboutUsRequest $request)
    {
        DB::transaction(function () use ($request) {
            $aboutUs = AboutUs::firstOrFail();

            $data = $request->validated();
            $aboutUs->update([
                'title_about' => $data['title_about'] ?? $aboutUs->title_about,
                'description_about' => $data['description_about'] ?? $aboutUs->description_about,
                'title_mission' => $data['title_mission'] ?? $aboutUs->title_mission,
                'description_mission' => $data['description_mission'] ?? $aboutUs->description_mission,
                'title_vision' => $data['title_vision'] ?? $aboutUs->title_vision,
                'description_vision' => $data['description_vision'] ?? $aboutUs->description_vision,
                'youtube_link' => $data['youtube_link'] ?? $aboutUs->youtube_link,
            ]);

            if ($request->hasFile('about_us_image')) {
                $aboutUs->resetImage();
                $aboutUs->addMedia($request->file('about_us_image'))->toMediaCollection('about_us_image');
            }
        });

        return $this->okResponse(message: translate_success_message('about_us', 'updated'));
    }


}

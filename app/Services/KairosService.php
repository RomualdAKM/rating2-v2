<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class KairosService
{
    protected $appId;
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->appId = config('services.kairos.app_id');
        $this->apiKey = config('services.kairos.api_key');
        $this->baseUrl = 'https://api.kairos.com';
    }

    /**
     * Enroll a face into the gallery.
     *
     * @param string $image
     * @param string $subjectId
     * @param string $galleryName
     * @return array
     */
    public function enroll($image, $subjectId, $galleryName)
    {
        $response = Http::withHeaders([
            'app_id' => $this->appId,
            'app_key' => $this->apiKey,
        ])->post($this->baseUrl . '/enroll', [
            'image' => $image,
            'subject_id' => $subjectId,
            'gallery_name' => $galleryName,
        ]);

        return $response->json();
    }

    

    /**
     * Recognize a face from the gallery.
     *
     * @param string $image
     * @param string $galleryName
     * @return array
     */
    public function recognize($image, $galleryName)
    {
        $response = Http::withHeaders([
            'app_id' => $this->appId,
            'app_key' => $this->apiKey,
        ])->post($this->baseUrl . '/recognize', [
            'image' => $image,
            'gallery_name' => $galleryName,
        ]);

        return $response->json();
    }

    

    /**
     * Remove a face from the gallery.
     *
     * @param string $subjectId
     * @param string $galleryName
     * @return array
     */
    public function remove($subjectId, $galleryName)
    {
        $response = Http::withHeaders([
            'app_id' => $this->appId,
            'app_key' => $this->apiKey,
        ])->post($this->baseUrl . '/gallery/remove_subject', [
            'subject_id' => $subjectId,
            'gallery_name' => $galleryName,
        ]);

        return $response->json();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CkeditorController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Uloženie súboru do storage
        $file = $request->file('upload');
        $path = $file->store('images', 'public'); // Uloží do storage/app/public/images

        // Prípadne môžete poslať ďalšie údaje spolu so súborom
        $additionalData = $request->only(['extra_field_1', 'extra_field_2']); // Doplnkové údaje

        // Uloženie do MediaLibrary (pre uloženie súboru do media)
        $media = Media::create([
            'collection_name' => 'ckeditor', // Alebo ak máte vlastné kolekcie
            'name' => $file->getClientOriginalName(),
            'file_name' => basename($path),
            'mime_type' => $file->getMimeType(),
            'disk' => 'public',
            'size' => $file->getSize(),
            'custom_properties' => $additionalData, // Môžete pridať aj doplňujúce údaje
            'manipulations' => [],
            'generated_conversions' => [],
            'responsive_images' => [],
        ]);

        // Vrátenie odpovede s URL k obrázku
        return response()->json([
            'url' => Storage::url($path), // Vráti URL pre zobrazenie obrázku
            'media_id' => $media->id,     // ID media pre ďalšie spracovanie
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Media extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = [
        'full_url'
    ];

    public function getFilepathAttribute()
    {
        return 'media/' . auth()->id() . '/' . $this->created_at->format('Y') . '/' . $this->created_at->format('m');
    }

    public function getFullUrlAttribute()
    {
        return url($this->filepath);
    }

    public function model() : MorphTo
    {
        return $this->morphTo();
    }

    public function addMedia()
    {
        $file = request()->file('file');

        $file->store('media/' . auth()->id() . '/' . now()->format('Y') . '/' . now()->format('m'), 'public');

        $media = self::create([
            'filename' => $file->hashName(),
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'user_id' => auth()->id()
        ]);

        return $media;
    }
}

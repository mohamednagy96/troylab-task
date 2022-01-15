<?php

namespace App\Traits;

trait FileTrait
{
    public function saveFiles($files, $collection = null, $hasDefault = true, $disk = 'public', $filename = null)
    {

        $collection = $collection ?? $this->mediaCollection;

        if (is_array($files)) {

            foreach ($files as $key => $file) {

                $media = $this->addMedia($file)->usingFileName(time().'.'.$file->extension())->toMediaCollection($collection, $disk);

                    if ($hasDefault) {
                        if ($key == 0 && $this->getMedia($collection)->count() == 1) {
                            $media->update([
                                'isDefault' => 1,
                            ]);
                        }
                }
            }
        } else {
            $filename = $filename ? $filename.'.'.$files->extension() : time().'.'.$files->extension();
            $media = $this->addMedia($files)->usingFileName($filename)->toMediaCollection($collection, $disk);

            if ($hasDefault) {

                $media->update([
                    'isDefault' => 1,
                ]);
            }
        }

        return $media;
    }

    public function updateFile($files, $collection = null, $hasDefault = true, $disk = 'public')
    {
        $collection = $collection ? $collection : ($this->mediaCollection ?? null);

        $this->clearMediaCollection($collection);
        $this->saveFiles($files, $collection , $hasDefault = true, $disk = 'public');
    }

    public function getDefaultImageUrlAttribute(): string
    {
        if ($image = $this->getMedia($this->mediaCollection)->where('isDefault', 1)->first()) {

            return $image->getFullUrl();

        }

        return asset('/images/default.jpg');
    }

    public function getImgUrlAttribute(): string
    {
        if ($image = $this->getMedia($this->mediaCollection)->where('isDefault', 1)->first()) {

            return $image->getFullUrl();

        }

        return asset('/images/default.jpg');
    }

    public function getImagesUrlAttribute(): array
    {
        $images = $this->getMedia($this->mediaCollection)->sortBy('isDefault')->map(function ($image) {
            return $image->getFullUrl();
        })->toArray();

        return $images;
    }

    public function getImagesAttribute()
    {
        return $this->getMedia($this->mediaCollection);
    }

    public function saveVideo($file, $collection = null, $disk = null)
    {
        $this->addMedia($file)->toMediaCollection($collection, $disk);
    }

    // public function getImgUrlAttribute()
    // {
    //     return $this->image ? $this->image->getUrl() : asset('images/default.jpg');
    // }

    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this->addMediaConversion('thumb')
    //         ->fit(Manipulations::FIT_FILL, 800, 1000);
    // }

}

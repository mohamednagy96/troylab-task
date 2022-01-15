<?php

namespace App\Console\Commands;

use App\Models\Content;
use App\Models\Video;
use FFMpeg\Format\Video\X264;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\LaravelFFMpeg\Exporters\HLSExporter;
use ProtoneMedia\LaravelFFMpeg\Exporters\HLSVideoFilters;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;
use Spatie\MediaLibrary\Models\Media;

class ProcessVideoUpload extends Command
{

    public $media;
    public $content;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'video-upload:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert the uploaded video into HLS.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $lowFormat  = (new X264('aac'))->setKiloBitrate(500);
        // $highFormat = (new X264('aac'))->setKiloBitrate(1000);

        // $this->info('Converting test2.mp4');

        // // $key = HLSExporter::generateEncryptionKey();

        // FFMpeg::fromDisk('uploads')
        //     ->open('test.mp4')
        //     ->exportForHLS()
        //     // ->withEncryptionKey($key)
        //     ->withRotatingEncryptionKey(function($filename , $contents){
        //         Storage::disk('public')->put("videos/test/{$filename}" , $contents);
        //     })
        //     // ->addFormat($lowFormat, function (HLSVideoFilters $filters) {
        //     //     $filters->resize(1280, 720);
        //     // })
        //     ->addFormat($highFormat)
        //     ->onProgress(function ($progress) {
        //         $this->info("Progress: {$progress}%");
        //     })
        //     ->toDisk('public')
        //     ->save('videos/test/test.m3u8');

        // $this->info('Done!');

        $this->media = Media::find(50);
        $this->content = Content::find($this->media->model_id);


        // dd($this->media->getPath());

        $highFormat = (new X264('aac'))->setKiloBitrate(1000);

        $video = new Video;
        $video->name = $this->media->name;
        $video->file_name = "{$this->media->file_name}";
        $video->status = 'in progress';
        $video->disk = 'public-videos';
        $video->save();

        $this->content->update([
            'video_id' => $video->id
        ]);

        FFMpeg::fromDisk('videos')
            ->open("{$this->media->id}/{$this->media->file_name}")
            ->exportForHLS()
            ->withRotatingEncryptionKey(function($filename , $contents) use ($video){
                Storage::disk('secrets')->put("{$video->id}/{$filename}" , $contents);
            })
            ->addFormat($highFormat)
            ->onProgress(function ($progress) use ($video){
                $video->progress = $progress;
                $video->save();
            })
            ->toDisk('public-videos')
            ->save("{$video->id}/{$video->file_name}.m3u8");

        $video->status = 'ready';
        $video->save();
    }
}

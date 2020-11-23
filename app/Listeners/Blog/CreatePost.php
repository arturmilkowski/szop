<?php

declare(strict_types=1);

namespace App\Listeners\Blog;

// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;
use App\Events\EditPost;
use App\Services\Upload;

class CreatePost
{
    private $upload;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Upload $upload)
    {
        $this->upload = $upload;
    }

    /**
     * Handle the event.
     *
     * @param EditPost $event Edit Post Event
     * 
     * @return void
     */
    public function handle(EditPost $event): void
    {
        $imgName = $this->saveImgToStorage($event);
        if ($imgName) {
            $this->saveImgNameToDb($event, $imgName);
        }
        Cache::flush();
    }

    /**
     * Saves image to disc/server.
     *
     * @param EditPost $event Event
     * 
     * @return string
     */
    private function saveImgToStorage(EditPost $event): string
    {
        $imgName = '';
        if ($event->img) {
            $img = $event->img;
            $imgName = $this->upload->setImgName($img, $event->post->slug);
            $img->storeAs(
                config('settings.storage.posts_images_path'),
                $imgName
            );
        }

        return $imgName;
    }

    /**
     * Saves image name/path to database.
     *
     * @param EditPost $event   Event
     * @param string   $imgName Image name
     * 
     * @return boolean
     */
    private function saveImgNameToDb(EditPost $event, string $imgName): bool
    {
        $event->post->img = $imgName;
        return $event->post->save();
    }
}

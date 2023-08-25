<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class File
{
    /**
     * Store file in the given location.
     *
     * @param Request $request  Request
     * @param string  $filepath Filepath
     * @param string  $filename Filename
     * 
     * @return string|null
     */
    public static function store(Request $request, string $filepath, string $filename = ''): ?string
    {
        $file = $request->file('img');
        if ($file) {
            if ($filename) {
                $path = $request->file('img')->storeAs($filepath, $filename);

                return $path;
            }

            $path = $request->file('img')->store($filepath);

            return $path;
        }

        return null;
    }

    /**
     * Update file.
     *
     * @param Request     $request  Request
     * @param string|null $oldImg   Existing file path
     * @param string      $filepath Storage file path
     * 
     * @return string|null
     */
    public static function update(
        Request $request,
        ?string $oldImg,
        string $filepath
    ): ?string {
        $file = $request->file('img'); // new img file
        if ($file) { // file was send
            if ($oldImg) {
                Storage::delete($oldImg); // delete old file
            }

            $path = $request->file('img')->store($filepath); // store new file

            return $path;
        }

        return null;
    }
}

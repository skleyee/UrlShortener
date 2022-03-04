<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Link extends Model
{
    use HasFactory;

    public static function saveLink($originalLink, $shortUrl)
    {
        if (DB::table('links')->where('original_link', $originalLink)->doesntExist()) {
            return DB::table('links')->insert([
                'original_link' => $originalLink,
                'short_link' => $shortUrl
            ]);
        }
        return true;
    }

    public static function getShortLinkByOriginal($originalLink) {
        return DB::table('links')->select('short_link')->where('original_link', $originalLink)->first()->short_link;
    }
}

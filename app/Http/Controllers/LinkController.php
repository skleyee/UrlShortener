<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use \Illuminate\Support\Str;

class LinkController extends Controller
{
    public function index() {
        return view('main');
    }

    public function createAndGetShortLink(Request $req) {
        $req = $req->all();
        $originalLink = $req['link'];
        $shortLink = 'https://' . Str::random(mt_rand(3, 6));

        $isSaveLink = Link::saveLink($originalLink, $shortLink);
        if (!$isSaveLink) {
            return ['status' => 'error'];
        }
        return ['status' => 'ok', 'original_link' => $originalLink, 'short_link' => Link::getShortLinkByOriginal($originalLink)];

    }
}

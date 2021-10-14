<?php

namespace App\Http\Controllers;

use App\Core\Contracts\Link\LinkRepository;

class RedirectController extends Controller
{
    public function l(string $token, LinkRepository $linkRepository)
    {
        $link = $linkRepository->getByResultLink('/l/' . $token);
        if (!$link) {
            abort(404);
        }
        return redirect($link->baseLink());
    }
}

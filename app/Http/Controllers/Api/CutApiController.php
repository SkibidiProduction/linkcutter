<?php

namespace App\Http\Controllers\Api;

use App\Core\Contracts\Link\LinkRepository;
use App\Core\Implementations\Link\LinkService;
use App\Http\Requests\CutApiStoreRequest;
use App\Http\Resources\CutStoreResource;
use http\Exception\BadUrlException;
use Illuminate\Http\JsonResponse;

class CutApiController extends ApiController
{
    /**
     * @param CutApiStoreRequest $request
     * @param LinkService $linkService
     * @param LinkRepository $linkRepository
     * @return JsonResponse
     */
    public function store(CutApiStoreRequest $request, LinkService $linkService, LinkRepository $linkRepository): JsonResponse
    {
        if (!$linkService->create($request->get('url'))) {
            throw new BadUrlException('Something gone wrong');
        }
        $link = $linkRepository->getByBaseLink($request->get('url'));

        return $this->success(new CutStoreResource($link));
    }
}

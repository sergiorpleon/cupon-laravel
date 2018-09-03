<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetiendasAPIRequest;
use App\Http\Requests\API\UpdatetiendasAPIRequest;
use App\Models\tiendas;
use App\Repositories\tiendasRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Controller\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class tiendasController
 * @package App\Http\Controllers\API
 */

class tiendasAPIController extends AppBaseController
{
    /** @var  tiendasRepository */
    private $tiendasRepository;

    public function __construct(tiendasRepository $tiendasRepo)
    {
        $this->tiendasRepository = $tiendasRepo;
    }

    /**
     * Display a listing of the tiendas.
     * GET|HEAD /tiendas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tiendasRepository->pushCriteria(new RequestCriteria($request));
        $this->tiendasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tiendas = $this->tiendasRepository->all();

        return $this->sendResponse($tiendas->toArray(), 'Tiendas retrieved successfully');
    }

    /**
     * Store a newly created tiendas in storage.
     * POST /tiendas
     *
     * @param CreatetiendasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatetiendasAPIRequest $request)
    {
        $input = $request->all();

        $tiendas = $this->tiendasRepository->create($input);

        return $this->sendResponse($tiendas->toArray(), 'Tiendas saved successfully');
    }

    /**
     * Display the specified tiendas.
     * GET|HEAD /tiendas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var tiendas $tiendas */
        $tiendas = $this->tiendasRepository->findWithoutFail($id);

        if (empty($tiendas)) {
            return $this->sendError('Tiendas not found');
        }

        return $this->sendResponse($tiendas->toArray(), 'Tiendas retrieved successfully');
    }

    /**
     * Update the specified tiendas in storage.
     * PUT/PATCH /tiendas/{id}
     *
     * @param  int $id
     * @param UpdatetiendasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetiendasAPIRequest $request)
    {
        $input = $request->all();

        /** @var tiendas $tiendas */
        $tiendas = $this->tiendasRepository->findWithoutFail($id);

        if (empty($tiendas)) {
            return $this->sendError('Tiendas not found');
        }

        $tiendas = $this->tiendasRepository->update($input, $id);

        return $this->sendResponse($tiendas->toArray(), 'tiendas updated successfully');
    }

    /**
     * Remove the specified tiendas from storage.
     * DELETE /tiendas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var tiendas $tiendas */
        $tiendas = $this->tiendasRepository->findWithoutFail($id);

        if (empty($tiendas)) {
            return $this->sendError('Tiendas not found');
        }

        $tiendas->delete();

        return $this->sendResponse($id, 'Tiendas deleted successfully');
    }
}

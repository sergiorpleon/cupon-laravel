<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetiendasRequest;
use App\Http\Requests\UpdatetiendasRequest;
use App\Repositories\tiendasRepository;
use InfyOm\Generator\Controller\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class tiendasController extends AppBaseController
{
    /** @var  tiendasRepository */
    private $tiendasRepository;

    public function __construct(tiendasRepository $tiendasRepo)
    {
        $this->tiendasRepository = $tiendasRepo;
    }

    /**
     * Display a listing of the tiendas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tiendasRepository->pushCriteria(new RequestCriteria($request));
        $tiendas = $this->tiendasRepository->all();

        return view('tiendas.index')
            ->with('tiendas', $tiendas);
    }

    /**
     * Show the form for creating a new tiendas.
     *
     * @return Response
     */
    public function create()
    {
        return view('tiendas.create');
    }

    /**
     * Store a newly created tiendas in storage.
     *
     * @param CreatetiendasRequest $request
     *
     * @return Response
     */
    public function store(CreatetiendasRequest $request)
    {
        $input = $request->all();

        $tiendas = $this->tiendasRepository->create($input);

        Flash::success('Tiendas saved successfully.');

        return redirect(route('tiendas.index'));
    }

    /**
     * Display the specified tiendas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tiendas = $this->tiendasRepository->findWithoutFail($id);

        if (empty($tiendas)) {
            Flash::error('Tiendas not found');

            return redirect(route('tiendas.index'));
        }

        return view('tiendas.show')->with('tiendas', $tiendas);
    }

    /**
     * Show the form for editing the specified tiendas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tiendas = $this->tiendasRepository->findWithoutFail($id);

        if (empty($tiendas)) {
            Flash::error('Tiendas not found');

            return redirect(route('tiendas.index'));
        }

        return view('tiendas.edit')->with('tiendas', $tiendas);
    }

    /**
     * Update the specified tiendas in storage.
     *
     * @param  int              $id
     * @param UpdatetiendasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetiendasRequest $request)
    {
        $tiendas = $this->tiendasRepository->findWithoutFail($id);

        if (empty($tiendas)) {
            Flash::error('Tiendas not found');

            return redirect(route('tiendas.index'));
        }

        $tiendas = $this->tiendasRepository->update($request->all(), $id);

        Flash::success('Tiendas updated successfully.');

        return redirect(route('tiendas.index'));
    }

    /**
     * Remove the specified tiendas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tiendas = $this->tiendasRepository->findWithoutFail($id);

        if (empty($tiendas)) {
            Flash::error('Tiendas not found');

            return redirect(route('tiendas.index'));
        }

        $this->tiendasRepository->delete($id);

        Flash::success('Tiendas deleted successfully.');

        return redirect(route('tiendas.index'));
    }
}

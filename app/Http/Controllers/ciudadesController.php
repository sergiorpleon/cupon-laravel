<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateciudadesRequest;
use App\Http\Requests\UpdateciudadesRequest;
use App\Repositories\ciudadesRepository;
use InfyOm\Generator\Controller\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ciudadesController extends AppBaseController
{
    /** @var  ciudadesRepository */
    private $ciudadesRepository;

    public function __construct(ciudadesRepository $ciudadesRepo)
    {
        $this->ciudadesRepository = $ciudadesRepo;
    }

    /**
     * Display a listing of the ciudades.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ciudadesRepository->pushCriteria(new RequestCriteria($request));
        $ciudades = $this->ciudadesRepository->all();

        return view('ciudades.index')
            ->with('ciudades', $ciudades);
    }

    /**
     * Show the form for creating a new ciudades.
     *
     * @return Response
     */
    public function create()
    {
        return view('ciudades.create');
    }

    /**
     * Store a newly created ciudades in storage.
     *
     * @param CreateciudadesRequest $request
     *
     * @return Response
     */
    public function store(CreateciudadesRequest $request)
    {
        $input = $request->all();

        $ciudades = $this->ciudadesRepository->create($input);

        Flash::success('Ciudades saved successfully.');

        return redirect(route('ciudades.index'));
    }

    /**
     * Display the specified ciudades.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ciudades = $this->ciudadesRepository->findWithoutFail($id);

        if (empty($ciudades)) {
            Flash::error('Ciudades not found');

            return redirect(route('ciudades.index'));
        }

        return view('ciudades.show')->with('ciudades', $ciudades);
    }

    /**
     * Show the form for editing the specified ciudades.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ciudades = $this->ciudadesRepository->findWithoutFail($id);

        if (empty($ciudades)) {
            Flash::error('Ciudades not found');

            return redirect(route('ciudades.index'));
        }

        return view('ciudades.edit')->with('ciudades', $ciudades);
    }

    /**
     * Update the specified ciudades in storage.
     *
     * @param  int              $id
     * @param UpdateciudadesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateciudadesRequest $request)
    {
        $ciudades = $this->ciudadesRepository->findWithoutFail($id);

        if (empty($ciudades)) {
            Flash::error('Ciudades not found');

            return redirect(route('ciudades.index'));
        }

        $ciudades = $this->ciudadesRepository->update($request->all(), $id);

        Flash::success('Ciudades updated successfully.');

        return redirect(route('ciudades.index'));
    }

    /**
     * Remove the specified ciudades from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ciudades = $this->ciudadesRepository->findWithoutFail($id);

        if (empty($ciudades)) {
            Flash::error('Ciudades not found');

            return redirect(route('ciudades.index'));
        }

        $this->ciudadesRepository->delete($id);

        Flash::success('Ciudades deleted successfully.');

        return redirect(route('ciudades.index'));
    }
}

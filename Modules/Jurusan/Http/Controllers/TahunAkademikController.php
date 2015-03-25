<?php namespace Modules\Jurusan\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use Modules\Jurusan\Entities\TahunAkademik;
use Zofe\Rapyd\DataGrid\DataGrid;

class TahunAkademikController extends Controller {

	protected $moduleSlug = 'jurusan';
	protected $moduleName = 'Jurusan';
	protected $submodSlug = 'tahun_akademik';
	protected $submodName = 'Tahun Akademik';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = TahunAkademik::all();

		return View::make('jurusan::tahun_akademik.index')->with('data', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//return View::make('jurusan::tahun_akademik.input');

		$data = DataGrid::source(new TahunAkademik);

		$info['moduleSlug'] = $this->moduleSlug;
		$info['moduleName'] = $this->moduleName;
		$info['submodSlug'] = $this->submodSlug;
		$info['submodName'] = $this->submodName;
		$info['submodAction'] = 'List';

		//$moduleName = $this->moduleName;
		//$moduleAction = 'List';

		return View::make('jurusan::tahun_akademik.create', compact('data', 'info'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		TahunAkademik::create($request->all());

		redirect(url('/jurusan/tahun_akademik/create'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data = TahunAkademik::find($id);

		return View::make('jurusan::tahun_akademik.show')->with('data', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data = TahunAkademik::find($id);

		return View::make('jurusan::tahun_akademik.input')->with('data', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$data = TahunAkademik::find($id);
		$data->nama_tahun_akademik = $request->nama_tahun_akademik;
		$data->semester = $request->semester;
		$data->status = $request->status;
		$data->created_by = 1;
		$data->updated_by = 1;
		$data->save();

		redirect(url('/jurusan/tahun_akademik/edit'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$data = TahunAkademik::find($id);
		$data->delete();

		redirect(url('/jurusan/tahun_akademik'));
	}
	
}
<?php

class PhotoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$photos = Photo::get();
		 
		return Response::json(array(
			'error' => false,
			'photos' => $photos->toArray()),
			200
		);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		Photo::create(Input::all());
		 
		return Response::json(array('error' => false), 200);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$photo = Photo::where('id', $id)
			->take(1)
			->get();
		 
		return Response::json(array(
			'error' => false,
			'photos' => $photo->toArray()),
			200
		);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$photo = Photo::find($id);	 
		$user->update(Input::all());
		 
		return Response::json(array(
			'error' => false,
			'message' => 'photo updated'),
			200
		);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Photo::find($id)->delete();
		 
		return Response::json(array(
			'error' => false,
			'message' => 'photo deleted'),
			200
		);
	}


}

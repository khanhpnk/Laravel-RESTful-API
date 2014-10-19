<?php
class PhotoController extends RestController 
{
	/**
	 * Specifies the attributes should be fillable.
	 * @var array
	 */
	protected $fieldsFillable = ['id', 'name', 'slug', 'description', 'status', 'created_at', 'updated_at'];
	
	/**
	 * Specifies the attributes should be fillable by default.
	 * @var array
	 */
	protected $fields = ['id', 'name'];
	
	/**
	 * Specifies the attributes should be sortable.
	 * @var array
	 */
	protected $fieldsSortable = ['id', 'name', 'slug'];
	
	/**
	 * Specifies the attributes should be sortable by default.
	 * @var array
	 */
	protected $sorts = ['-id'];
	
	protected $limit = 2;
	
	protected $offset = 0;
	
	private function _parseInputs()
	{
		$input = Input::all();
	
		// SELECT
		if (Input::has('fields')) {
			$unknownFields = [];
			$this->fields = explode(',', $input['fields']);
			
			foreach ($this->fields as $field) {
				if ( ! in_array($field, $this->fieldsFillable)) {
					$unknownFields[] = $field;
				}
			}
			
			if ($unknownFields) {
				$this->setError('Unknown fields: ' . implode(',', $unknownFields));
				return false;
			}
		}
		
		// ORDER
		if (Input::has('sorts')) {
			$unsortableFields = [];
			$this->sorts = explode(',', $input['sorts']);

			foreach ($this->sorts as $field) {
				if ( ! in_array($field, $this->fieldsSortable) && ! in_array(ltrim($field, '-'), $this->fieldsSortable)) {
					$unsortableFields[] = $field;
				}
			}
				
			if ($unsortableFields) {
				$this->setError('Unsortable fields: ' . implode(',', $unsortableFields));
				return false;
			}
		}
		
		// LIMIT
		if (Input::has('limit')) {
			if (false === filter_var($input['limit'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]])) {
				$this->setError('Param limit must be an integer greater than or equal to 1');
				return false;
			}
			
			$this->limit = $input['limit'];
		}
		
		if (Input::has('offset')) {
			if (false === filter_var($input['offset'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 0]])) {
				$this->setError('Param offset must be an integer greater than or equal to 0');
				return false;
			}
			
			$this->offset = $input['offset'];
		}
	}
	
	private function _eagerLoadingComment($photos) 
	{
		$photoIds = [];
		$photosReturn = [];
		foreach ($photos as $photo) {
			$photoIds[] = $photo['id'];
			$photosReturn[$photo['id']] = $photo;
		}
			
		$commentModel = new Comment();
		$comments = $commentModel->whereIn('photo_id', $photoIds)->get()->toArray();

		foreach ($comments as $comment) {
			$photosReturn[$comment['photo_id']]['comments'][] = $comment;
		}
		
		return $photosReturn;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{		
		$this->_parseInputs();
		if ($this->error) {
			if ('json' == $this->format) {
				return Response::json(array(
						'error' => [
							'message' => $this->error['message'],
							'code' => $this->error['subCode']
						]
					), $this->error['code']
				);
			} elseif ('xml' == $this->format) {
				return 'xml';
			}
		}
		
		$photoModel = new Photo();
		
		// SELECT
		foreach ($this->fields as $field) {
			$photoModel = $photoModel->addSelect("photos.$field");
		}
		
		// ORDER
		foreach ($this->sorts as $field) {
			if ('-' == $field[0]) {
				$photoModel = $photoModel->orderBy('photos.' . ltrim($field, '-'), 'desc');
			} else {
				$photoModel = $photoModel->orderBy("photos.$field", 'asc');
			}
		}
		
		// LIMIT
		$photoModel = $photoModel->skip($this->offset)->take($this->limit);
		
		$photos = $photoModel->get()->toArray();
		
		// Eager Loading comment
		if ($photos) {
			$photos = $this->_eagerLoadingComment($photos);
		} else {
			return Response::json(array(
					'error' => [
						'message' => 'Resource not be found',
						'code' => '404'
					]
				), 404
			);
		}
		
		
		 
		return Response::json([
				'data' => $photos
			], 200
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
		$name = Input::get('name');
		
		$photo = new Photo();
		$photo->name = $name;
		$photo->save();
		 
		return Response::json(array(
				'message' => 'Created'
			), 201
		);
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
				'data' => $photo->toArray()
			), 200
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
		$name = Input::get('name');
		
		$photo = Photo::find($id);	 
		$photo->name = $name;
		$photo->save();
		 
		return Response::json(array(
				'message' => 'photo updated'
			), 200
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
				'message' => 'photo deleted'
			), 200
		);
	}


}

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
	
	private function _eagerLoadingComment() 
	{
		return 'aaaa';
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
		$photos = $this->_eagerLoadingComment();
		if ($this->restResponse->hasError()) {
			//$this->restResponse->response();
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
}

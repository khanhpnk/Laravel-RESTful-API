<?php
class RestController extends Controller 
{	
	protected $restResponse;
	
	public function __construct()
	{
		$this->restResponse = new RestResponse();
		return 'aaa';
		if (Input::has('fields')) {
			$this->setFields(Input::get('fields'));
		}
	}
	
	protected function setFields($fields = '')
	{
		$unknownFields = [];
		$this->fields = explode(',', $fields);
		
		foreach ($this->fields as $field) {
			if ( ! in_array($field, $this->fieldsFillable)) {
				$unknownFields[] = $field;
			}
		}
		
		if ($unknownFields) {
			$this->restResponse->setError('Unknown fields: ' . implode(',', $unknownFields));
			return false;
		}	
	}
	
	private function _parseInputs()
	{	
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
		
// 	/**
// 	 * Catch-all method for requests that can't be matched.
// 	 *
// 	 * @param string $method
// 	 * @param array $parameters
// 	 * @return Response
// 	 * */
// 	public function missingMethod($parameters = array()) 
// 	{
// 		$resp = RestResponseFactory::notfound("", "Method doesn't exists.");
// 		return Response::json($resp);
// 	}
	

}

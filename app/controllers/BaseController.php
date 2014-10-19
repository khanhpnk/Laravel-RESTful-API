<?php

class BaseController extends Controller {
		
	public $code = [
  		'200' => 'OK',
  		// This indicates the request was successful and a resource was created. It is used to confirm success of a PUT or POST request.
  		'201' => 'Created',
  		// When the data does not pass validation, or is in the wrong format
  		'400' => 'Bad Request',
  		// This response indicates that the required resource could not be found.
  		'404' => 'Not Found',
  		// This error indicates that you need to perform authentication before accessing the resource.
  		'401' => 'Unauthorized',
  		// The HTTP method used is not supported for this resource.
  		'405' => 'Method Not Allowed',
  		// This indicates a conflict. For instance, you are using a PUT request to create the same resource twice.
  		'409' => 'Conflict',
  		
  		'500' => 'Internal Server Error',
	];
	
	public function __construct() 
	{
		// (190, subcode 463)Error validating access token: Session has expired on Oct 18, 2014 9:00am. The current time is Oct 18, 2014 10:01am.
	}
	
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}

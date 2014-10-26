<?php
class RestResponse 
{	
	
	/**
	 * Data format expected in the response
	 * @var string
	 */
	protected $format = 'json';
	
	/**
	 * List all supported formats
	 * @var array
	 */
	protected $supportedFormats = [
		'xml'  => 'application/xml',
		'json' => 'application/json'
	];
	
	/**
	 * Error reponse to client
	 * @var array
	 */
	protected $error = [];

	public function __construct() 
	{
		$this->setFormat();
	}
	
	/*
	 * Set data format expected in the response
	 * @return string format
	 */
	protected function setFormat()
	{
		// A format has been passed as an argument in the URL
		if (Input::has('format')) {
			$inputFormat = Input::get('format');
				
			foreach ($this->supportedFormats as $format => $mime) {
				if ($inputFormat == $format) {
					$this->format = $format;
					return true;
				}
			}
		}
	
		// A format has been passed as an Accept in the header
		$acceptHeader = Request::header('Accept');
		if ($acceptHeader) {
			foreach ($this->supportedFormats as $format => $mime) {
				if ($acceptHeader == $mime) {
					$this->format = $format;
					return true;
				}
			}
		}
	}
	
	public function setError($message)
	{
		$this->error = [
  			'message' => $message
		];
	}
	
	public function hasError()
	{
		return ! empty($this->error);
	}
}
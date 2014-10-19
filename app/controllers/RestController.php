<?php
/**
 * Laravel Rest Controller
 *
 * A fully RESTful server implementation for Laravel.
 *
 * @package        	Laravel
 * @author        	Rukan
 */
class RestController extends Controller 
{	

	/**
	 * Block connections from these IP addresses.
	 * @var array
	 */
	protected $ipBlacklist = [];

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
		// Check to see if this IP is Blacklisted
		$this->checkIpBlacklist();
		
		// Find a format for the request
		$this->format = $this->detectInputFormat();
	}
	
	protected function setError($message, $subCode = 400, $code = 400) 
	{
		$this->error = [
			'code'	  => $code,
			'subCode' => $subCode,
			'message' => $message,
		];
	}
	
	/*
	 * Find a format for the request
	 * @return string format
	 */
	protected function detectInputFormat()
	{
		// A format has been passed as an argument in the URL and it is supported
		if (Input::has('format')) {
			$input = Input::get('format');
			
			foreach ($this->supportedFormats as $format => $mime) {
				if ($input == $format) {
					return $format;
				}
			}
		}
		
		// A format has been passed as an Accept in the header and it is supported
		$accept = Request::header('Accept');
		if ($accept) {
			foreach ($this->supportedFormats as $format => $mime) {
				if ($accept == $mime) {
					return $format;
				}
			}
		}
	}
	
	/**
	 * Check to see if this IP is Blacklisted
	 * @return boolean
	 */
	protected function checkIpBlacklist()
	{
		if ($this->ipBlacklist) {
 			if (in_array(Request::getClientIp(), $this->ipBlacklist)) {
 				$this->setError('IP Denied', 401, 401); 				
 				return false;
 			}
		}
	}
}

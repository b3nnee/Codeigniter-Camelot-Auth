<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 *  Twsweb Network
 * 
 *  The codebase for the Twsweb Network sites
 * 
 *  @package         Twsweb Network
 *  @author          Timothy Seebus <Timothyseebus@twsweb-int.com>
 *  @copyright       2011, Timothy Seebus
 *  @link            http://labs.Twsweb-int.com/network
 *  @filesource
 */

class Camelot_driver_saml2 extends Camelot_Driver {

	protected $provider_name;
	protected $provider;


	public function __construct($provider_name){
		parent::__construct('saml2');
		$this->load->model('saml2_metadata_model','metadata_model');
		//$this->load->config(ucfirst($provider_name));
		$this->provider_name = $provider_name;
	}

	public function login($IDP_name = NULL)
	{
		// check last time metadata was updated and update if needed 

		if($IDP_name == NULL){
			echo 'get list of all idps where federation == '.$this->provider_name;
		}else{
			echo 'send auth request to idp '.$IDP_name; 
		}
	}

	public function get_metadata(){
		echo 'get my metadata';
	}

	public function import_metadata($metadata = NULL)
	{
		if(empty($metadata)){
			//$metadata_data = $this->CI->saml2_metadata_model->get_URL_by_Name($this->provider_name);
			// GET all metadata providers
		}else if (is_string($metadata[0])) {
			echo 'name';
			$metadata = $this->CI->saml2_metadata_model->get_URL_by_Name($metadata[0]);
			// get metadata url where federation is the name 
		}else if(is_int($metadata)){
			$metadata = $this->CI->saml2_metadata_model->get_URL_by_ID($metadata[0]);// get metadata url where federation is an id
		}
		var_dump($metadata);

		$metadata_xml = $response = file_get_contents($metadata);
		var_dump($metadata_xml);
	}
}
<?php
	class Submission{
		/**
		 * 
		 * @var MerchantData
		 * 
		 */
		public $model = null;
		
		/**
		 * 
		 * @var string
		 * 
		 * @displayName\Command Status
		 * @display\readOnly,hideOnEmpty
		 * 
		 */
		public $cmdStatus = null;
		
		/**
		 * 
		 * @var string
		 * 
		 * @displayName\Application Status (or error message)
		 * @display\readOnly,hideOnEmpty
		 * 
		 */
		public $textResponse = null;		
		
		/**
		 * 
		 * @var string (uuid/guid)
		 * 
		 * @displayName\Application ID (UUID/GUID supplied by Mercury on submission)
		 * 
		 */
		public $applicationId = null;
		
		/**
		 * 
		 * @var string (int)
		 * 
		 * @displayName\Merchant ID (for an approved application)
		 * @display\readOnly,hideOnEmpty
		 * 
		 */
		public $merchantId = null;
		
		/**
		 * 
		 * @var string (int)
		 * 
		 * @displayName\Terminal ID (for an approved application)
		 * @display\readOnly,hideOnEmpty
		 * 
		 */
		public $terminalId = null;
		
		/**
		 * 
		 * @var array
		 * 
		 */
		public $ValidationErrors = null;
		
		/**
		 * 
		 * @var string
		 * 
		 */
		public $view = null;
	}
?>
<?php
	class MerchantData {
		
		/**
		 * 
		 * @param string $contextName
		 */
		function __construct($contextName){
			$this->ContextName = $contextName;
		}

		/**
		 * 
		 * @var string
		 * 
		 */
		public $ContextName = "Qualified";

		/**
		 *
		 * @var array
		 *
		 */
		public $ValidationErrors = null;
		
		/**
		 * 
		 * @var String
		 * 
		 * @displayName\Title
		 * 
		 */
		public $OwnerTitle = NULL;
		
		/**
		 * 
		 * @var String
		 * 
		 * @displayName\First
		 * @requiredWhen\All
		 * 
		 */
		public $OwnerFirstName = NULL;

		/**
		 * 
		 * @var String
		 * 
		 * @displayName\Middle
		 * 
		 */
		public $OwnerMiddleName = NULL;

		/**
		 * 
		 * @var String
		 * 
		 * @displayName\Last
		 * @requiredWhen\All
		 * 
		 */
		public $OwnerLastName = NULL;

		/**
		 * 
		 * @var String
		 * 
		 * @displayName\Suffix
		 * 
		 */
		public $OwnerSuffix = NULL;

		/**
		 * 
		 * @var Integer
		 * 
		 * @requiredWhen\Qualified
		 * @type\number
		 * 
		 */
		public $OwnerDOBDay = NULL;

		/**
		 * 
		 * @var Integer
		 * 
		 * @requiredWhen\Qualified
		 * @type\number
		 * 
		 */
		public $OwnerDOBMonth = NULL;

		/**
		 * 
		 * @var Integer
		 * 
		 * @requiredWhen\Qualified
		 * @type\number
		 * 
		 */
		public $OwnerDOBYear = NULL;

		/**
		 * 
		 * @var String
		 * 
		 * @displayName\Owner SSN/Personal Tax ID
		 * @requiredWhen\Qualified
		 * 
		 */
		public $OwnerSSN = NULL;

		/**
		 * 
		 * @var String
		 * 
		 * @displayName\Email Address
		 * @requiredWhen\All
		 * 
		 */
		public $OwnerEmail = NULL;

		/**
		 * 
		 * @var String
		 * 
		 * @displayName\Address
		 * @requiredWhen\Qualified
		 * 
		 */
		public $OwnerAddress = NULL;

		/**
		 * 
		 * @var String
		 * 
		 * @displayName\City
		 * @requiredWhen\Qualified
		 * 
		 */
		public $OwnerCity = NULL;

		/**
		 * 
		 * @var String: NULL or valid US or CA state (or 'PR')
		 * 
		 * @displayName\State or Province
		 * @requiredWhen\Qualified
		 * 
		 */
		public $OwnerStateOrProvince = NULL;

		/**
		 * 
		 * @var String
		 * 
		 * @displayName\Zip/Postal Code
		 * @requiredWhen\Qualified
		 * 
		 */
		public $OwnerPostalCode = NULL;

		/**
		 * 
		 *  @var String: NULL or 'US', 'CA', or 'PR' 
		 * 
		 * @displayName\Country
		 * @requiredWhen\Qualified
		 * 
		 */
		public $OwnerCountry = NULL;

		/**
		 * @var String
		 * 
		 * @displayName\Business/DBA Name
		 * @requiredWhen\All
		 * 
		 */
		public $DBAName = NULL;

		/**
		 * @var String
		 * 
		 * @displayName\Street Address
		 * @requiredWhen\Qualified
		 * 
		 */
		public $DBAAddress = NULL;

		/**
		 * 
		 * @var String
		 * 
		 * @displayName\City
		 * @requiredWhen\Qualified
		 * 
		 */
		public $DBACity = NULL;

		/**
		 * 
		 * @var String: NULL or valid US or CA state (or 'PR')
		 * 
		 * @displayName\State or Province
		 * @requiredWhen\Qualified
		 * 
		 */
		public $DBAStateOrProvince = NULL;

		/**
		 * 
		 * @var String
		 * 
		 * @displayName\Zip/Postal Code
		 * @requiredWhen\Qualified
		 * 
		 */
		public $DBAPostalCode = NULL;

		/**
		 * 
		 *  @var String: NULL or 'US', 'CA', or 'PR' 
		 *  
		 * @displayName\Country
		 * @requiredWhen\Qualified
		 * 
		 */
		public $DBACountry = NULL;

		/**
		 * @var String
		 * 
		 * @displayName\Phone
		 * @requiredWhen\All
		 * 
		 */
		public $DBAPhone = NULL;

		/**
		 * @var String
		 * 
		 * @displayName\Extension
		 * 
		 */
		public $DBAExtension = NULL;

		/**
		 * 
		 * @var String
		 * 
		 * @displayName\Legal Business Name
		 * @requiredWhen\Qualified
		 * 
		 */
		public $LegalName = NULL;

		/**
		 * 
		 * @var String
		 * 
		 * @displayName\Address
		 * @requiredWhen\Qualified
		 * 
		 */
		public $LegalAddress = NULL;

		/**
		 * 
		 * @var String
		 * 
		 * @displayName\City
		 * @requiredWhen\Qualified
		 * 
		 */
		public $LegalCity = NULL;

		/**
		 * 
		 * @var String: NULL or valid US or CA state (or 'PR')
		 * 
		 * @displayName\State or Province
		 * @requiredWhen\Qualified
		 * 
		 */
		public $LegalStateOrProvince = NULL;

		/**
		 * 
		 * @var String
		 * 
		 * @displayName\Zip/Postal Code
		 * @requiredWhen\Qualified
		 * 
		 */
		public $LegalPostalCode = NULL;

		/**
		 * 
		 *  @var String: NULL or 'US', 'CA', or 'PR' 
		 * 
		 * @displayName\Country
		 * @requiredWhen\Qualified
		 * 
		 */
		public $LegalCountry = NULL;

		/**
		 * 
		 * @var String
		 * 
		 * @displayName\Phone
		 * 
		 */
		public $LegalPhone = NULL;

		/**
		 * 
		 * @var String
		 *
		 * @displayName\Extension
		 * 
		 */
		public $LegalExtension = NULL;

		/**
		 * 
		 * @var String
		 * 
		 * @displayName\Product or Service Sold
		 * @requiredWhen\Qualified
		 * 
		 */
		public $ProductServiceSold = NULL;

		/**
		 * 
		 * @var String
		 * 
		 * @displayName\Market
		 * @requiredWhen\Qualified
		 * 
		 */
		public $Market = NULL;

		/**
		 * 
		 * @var String
		 * 
		 * @displayName\SIC Code
		 * @requiredWhen\Qualified
		 * 
		 */
		public $SIC = NULL;

		/**
		 * 
		 * @var String
		 * 
		 * @displayName\Business Tax ID
		 * @requiredWhen\Qualified
		 * 
		 */
		public $TaxId = NULL;

		/**
		 * 
		 * @var Decimal
		 * 
		 * @displayName\Average Ticket
		 * @requiredWhen\Qualified
		 * @type\money
		 * 
		 */
		public $AvgTicket = NULL;

		/**
		 * 
		 * @var Decimal
		 * 
		 * @displayName\Daily Volume
		 * @requiredWhen\Qualified
		 * @type\money
		 * 
		 */
		public $DailyVolume = NULL;

		/**
		 * 
		 * @var Decimal
		 * 
		 * @displayName\Annual Visa/MC/Discover Sales
		 * @requiredWhen\Qualified
		 * @type\money
		 * 
		 */
		public $AnnualSalesVisaMc = NULL;

		/**
		 * 
		 * @var String: NULL or 'USD' or 'CAD'
		 * 
		 * @displayName\Currency Type (USD/CAD)
		 * @requiredWhen\Qualified
		 * 
		 */
		public $CurrencyType = NULL;

		/**
		 * 
		 * @var Integer: NULL or 0 - 100
		 * 
		 * @displayName\Cards Swiped %
		 * @requiredWhen\Qualified
		 * @type\number
		 * 
		 */
		public $PercentRetailSwipedTransactions = NULL;

		/**
		 * 
		 * @var Integer: NULL or 0 - 100
		 * 
		 * @displayName\Manually Keyed with Imprinter %
		 * @requiredWhen\Qualified
		 * @type\number
		 * 
		 */
		public $PercentCardKeyedTransactions = NULL;

		/**
		 * 
		 * @var Integer: NULL or 0 - 100
		 * 
		 * @displayName\Mail Order/ Phone/ Internet %
		 * @requiredWhen\Qualified
		 * @type\number
		 * 
		 */
		public $PercentMailOrderTransactions = NULL;

		/**
		 * 
		 * @var Integer: NULL or 0 - 100
		 * 
		 * @displayName\Total %
		 * @requiredWhen\Qualified
		 * @type\number
		 * 
		 */
		public $PercentTotalTransaction = NULL;


		//Banking information
		
		/**
		 * 
		 * @var String
		 * 
		 * @displayName\Account Number
		 * 
		 */
		public $Dda = NULL;

		/**
		 * 
		 * @var String
		 * 
		 * @displayName\Routing Number
		 * 
		 */
		public $Routing = NULL;

		/**
		 * 
		 * @var String
		 * 
		 * @displayName\Financial Institution Name
		 * 
		 */
		public $FinancialInstitutionName = NULL;

		/**
		 * 
		 * @var Boolean
		 * 
		 * @displayName\Is this a Checking Account?
		 * @type\boolean
		 * 
		 */
		public $IsChecking = NULL;

		/**
		 * 
		 * @var String
		 * 
		 * @displayName\Financial Institution Number(FIN)
		 * 
		 */
		public $FinancialInstitutionNumber = NULL;

		/**
		 * 
		 * @var String
		 * @see OwnershipTypes
		 * 
		 * @displayName\Business Ownership Type
		 * @type\enum
		 * @enumType\OwnershipTypes
		 * 
		 */		
		public $OwnershipType = NULL;

		/**
		 * @var String
		 */
		public $ReferenceString = NULL;
		
	}
?>
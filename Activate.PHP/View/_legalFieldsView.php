<?php
	include("../Helpers/FormHelper.php");
	include("../Model/MerchantData.php");
	
	class _legalFieldsView{
		public static function buildFields( $model)
		{
			 $list = array(
			 		'LegalName',
			 		'LegalAddress',
			 		'LegalCity',
			 		'LegalStateOrProvince',
			 		'LegalPostalCode',
			 		'LegalCountry',
			 		'LegalPhone',
			 		'LegalExtension'
			 );
			
			$fields = FormHelper::getFormItemsDisplay($model, $list);
			return "
			<div class='panelDiv'>
				<h2 class='editor-h2'>Legal Business</h2>
				$fields
			</div>
			";
		}
	}
?>
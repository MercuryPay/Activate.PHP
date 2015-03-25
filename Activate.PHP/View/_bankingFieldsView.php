<?php
	include_once("Helpers/FormHelper.php");
	include_once("Model/MerchantData.php");

	class _bankingFieldsView{
		public static function buildFields(MerchantData $model){
			$list = array(
					'Dda',
					'Routing',
					'FinancialInstitutionName',
					'FinancialInstitutionNumber',
					'IsChecking'
			);
			$fields = FormHelper::getFormItemsDisplay($model, $list);
				
			return "
			<div class='panelDiv'>
			<h2 class='editor-h2'>Bank Details</h2>
			$fields
			<div class=''></div>
			</div>
			";
		}
		
	}
?>

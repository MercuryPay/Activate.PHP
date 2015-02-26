<?php
	include("Helpers/FormHelper.php");
	include("../Model/MerchantData.php");

	class _dbaFieldsView{
		public static function buildFields(MerchantData $model){
			$list = array(
					'DBAName',
					'DBAAddress',
					'DBACity',
					'DBAStateOrProvince',
					'DBAPostalCode',
					'DBACountry',
					'DBAPhone',
					'DBAExtension'
			);
				
			$fields = FormHelper::getFormItemsDisplay($model, $list);
			
			return "
			<div class='panelDiv'>
				<h2 class='editor-h2'>DBA Business</h2>
				$fields
			</div>
			";
		}
	}
?>
<?php
	include("../Helpers/FormHelper.php");
	include("../Model/MerchantData.php");

	class _ownerFieldsView{
		public static function buildFields(MerchantData $model){
			$setOne =
			FormHelper::getFormItemDisplay($model,'OwnerTitle') .
			FormHelper::getFormItemLabel('Name') .
			FormHelper::getFormItemValidator($model, 'OwnerFirstName') .
			FormHelper::getFormItemValidator($model, 'OwnerMiddleName') .
			FormHelper::getFormItemValidator($model, 'OwnerLastName');
				
			$setTwo = FormHelper::getFormItemDisplay($model, 'OwnerFirstName', null, true, false);
			$setThree = FormHelper::getFormItemDisplay($model, 'OwnerMiddleName', null, true, false);
			$setFour = FormHelper::getFormItemDisplay($model, 'OwnerLastName', null, true, false);
			$setFive = FormHelper::getFormItemDisplay($model, 'OwnerSuffix') .
			FormHelper::getFormItemLabel('Date of Birth (mm/dd/yyyy)') .
			FormHelper::getFormItemValidator($model, 'OwnerDOBDay') .
			FormHelper::getFormItemValidator($model, 'OwnerDOBMonth') .
			FormHelper::getFormItemValidator($model, 'OwnerDOBYear');
		
			$setSix = FormHelper::getFormItemDisplay($model, 'OwnerDOBMonth', null, false, false);
			$setSeven = FormHelper::getFormItemDisplay($model, 'OwnerDOBDay', null, false, false);
			$setEight = FormHelper::getFormItemDisplay($model, 'OwnerDOBYear', null, false, false);
		
			$list = array(
					'OwnerSSN',
					'OwnerEmail',
					'OwnerAddress',
					'OwnerCity',
					'OwnerStateOrProvince',
					'OwnerPostalCode',
					'OwnerCountry'
			);
				
			$setNine = FormHelper::getFormItemsDisplay($model, $list);
		
			return "
			<div class='panelDiv'>
				<h2 class='editor-h2'>Business Owner</h2>
				$setOne
				<div>
					<table class='minTable' style='text-align: left'>
						<tr>
							<td style='width: 40%; padding-right: 5px; text-align: left'>
								$setTwo
							</td>
							<td style='width: 20%; padding-right: 5px;'>
								$setThree
							</td>
							<td style='width: 40%;'>
								$setFour
							</td>
						</tr>
					</table>
				</div>
				$setFive
				<div>
					<table class='minTable'>
						<tr>
							<td style='width: 60px;'>
								$setSix
							</td>
							<td class='innerLabel'>/</td>
							<td style='width: 60px;'>
								$setSeven
							</td>
							<td class='innerLabel'>/</td>
							<td style='width: 120px;'>
								$setEight
							</td>
						</tr>
					</table>
				</div>
				$setNine
			</div>
			";
		}
		
	}
?>
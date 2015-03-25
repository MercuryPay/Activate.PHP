<?php
	include_once("Helpers/FormHelper.php");
	include_once("Model/MerchantData.php");

	class _businessFieldsView{
		public static function buildFields(MerchantData $model){
				
			$setOne = FormHelper::getFormItemDisplay($model, 'OwnershipType') .
			FormHelper::getFormItemDisplay($model, 'ProductServiceSold') .
			FormHelper::getFormItemValidator($model, 'PercentRetailSwipedTransactions') .
			FormHelper::getFormItemValidator($model, 'PercentCardKeyedTransactions') .
			FormHelper::getFormItemValidator($model, 'PercentMailOrderTransactions');
		
			$setThree = FormHelper::getFormItemLabelFromField($model, 'PercentRetailSwipedTransactions');
			$setFour = FormHelper::getFormItemLabelFromField($model, 'PercentCardKeyedTransactions');
			$setFive = FormHelper::getFormItemLabelFromField($model, 'PercentMailOrderTransactions');
			$setSix =FormHelper::getFormItemDisplay($model, 'PercentRetailSwipedTransactions', null, false, false);
			$setSeven = FormHelper::getFormItemDisplay($model, 'PercentCardKeyedTransactions', null, false, false);
			$setEight = FormHelper::getFormItemDisplay($model, 'PercentMailOrderTransactions', null, false, false);
		
			$list = array(
					'CurrencyType',
					'AnnualSalesVisaMc',
					'AvgTicket',
					'DailyVolume',
					'Market',
					'SIC',
					'TaxId'
			);
				
			$setNine = FormHelper::getFormItemsDisplay($model, $list);
		
				
			return "
			<div class='panelDiv'>
				<h2 class='editor-h2'>Business</h2>
				$setOne
				<div>
					<table class='minTable'>
						<tr>
							<td style='width: 22%; vertical-align: bottom;'>
								$setThree
							</td>
							<td style='width: 7px;'></td>
							<td style='width: 22%; vertical-align: bottom;'>
								$setFour
							</td>
							<td style='width: 7px;'></td>
							<td style='width: 22%; vertical-align: bottom;'>
								$setFive
							</td>
							<td style='width: 7px;'></td>
							<td style='width: 22%; vertical-align: bottom;'>
								<div class='editor-label'>Total %</div>
							</td>
						</tr>
						<tr>
							<td>
								$setSix
							</td>
							<td class='innerLabel'>+</td>
							<td>
								$setSeven
							</td>
							<td class='innerLabel'>+</td>
							<td>
								$setEight
							</td>
							<td class='innerLabel'>=</td>
							<td>
								<div class='editor-field'>
									<input class='text-box single-line' data-val='true' data-val-number='The field PercentTotalTransaction must be a number.' id='PercentTotalTransaction' name='PercentTotalTransaction' type='number' value='' />
								</div>
							</td>
						</tr>
					</table>
				</div>
				$setNine
				<div style='height: 75px;'></div>
			</div>
			";
		}
		
	}
?>

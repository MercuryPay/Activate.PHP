<?php
	include_once("Helpers/ObjectHelper.php");
	
	class FormHelper{
		
		public static function getFormItemsDisplay($model, $fieldNamesArray){
			$contextName = FormHelper::getContextFromModel($model);
		
			$results = "";
			foreach ($fieldNamesArray as $i => $fieldName){
				$results = $results . FormHelper::getFormItemDisplay($model, $fieldName, $contextName);
			}
			return $results;
		}
		
		private static function getContextFromModel($model){
			$contextName = '';
			$rClass = new ReflectionClass($model);
				
			if($rClass->hasProperty('ContextName')){
				$contextName = $model->ContextName;
			}
				
			return $contextName;
		}
		
		public static function getFormItemDisplay($model, $fieldName, $contextName = null, $withLabel = true, $withValidator = true){
			if($contextName == null || $contextName == '') $contextName = FormHelper::getContextFromModel($model);

			$type = ObjectHelper::getPropertyAnnotation($model, $fieldName, 'type');
				
			$displayOptions = ObjectHelper::getPropertyAnnotation($model, $fieldName, 'display');
			if($displayOptions == null) $displayOptions= "";
			
			$readOnly = strchr($displayOptions, "readOnly") != false;
			$hideOnEmpty = strchr($displayOptions, "hideOnEmpty") != false;
			
			$displayName = ObjectHelper::getDisplayName($model, $fieldName);
			$requiredWhen = ObjectHelper::getPropertyAnnotation($model, $fieldName, 'requiredWhen');
			$required = ($contextName == $requiredWhen || $requiredWhen == 'All');
			
			if($readOnly)
			{
				$type = "readOnly";
				$required = false;
			}
				
			$borderClass = 'editor-field';
			$textBoxClass = 'text-box single-line';
			
			if($required){
				$borderClass = $borderClass . ' requiredBorder';
				$textBoxClass = $textBoxClass . ' editor-required';
			}
			$validator = '';
			$label = '';

			if($withValidator) $validator = FormHelper::getFormItemValidator($model, $fieldName);
			if($withLabel) $label = FormHelper::getFormItemLabel($displayName, $required);
			
			$prop = new ReflectionProperty($model, $fieldName);

			$value = $prop->getValue($model);
			
			if($hideOnEmpty && ($value==null||trim($value)=='')){
				return "";
			}
				

			switch ($type){
				case "number":
					$results = "$label $validator
					<div class='$borderClass'>
						<input class='$textBoxClass' id='$fieldName' name='$fieldName' type='number' value='$value' data-val-number='The field $fieldName must be a number.' />
					</div>
					";
					break;
				case "money":
					$results = "$label $validator
					<div>
						<table class='minTable'>
							<tr>
								<td class='innerLabel money'/>
								<td style='width: 100%'>
									<div class='$borderClass'>
										<input class='$textBoxClass' id='$fieldName' name='$fieldName' data-val='true' data-val-number='The field $fieldName must be a number.' type='text' value='$value' />
									</div>
								</td>
							</tr>
						</table>
					</div>
					";
					break;
				case "boolean":
					if($value == "true") $checked = "checked";
					$prep = "
					<input id='$fieldName' name='$fieldName' data-val='true' data-val-required='The $fieldName field is required.' type='checkbox' value='$value' $checked/>
					<!--input name='$fieldName' type='hidden'value='false' / -->
					";
	
					$label = str_replace('</div>', $prep . '</div>', $label);
					
					$results = "$validator $label";
					break;
				case "enum":
					$enumType = ObjectHelper::getPropertyAnnotation($model, $fieldName, 'enumType');
					
					$prep = '';
					include ("Model/$enumType.php");
	
					$oClass = new ReflectionClass($enumType);
					
					foreach ($oClass->getConstants() as $key => $displayValue){
						if ($value==$key) $selected = ' selected';
						$prep = $prep . "
							<option value='$key'$selected>$displayValue</option>";
					}
					
					$results = "$label $validator
					<div class='editor-field'>
						<select id='OwnershipType' name='OwnershipType' style='width:100%'>
							<option value=''>--Select Business Ownership Type--</option> $prep
						</select>
					</div>
					";
					break;
				case "readOnly":
					$results = "$label $validator
					<div class='$borderClass'>
						<input class='$textBoxClass' id='$fieldName' name='$fieldName' type='text' disabled='True' value='$value' />
					</div>
					";
					break;
				default:
					$results = "$label $validator
					<div class='$borderClass'>
						<input class='$textBoxClass' id='$fieldName' name='$fieldName' type='text' value='$value' />
					</div>
					";
					break;
			}
			
			return $results;	
		}
		
		public static function getFormItemValidator($model, $fieldName){
			
			$validationClass = 'field-validation-valid';
			$vErrors = $model->ValidationErrors;
			$error = false;

			if($vErrors!=null){
				$er = $vErrors[$fieldName];
				
				if($er != null){
					$error = true;
					$validationClass = 'field-validation-error';
					$message = '';
					foreach ($er as $msg){
						$message = $message . "<p />" . $msg;
					}
					
				}
							
			}
			
			$results = "
			<div>
				<span class='$validationClass' data-valmsg-for='$fieldName' data-valmsg-replace='true'>$message</span>
			</div>
			";
			return $results;
		}
		
		public static function getFormItemLabelFromField($model, $fieldName, $contextName = null){
			if($contextName == null || $contextName == '') $contextName = FormHelper::getContextFromModel($model);
				
			$displayName = ObjectHelper::getDisplayName($model, $fieldName);
			$requiredWhen = ObjectHelper::getPropertyAnnotation($model, $fieldName, 'requiredWhen');
			$required = ($contextName == $requiredWhen || $requiredWhen == 'All');
			return FormHelper::getFormItemLabel($displayName, $required);
		} 
		
		public static function getFormItemLabel($displayName, $required = false){
		
			$labelClass = 'editor-label';
			if($required) $labelClass = $labelClass . ' required';
				
			$results = "
			<div class='$labelClass'>$displayName</div>
			";
			return $results;
		}
		
	}
?>

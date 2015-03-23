<?php
include("../Model/SubmissionResponse.php");
include("../Model/MerchantData.php");

class ActivateServiceHelper{
	const ServiceAddress = " https://activatebeta.mps-lab.com:8121/";
	const PayloadFormat = "application/json";
	const ServiceAPICredentials = "Basic NzhBQjJCOTYtQUY3OC00NUZDLUEzMjYtODlFMEQ2NzgwMkRBOnBhc3N3b3JkMQ==";
	
	public static function callActivate($address, $data, $method, $applicationId){

		// Initialize a connection by address...
		$ch = curl_init($address);
		
		// Set an array for the base required headers.
		$headers = array(
				'Content-Type: ' . ActivateServiceHelper::PayloadFormat,
				'Accept: ' . ActivateServiceHelper::PayloadFormat,
				'Authorization: ' . ActivateServiceHelper::ServiceAPICredentials
				);
		
		// If there is a data payload, add the data to the message and add the content length to the header array.
		if($data != null){
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			array_push($headers, 'Content-Length: ' . strlen($data));
		}
		
		// Build the rest of the message.
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		
		// Send the request.
		$callResponse = curl_exec($ch);
		
		// If there was an error, gather the error number and the error text message.
		$err = curl_errno($ch);
		$errMsg = curl_error($ch);

		// Close the connection.
		curl_close($ch);
		
		// Set up a default submission response object.
		$results = new Submission();
		$results->applicationId = $applicationId;

		if($err==0){
			// If there were no communications errors, translate the response from the service.
			
			// Pull the data into a JSON response for further parsing.
			$jsonResponse = json_decode($callResponse, true);
		
			// Get the command status and text reposnse message.
			$results->cmdStatus = $jsonResponse["CmdStatus"];
			$results->textResponse = $jsonResponse["TextResponse"];
		
			if($results->cmdStatus == "Success"){
				// On a success response from the server, stuff the expected values from the message.
				$results->applicationId = $jsonResponse["ApplicationId"];
				$results->merchantId = $jsonResponse["MerchantID"];
				$results->terminalId = $jsonResponse["TerminalID"];
			}
			else{
				// On an unsuccessful response, look for validation messages.
				$vMessages = $jsonResponse["ValidationMessages"];
		
				if($vMessages != null){
					// Translate any found field validation messages into an array to add to the model for display. (This will always be null for a "GetStatus()" flow.)
					foreach ($vMessages as $vMessage) {
						$v[$vMessage["PropertyName"]][$vMessage["ValidationType"]] = $vMessage["ErrorMessage"];
					}
					
					// Add the validation message array to the results.
					$results->ValidationErrors = $v;
				}
			}
		}
		else{
			// If there was a communications error, set the command status and text message for display.
			$results->cmdStatus = "Error";
			$results->textResponse = "An unexpected error occurred: $err - $errMsg";
		}

		// Return the results.
		return $results;
	}
	
	public static function postSubmissionToActivate(MerchantData $model){
		
		// Convert to a MerchantData Item.
		$model = ObjectHelper::modelFromPost($model);
		
		// Convert to JSON for the message payload.
		$data = ObjectHelper::toJson($model);
		
		$context = "Lead";
		if ($model->ContextName == "Qualified") $context = "QualifiedLead";
		
		$address = ActivateServiceHelper::ServiceAddress . "$context/Submission";
		
		$results = ActivateServiceHelper::callActivate($address, $data, "POST", null);
		
		$model->ValidationErrors = $results->ValidationErrors;
		
		$results->model = $model;
		
		return $results;
	}
	
	public static function getStatusRequestFromActivate(Submission $submission){
		// Convert to a Submission Item.
		$submission = ObjectHelper::modelFromPost($submission);
		$appId = $submission->applicationId;
		
		$address = ActivateServiceHelper::ServiceAddress . "Application/Status/" . $submission->applicationId;
		
		$submission =  ActivateServiceHelper::callActivate($address, null, "GET", $submission->applicationId);

		$submission->applicationId = $appId;
	
		return $submission;
	}
}
?>

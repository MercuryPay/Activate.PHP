<?php
	class ObjectHelper {
		
		private static $cachedAspects;
		
		/**
		 * @param unknown_type $model
		 */
		public static function modelFromPost($model){
			return ObjectHelper::objectFromArray($model, $_POST);
		}

		public static function getDisplayName($target, $propertyName){
			$displayName = ObjectHelper::getPropertyAnnotation($target, $propertyName, 'displayName');
			
			if($displayName == null || $displayName == '') $displayName = $propertyName;

			return $displayName;
		}
		
		public static function getPropertyAnnotation($target, $propertyName, $attrName) {
			ObjectHelper::cacheTargetPropertyAnnotations($target);
				
			$class = new ReflectionClass($target);
			$className = $class->getName();

			$results = ObjectHelper::$cachedAspects[$className][$propertyName][$attrName];

			if($results==null) return '';
			return $results;
		}
		
		private static function cacheTargetPropertyAnnotations($target){
			$class = new ReflectionClass($target);
			$className = $class->getName();
			
			$aspects = ObjectHelper::$cachedAspects[$className];
				
			if(ObjectHelper::$cachedAspects != null && ObjectHelper::$cachedAspects[$className] != null) return;

				
			// iterate through all properties.
			foreach ($class->getProperties(ReflectionProperty::IS_PUBLIC) as $i => $property){
				ObjectHelper::$cachedAspects[$className][$property->getName()] = ObjectHelper::getAnnotationsFromProperty($target, $property);
			}
		}
		
		private static function getAnnotationsFromProperty($target, $property){
			$comments = trim($property->getDocComment());
			$comments = trim(substr($comments, 3, strlen($comments) - 5));
				
			// get rid of M$ cr-nl combinations.
			$comments = str_replace("\r\n", "\n", $comments);
				
			// Get rid of OSX CRs.
			$comments = str_replace("\r", "\n", $comments);
			
			// Split by newline.
			$allLines = explode("\n", $comments);
			
			$results = NULL;
			foreach ($allLines as $i => $line){
				$line = trim($line);
			
				$atPos = strpos($line, "@") +1;
				if($atPos == false) continue;
			
				$line = trim(substr($line, $atPos));
			
				if (strlen($line) > $atPost) {
					$vPos = strpos($line, "\\", $atPos);
				}
				
				if($vPos == false) continue;
			
				$t = explode("\\", trim($line));
				$aName = trim($t[0]);
				$aValue = trim($t[1]);
			
				if($aName != '' && $aValue != null && $aValue != ''){
					$results[$aName] = $aValue;
				}
			}
				
			return $results;
				
		}
		
		public static function getPropertyAnnotations($target, $propertyName) {
			ObjectHelper::cacheTargetPropertyAnnotations($target);
			
			$class = new ReflectionClass($target);
			
			$property = new ReflectionProperty($target, $propertyName);
			
			return ObjectHelper::$cachedAspects[$class->getName()][$propertyName];
			//return ObjectHelper::getAnnotationsFromProperty($target, $property);
		}
		
		/**
		 * @param unknown_type $target
		 * @param array $sourceArray
		 * @see $_POST
		 */
		public static function objectFromArray($target, $sourceArray) {
			
			/* Use reflection to pull the data from the array and fill the target object */
			$f = array_filter((array) $sourceArray);
			foreach($f as $key => $value) {
				$prop = new ReflectionProperty($target, $key);
				$prop->setValue($target, $value);
			}
				
			/* return the filled object */
			return $target;
		}
		
		/**
		 * @param unknown_type $source
		 * @return JSON formattd string
		 */
		public static function toJson($source) {
			return json_encode((object)array_filter((array) $source));
		}
		
		/**
		 * @param unknown_type $source
		 * @return JSON formattd string
		 */
		public static function toJsonPretty($source) {
			return json_encode((object)array_filter((array) $source), JSON_PRETTY_PRINT);
		}
		
		public static function isValidUuidString($uuid){
			$pLong = '/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i';
			$pShort = '/^[0-9A-F]{12}4[0-9A-F]{3}[89AB][0-9A-F]{15}$/i';
			
			return (preg_match($pLong, $uuid) || preg_match($pShort, $uuid));
		}
		
		public static function generateUuid(){
			$c = strtoupper(md5(uniqid(rand(), true)));
			$d3 = str_split("89AB");
			return   substr($c, 0, 8)."-".substr($c, 8, 4)."-4".substr($c,12, 3)."-".$d3[array_rand($d3)].substr($c,16, 3)."-".substr($c,20,12);
		}
		
	}
?>

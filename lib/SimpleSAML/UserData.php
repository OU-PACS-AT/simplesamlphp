<?php

namespace SimpleSAML;

/**
 * Created as a helper class to parse User attribute data given from SAML and store in cookies
 *
 * @author Will Poillion (wpoillion@ou.edu)
 * @package SimpleSAMLphp
 */
class UserData
{
	/**
	 * @var This is the seed for the encryption of the cookies
	 */
	const crypt_key = "78A4863B762BE4953722B4F522DF7";
	
	/**
	 * @var UserData This is the singleton instance of this class.
	 */
	private static $instance = null;
	
	private $cryptor = null; 
	
	
	public function __construct()
	{
		self:$cryptor = new \SimpleSAML\Cryptor(self::crypt_key);
	}
	
	
	
	/**
	 * This function is used to retrieve the singleton instance of this class.
	 *
	 * @return UserData The singleton instance of this class.
	 */
	public static function getInstance()
	{
		if (self::$instance === null) {
			self::$instance = new UserData();
		}
		
		return self::$instance;
	}
	

	/**
	 * This function is used to parse all the attributes from SAML
	 *   and store necessary info into cookies for use in the application
	 *   
	 * @return userData array of user info
	 */
	public function storeUserData($attributes){
		$userData = [];
		
		foreach ($attributes as $key => $value) {
			switch($key){
				case "OUNetID":
					$userData["OUNetID"] = implode(':', $value);
					break;
				case "FirstName":
					$userData["FirstName"] = implode(':', $value);
					break;
				case "LastName":
					$userData["LastName"] = implode(':', $value);
					break;
				case "email":
					$userData["Email"] = implode(':', $value);
					break;
				case "memeberOf":
					$numGroups = count($value);
					$userData["MemberOf"] = [];
					for ($i = 0; $i < $numGroups; $i++) {
						error_log("Group:--".$value[$i]);
						
						if (preg_match("/\bCN=staff,OU/", $value[$i])){
							$userData["MemberOf"][] = "Staff";
						}
						if (preg_match("/\bCN=faculty,OU/", $value[$i])){
							$userData["MemberOf"][] = "Faculty";
						}
						if (preg_match("/\bCN=freshmen,OU/", $value[$i]) ||
							preg_match("/\bCN=gradstudents,OU/", $value[$i]) ||
							preg_match("/\bCN=juniors,OU/", $value[$i]) ||
							preg_match("/\bCN=seniors,OU/", $value[$i]) ||
							preg_match("/\bCN=sophomores,OU/", $value[$i]) ||
							preg_match("/\bCN=unclassifiedstudents,OU/", $value[$i])	){
							$userData["MemberOf"][] = "Student";
						}
					}
					//$userData["MemberOf"] = implode(':', $value);
					break;
			}
		}
		
		foreach ($userData as $key => $value) { 
			//error_log("StoreCookie - Key: ".$key." Value: ".$value);
			if (is_array($value)){
				$value = implode(':',$value);
			}
			self::storeCookie($key, $value);
		}
		
		return $userData;
	}
	
	
	/**
	 * This function encrypts and stores the cookie
	 */
	private function storeCookie($name, $value) {
		//$encryptedCookie = self::encryptCookie($value);
		//\SimpleSAML\Utils\HTTP::setCookie($name, $encryptedCookie);
		\SimpleSAML\Utils\HTTP::setCookie($name, $value);
	}

	
	/**
	 * This function deletes all cookies
	 */
	private function deleteCookies() {
		\SimpleSAML\Utils\HTTP::setCookie("OUNetID", null);
		\SimpleSAML\Utils\HTTP::setCookie("FirstName", null);
		\SimpleSAML\Utils\HTTP::setCookie("LastName", null);
		\SimpleSAML\Utils\HTTP::setCookie("Email", null);
		\SimpleSAML\Utils\HTTP::setCookie("MemberOf", null);
	}
	
	
	/**
	 * This function encrypts cookie using
	 *   const crypt_key
	 *  @return encrypted cookie
	 */
	private function encryptCookie($value){
		if (self::$cryptor == null) {
			self::getInstance();
		}
		return self::$cryptor->encrypt($value);
	}

	
	/**
	 * This function decrypts cookie using
	 *   const crypt_key
	 *  @return decrypted cookie
	 */
	private function decryptCookie($value){
		if (self::$cryptor == null) {
			self::getInstance();
		}
		return self::$cryptor->decrypt($value);
	}

	
	
	
	
	
	
	
	
	/**
	 * This is the logout function that primarily just deletes all cookies
	 */
	private function doLogout()
	{
		self::deleteCookies();
		// delete the session cookie
	}
	
	
	/**
	 * This function implements the logout handler. It deletes the information from Memcache.
	 */
	public function logoutHandler()
	{
		self::getInstance()->doLogout();
	}
	
}
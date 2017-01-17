<?php
/**
 * Performs password hashing
 *
 * This class is used to perform common password hashing routines
 *
 * @version 1.0
 * @author John Morris <support@johnmorrisonline.com>
 */
class Hash_Password {
  /**
   * Hashing algorithm
   * @access private
   * $var int
   */
  private $algorithm = PASSWORD_DEFAULT;
  
  /**
   * Hashing options
   * @access private
   * $var array
   */
  private $options;
  
  /**
   * Constructor
   * 
   * Sets up class options
   */
  public function __construct() {
    $this->options = array(
      // Add SALT and cost options here if desired
    );
  }
  
  /**
   * Hash and store password
   * 
   * Hashes the password then stores it in the database
   * 
   * @param string $password The password to hash and store
   * 
   * @return boolen true/false True if hash and store is successful. False if not
   */
  public function hash_and_store($password) {
    // Hash the password
    $hash = $this->hash( $password );
    
    // Check for successful hashing
    if ( ! $hash ) {
      return false;
    }
    
    // Store password in database
    // Check if storing was successful. Return false if not
    
    return true;
  }
  
  /**
   * Verify password
   * 
   * Gets the hash from the database and verifies user-submitted password
   * 
   * @param string $password The password to check
   * 
   * @return boolean true/false True if password matches. False if not
   */
  public function get_and_verify($password) {
    // Get hash from database
    $hash = '12lkjrelkjelkjrekjel';
    
    // Check if user-submitted password matches hash
    if ( $this->verify( $password, $hash ) ) {
      
      // Check if password needs rehashed
      if ( $this->needs_rehash( $hash ) ) {
        
        // Rehash and store new hash
        if ( ! $this->hash_and_store( $password ) ) {
          return false;
        }
        
      }
      
      return true;
    }
    
    return false;
  }
  
  /**
   * Hashing method
   * 
   * Hashes a password
   * 
   * @param string $password The password to hash
   * 
   * @return $string $hash The hashed password
   */
  public function hash($password) {
    return password_hash( $password, $this->algorithm, $this->options );
  }
  
  /**
   * Verify method
   * 
   * Verifies a password matches the hash
   * 
   * @param string $password The plain text password to check
   * @param string $hash The hash to check against
   * 
   * @return boolean true/false True if it matches. False if not
   */
  public function verify($password, $hash) {
    return password_verify( $password, $hash );
  }
  
  /**
   * Needs rehash method
   * 
   * Checks if a hash needs rehashed. For new algorithms/options
   * 
   * @param string $hash The hash to check for rehashing
   * 
   * @return boolean true/false True if needs rehashing. False if not
   */
  public function needs_rehash($hash) {
    return password_needs_rehash($hash, $this->algorithm, $this->options );
  }
  
  /**
   * Get hash info
   * 
   * Gets the hashing algorithm and options used while hashing
   * 
   * @param string $hash The hash to get info from
   * 
   * @return array $info An associate array containing the hashing info
   */
  public function get_info($hash) {
    return password_get_info($hash);
  }
  
  /**
   * Find cost
   * 
   * This code will benchmark your server to determine how high of a cost you can
   * afford. You want to set the highest cost that you can without slowing down
   * you server too much. 8-10 is a good baseline, and more is good if your servers
   * are fast enough. The code below aims for ≤ 50 milliseconds stretching time,
   * which is a good baseline for systems handling interactive logins.
   * 
   * @param int $baseline Baseline cost to start testing from
   * 
   * @return int $cost Cost to use for server
   */
  public function find_cost($baseline = 8) {
    // Target time. 50 milliseconds is a good baseline
    $time_target = 0.05;
    $cost = $baseline;
    
    // Run test
    do {
      $cost++;
      $start = microtime( true );
      password_hash( 'test', $this->algorithm, array( 'cost' => $cost ) );
      $end = microtime( true );
    } while( ( $end - $start ) < $time_target );
    
    return $cost;
  }
}

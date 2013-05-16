<?php
// Adapted from Java code at http://www.merriampark.com/anatomycc.htm
// by Andy Frey, onesandzeros.biz
// Checks for valid credit card number using Luhn algorithm
// Source from: http://onesandzeros.biz/notebook/ccvalidation.php
// 
// Try the following numbers, they should be valid according to the check:
// 4408 0412 3456 7893
// 4417 1234 5678 9113
//
function isValidCCNumber( $ccNum ) {
    $digitsOnly = "";
    // Filter out non-digit characters
    for( $i = 0; $i < strlen( $ccNum ); $i++ ) {
        if( is_numeric( substr( $ccNum, $i, 1 ) ) ) {
            $digitsOnly .= substr( $ccNum, $i, 1 );
        }
    }
    // Perform Luhn check
    $sum = 0;
    $digit = 0;
    $addend = 0;
    $timesTwo = false;
    for( $i = strlen( $digitsOnly ) - 1; $i >= 0; $i-- ) {
        $digit = substr( $digitsOnly, $i, 1 );
        if( $timesTwo ) {
            $addend = $digit * 2;
            if( $addend > 9 ) {
                $addend -= 9;
            }
        } else {
            $addend = $digit;
        }
        $sum += $addend;
        $timesTwo = !$timesTwo;
    }
    return $sum % 10 == 0;
}


/*
MII Digit Value Issuer Category
0 ISO/TC 68 and other industry assignments
1 Airlines
2 Airlines and other industry assignments
3 Travel and entertainment
4 Banking and financial
5 Banking and financial
6 Merchandizing and banking
7 Petroleum
8 Telecommunications and other industry assignments
9 National assignment
*/


/*
Issuer  Identifier  Card Number Length
Diner's Club/Carte Blanche  300xxx-305xxx,
36xxxx, 38xxxx  14
American Express  34xxxx, 37xxxx  15
VISA  4xxxxx  13, 16
MasterCard  51xxxx-55xxxx   16
Discover  6011xx  16
*/



// Include CForm & Create a class for payment-form with name, email and phonenumber.
include('CForm.php');
$currentYear = date('Y');
$elements = array(
  'payment' => array(
    'type' => 'hidden',
    'value' => 10
  ),
  'name' => array(
    'type' => 'text',
    'label' => 'Kortets ägare:',
    'required' => true,
    'autofocus' => true,
    'validation' => array('not_empty')
  ),
  'address' => array(
    'type' => 'text',
    'label' => 'Adress:',
    'required' => true,
    'validation' => array('not_empty')
  ),
  'zip' => array(
    'type' => 'text',
    'label' => 'Postkod:',
    'required' => true,
    'validation' => array('not_empty')
  ),
  'city' => array(
    'type' => 'text',
    'label' => 'Stad:',
    'required' => true,
    'validation' => array('not_empty')
  ),
  'country' => array(
    'type' => 'select',
    'label' => 'Land:',
    'options' => array(
      'default' => 'Välj ett land...',
      'no' => 'Norge',
      'se' => 'Sverige',
      'dk' => 'Danmark',
      's' => 'Finland',
    ),
    'validation' => array('not_empty', 'not_equal' => 'default')
  ),
  'cctype' => array(
    'type' => 'select',
    'label' => 'Typ av kort:',
    'options' => array(
      'default' => 'Välj typ av kort...',
      'visa' => 'VISA',
      'mastercard' => 'Mastercard',
      'eurocard' => 'Eurocard',
      'amex' => 'American Express',
    ),
    'validation' => array('not_empty', 'not_equal' => 'default')
  ),
  'ccnumber' => array(
    'type' => 'text',
    'label' => 'Kortnummer:',
    'validation' => array('not_empty', 'custom_test' => array('message' => 'Credit card number is not valid, try using 4408 0412 3456 7893 or 4417 1234 5678 9113 :-).', 'test' => 'isValidCCNumber')),
  ),
  'expmonth' => array(
    'type' => 'select',
    'label' => 'Kortet utgår månad:',
    'options' => array(
      'default' => 'Välj månad då kortet går ut...',
      '01' => 'Januari',
      '02' => 'Februari',
      '03' => 'Mars',
      '04' => 'April',
      '05' => 'Maj',
      '06' => 'Juni',
      '07' => 'Juli',
      '08' => 'Augusti',
      '09' => 'September',
      '10' => 'Oktober',
      '11' => 'November',
      '12' => 'December',
    ),
    'validation' => array('not_empty', 'not_equal' => 'default')
  ),
  'expyear' => array(
    'type' => 'select',
    'label' => 'Kortet utgår år:',
    'options' => array(
      'default' => 'Välj år då kortet går ut...',
      $currentYear    => $currentYear,
      ++$currentYear  => $currentYear,
      ++$currentYear  => $currentYear,
      ++$currentYear  => $currentYear,
      ++$currentYear  => $currentYear,
      ++$currentYear  => $currentYear,
    ),
    'validation' => array('not_empty', 'not_equal' => 'default')
  ),
  'cvc' => array(
    'type' => 'text',
    'label' => 'CVC-kod:',
    'required' => true,
    'validation' => array('not_empty', 'numeric')
  ),
  'doPay' => array(
    'type' => 'submit',
    'value' => 'Betala',
    'callback' => function($form) {
      // Taking some money from the creditcard.
      return true;
    }
  ),
);

$form = new CForm(array(), $elements);

<?php
//convenient line breaks
function br() { echo "<br />"; }

//building parts of the deck(s)
$suits = array(" of Spades"," of Hearts"," of Clubs"," of Diamonds");
$faces = array(
  'A'=>'1',
  '2'=>'2',
  '3'=>'3',
  '4'=>'4',
  '5'=>'5',
  '6'=>'6',
  '7'=>'7',
  '8'=>'8',
  '9'=>'9',
  '10'=>'10',
  'J'=>'10',
  'Q'=>'10',
  'K'=>'10');

echo "Creating a deck..."; br();
$deck = array();
foreach ($suits as $suit) {
 foreach ($faces as $face) {
    $deck[] = array("face"=>$face, "suit"=>$suit);
  }
}



//testing the deck has 52 cards
echo "Number of cards in the deck = " . count($deck); br();
br();

//function to draw a card the & symbol makes sure the changes
//made to the deck (removing cards) are persistent
function drawCard(&$deck) {
  echo "Drawing a card... ";
//  echo "Starting with " . count($deck) . " cards in deck."; br();
  $card = array_shift($deck);
//  echo "Finishing with " . count($deck) . " cards in deck."; br();
  echo $card['face'] . $card['suit'] . " was drawn.";
  br();
  return $card;
}


//shuffling the deck
echo "Shuffling...";
br();
shuffle($deck);
br();

/* lists the shuffled cards, uncomment for debugging 
for ($i = 0; $i < count($deck); $i++) {
  $card = array_shift($deck);
  echo $card['face'] . $card['suit'];
  br();
  }
*/

//Getting the Player's Hand
echo "<b>Getting the player's hand...</b>"; br();

class hand {
  public $cards = array();
  public $total; // I have to get this to total the 'score' for each value of the cards in $cards
}

$playerhand = new hand();
$playerhand->cards[] = drawCard($deck);
$playerhand->cards[] = drawCard($deck);
print_r($playerhand); br();
//Try to add options for HIT and STAY here

br();

//Dealer's Hand
echo "<b>Getting the dealer's hand...</b>"; br();
$dealerhand = new hand();
$dealerhand->cards[] = drawCard($deck);
$dealerhand->cards[] = drawCard($deck);
print_r($dealerhand); br();

?>
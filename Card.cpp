#include <iostream>
#include <stdlib.h>

#include "Card.h"

Card::Card(int _suit, int _value)
{
    this->suit = static_cast<cardSuit>(_suit);
    this->value = static_cast<cardValue>(_value);
}

Card::~Card()
{
}

bool Card::compareSuit(Card otherCard){
    if(suit == otherCard.suit){
        return true;
    }
    return false;
}

bool Card::compareValue(Card otherCard){
    if(value == otherCard.value){
        return true;
    }
    return false;
}

bool Card::compareGreaterThan(Card otherCard){
    if(static_cast<int>(value) > static_cast<int>(otherCard.value)){
        return true;
    }
    return false;
}

bool Card::compareLessThan(Card otherCard){
    if(static_cast<int>(value) < static_cast<int>(otherCard.value)){
        return true;
    }
    return false;
}

void Card::printCard()
{

    std::cout << "This card is ";

    switch (value)
    {    
    case Two:
        std::cout << "a Two ";
        break;
    case Three:
        std::cout << "a Three ";
        break;
    case Four:
        std::cout << "a Four ";
        break;
    case Five:
        std::cout << "a Five ";
        break;
    case Six:
        std::cout << "a Six ";
        break;
    case Seven:
        std::cout << "a Seven ";
        break;
    case Eight:
        std::cout << "an Eight ";
        break;
    case Nine:
        std::cout << "a Nine ";
        break;
    case Ten:
        std::cout << "a Ten ";
        break;
    case Jack:
        std::cout << "a Jack ";
        break;
    case Queen:
        std::cout << "a Queen ";
        break;
    case King:
        std::cout << "a King ";
        break;
    case Ace:
        std::cout << "an Ace ";
        break;
    }

    std::cout << "of ";

    switch (suit)
    {
    case Club:
        std::cout << "Clubs";
        break;
    case Heart:
        std::cout << "Hearts";
        break;
    case Diamond:
        std::cout << "Diamonds";
        break;
    case Spade:
        std::cout << "Spades";
        break;
    }

    std::cout << "." << std::endl;
}
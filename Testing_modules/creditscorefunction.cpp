// creditscorefunction.cpp : Defines the entry point for the console application.
//

#include "stdafx.h"
#include <iostream>
using namespace std;

/*a funtion is a group of statments that is executed when caled from some point of the program
formated  type name(parameter1,parameter2....){statments}  type=data type(int boolean etc)
and name=identifier by which it is possible to call the function*/
//although we don't use overloaded functions here it is possible to name a function the same thing so long as the type is different

#define DEBT_RANGE (165)
#define NEW_ACCOUNTS (55)
#define PAYMENT_HIS (192.5)
#define AGE_RANGE (82.5)
#define CREDIT_MIX (85)
#define BASE_CREDIT (300)

double amountsOwed(double debtRatio);    //prototyping to calling on my functions in the main argument
double newCredit(double numberofNew);
double paymentHistory(double onTimepay);
double lenthofHistory(double ageofCredits);
double creditTypes(double differentTypes);


int main()
	
{
		double input1; 
		double input2;
		double input3;
		double input4;
		double input5;
		int EXCELLENTCREDIT = 750;
		int GOODCREDIT = 700;
		int FAIRCREDIT = 660;
		char newloantype;
		int newdebtamount;

		cout << "Enter the ratio of Debt you owe  0 to 1: ";
		cin >> input1;
		input1=amountsOwed(input1);
		cout << "Enter the number of new accounts you have: ";
		cin >> input2;
		input2=newCredit(input2);
		cout << "Enter how often you make payments as a percentage in decimal form 0 to 1: ";
		cin >> input3;
		input3=paymentHistory(input3);
		cout << "How many years have you had credit?: ";
		cin >> input4;
		input4=lenthofHistory(input4);
		cout << "Enter how many different credit accounts you have(student loans, mortage, credit cards etc.): ";
		cin >> input5;
		input5=creditTypes(input5);
		int creditscore = BASE_CREDIT + input1 + input2 + input3 + input4 + input5;
		
		cout << "Your credit score is:  " << creditscore <<endl;
		
		cout << "Enter your credit score seen above: ";
		cin >> creditscore;
		while (creditscore > EXCELLENTCREDIT)
		{
			cout << "your credit score is excellent you qualify for low interest loans! \n";
			cout << "What kind of loans would you like to apply for?(car,mortgage,creditcard: \n";
			cin >> newloantype;
			cout << "How much do you want to borrow?: ";
			cin >> newdebtamount;
			newdebtamount += newdebtamount;
			while (newdebtamount < 100000)
			{
				"If you would like to apply for my credit how much would you like: ";
				cin >> newdebtamount;
				++newdebtamount
			}
		}


			return 0;
	}

double amountsOwed(double debtRatio)
{
	double debtimpact;
	if (debtRatio <= .25)
		debtimpact = DEBT_RANGE;
	else if (debtRatio >= .26 && debtRatio <= .40)
		debtimpact = DEBT_RANGE*.8;
	else if (debtRatio >= .47 && debtRatio <= .69)
		debtimpact = DEBT_RANGE*.6;
	else if (debtRatio >= .7)
		debtimpact = DEBT_RANGE*.2;
	return (debtimpact);
}

double newCredit(double numberofNew)
{
	double newimpact;
	if (numberofNew == 0)
		newimpact = NEW_ACCOUNTS;
	else if (numberofNew > 0 && numberofNew <= 2)
		newimpact = NEW_ACCOUNTS*.8;
	else if (numberofNew >= 3 & numberofNew <= 4)
		newimpact = NEW_ACCOUNTS*.5;
	else if (numberofNew > 4)
		newimpact = NEW_ACCOUNTS*.2;
	return (newimpact);
}

double paymentHistory(double onTimepay)
{
	double paymentImpact;
	if (onTimepay == 1)
		paymentImpact = PAYMENT_HIS;
	else if (onTimepay >= .95 && onTimepay <= .99)
		paymentImpact = PAYMENT_HIS*.9;
	else if (onTimepay >= .9 && onTimepay <= .94)
		paymentImpact = PAYMENT_HIS*.5;
	else if (onTimepay >= .80 && onTimepay <= .89)
		paymentImpact = PAYMENT_HIS*.2;
	return (paymentImpact);
	
}

double lenthofHistory(double ageofCredits)
{
	double ageImpact;
	if (ageofCredits > 7)
		ageImpact = AGE_RANGE;
	else if (ageofCredits < 7 && ageofCredits >= 5)
		ageImpact = AGE_RANGE*.8;
	else if (ageofCredits >= 2 && ageofCredits <= 4)
		ageImpact = AGE_RANGE*.5;
	else if (ageofCredits < 2)
		ageImpact = AGE_RANGE*.2;
	return (ageImpact);
	
}

double creditTypes(double differentTypes)
{
	double mixImpact;
	if (differentTypes > 5)
		mixImpact = CREDIT_MIX;
	else if (differentTypes <= 4 && differentTypes > 2)
		mixImpact = CREDIT_MIX*.8;
	else if (differentTypes <= 2)
		mixImpact = CREDIT_MIX*.2;
	return (mixImpact);
}


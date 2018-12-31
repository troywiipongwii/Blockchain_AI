
DEBT_RANGE = 165
NEW_ACCOUNTS = 55
PAYMENT_HIST = 192.5
AGE_RANGE = 82.5
CREDIT_MIX = 85
BASE_CREDIT = 300
EXCELLENTCREDIT = 750
GOODCREDIT = 700
FAIRCREDIT = 660

def main(self, amountOwed, newCredit, paymentHistory, lenOfCredit, creditType):
    
    creditScore = amountOwed + newCredit + paymentHistory + lenOfCredit + creditType
    
    if creditScore >= EXCELLENTCREDIT:
        print(' You qualify for the loan you requested at the interest rate requested')
        print(creditScore)
        return creditScore
    elif creditScore >= GOODCREDIT and creditScore <= EXCELLENTCREDIT:
        print(' You qualify for the loan at a slightly higher rate than requested')
        print(creditScore)
        return creditScore
    elif creditScore >= FAIRCREDIT and creditScore <= GOODCREDIT:
        print(' you qualify for a loan, but at a different size and rate than requested')
        print(creditScore)
        return creditScore
    elif creditScore <= FAIRCREDIT:
        print(' We are sorry we cannot help you at this time')
        print(creditScore)
        return creditScore
    

def amount_owed(self, debtRatio):
    debtimpact = 0
    if debtRatio <= .25:
        debtimpact = DEBT_RANGE
        return debtimpact
    elif debtRatio >= .26 and debtRatio <= .40:
        debtimpact = DEBT_RANGE*.8
        return debtimpact
    elif debtRatio >= .47 and debtRatio <= .69:
        debtimpact = DEBT_RANGE*.6
        return debtimpact
    elif debtRatio >= .7:
        debtimpact = DEBT_RANGE*.2
        return debtimpact

def new_credit(self, numberOfNew):
    
    newimpact = 0
    if numberofNew == 0:
        newimpact = NEW_ACCOUNTS
        return newimpact
    elif (numberofNew > 0 and numberofNew <= 2):
        newimpact = NEW_ACCOUNTS*.8
        return newimpact
    elif (numberofNew >= 3 and numberofNew <= 4):
        newimpact = NEW_ACCOUNTS*.5
        return newimpact
    elif(numberofNew > 4):
        newimpact = NEW_ACCOUNTS*.2
        return newimpact

def payment_history(self, onTimePay):
    paymentImpact = 0
    if (onTimepay == 1):
        paymentImpact = PAYMENT_HIS
        return paymentImpact
    elif (onTimepay >= .95 and onTimepay <= .99):
        paymentImpact = PAYMENT_HIS*.9
        return paymentImpact
    elif (onTimepay >= .9 and onTimepay <= .94):
        paymentImpact = PAYMENT_HIS*.5
        return paymentImpact
    elif (onTimepay >= .80 and onTimepay <= .89):
        paymentImpact = PAYMENT_HIS*.2
        return paymentImpact

def len_of_credit(self, ageOfCredit):
    ageImpact = 0
    if (ageofCredits > 7):
        ageImpact = AGE_RANGE
        return ageImpact
    elif (ageofCredits < 7 and ageofCredits >= 5):
        ageImpact = AGE_RANGE*.8
        return ageImpact
    elif (ageofCredits >= 2 and ageofCredits <= 4):
        ageImpact = AGE_RANGE*.5
        return ageImpact
    elif (ageofCredits < 2):
        ageImpact = AGE_RANGE*.2
        return ageImpact

def credit_type(self, diffTypes):
    mixImpact = 0
    if (differentTypes > 5):
        mixImpact = CREDIT_MIX
        return mixImpact
    elif (differentTypes <= 4 and differentTypes > 2):
        mixImpact = CREDIT_MIX*.8
        return mixImpact
    elif (differentTypes <= 2):
        mixImpact = CREDIT_MIX*.2
        return mixImpact    




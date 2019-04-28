DEBT_RANGE = 165
PAYMENT_HIST = 247.5
AGE_RANGE = 167.5
BASE_CREDIT = 300  

EXCELLENTCREDIT = 770
GOODCREDIT = 700
FAIRCREDIT = 650

class FicoScore:
    
    def __init__(self):
        pass   


    def calculate_score(debtRatio, paymentHistory, lenOfCredit, ):   
        
        creditScore =  float(debtRatio + paymentHistory + lenOfCredit + BASE_CREDIT)
        
        return creditScore
        
        
    def amount_owed(debtRatio):
        
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
    
    def payment_history(onTimepay):
        paymentImpact = 0
        if (onTimepay == 1):
            paymentImpact = PAYMENT_HIST
            return paymentImpact
        elif (onTimepay >= .95 and onTimepay <= .99):
            paymentImpact = PAYMENT_HIST*.9
            return paymentImpact
        elif (onTimepay >= .9 and onTimepay <= .94):
            paymentImpact = PAYMENT_HIST*.5
            return paymentImpact
        elif (onTimepay >= .80 and onTimepay <= .89):
            paymentImpact = PAYMENT_HIST*.2
            return paymentImpact
    
    def len_of_credit(ageofCredits):
        ageImpact = 0
        if (ageofCredits >= 7):
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
    
    def loan_determination(credit_score, amount, duration, apr): 
        good_credit_apr = 1.1
        good_credit_duration = .9
        good_credit_amount = .9
        fair_credit_apr = 1.2
        fair_credit_duration = .8
        fair_credit_amount = .8
    
        if credit_score >= EXCELLENTCREDIT:
            apr = apr
            amount =  amount
            duration = duration
        if credit_score < EXCELLENTCREDIT and credit_score > GOODCREDIT:
            apr = apr*good_credit_apr
            amount = amount*good_credit_amount
            duration = duration*good_credit_duration
        if credit_score < GOODCREDIT and credit_score < FAIRCREDIT:
            apr = apr*fair_credit_apr
            amount =  amount*fair_credit_amount
            duration = duration*fair_credit_duration
        if credit_score < FAIRCREDIT:
            apr = 0
            amount = 0
            duration = 0
            
        return amount, duration, apr 
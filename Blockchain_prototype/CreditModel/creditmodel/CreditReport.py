from collections import OrderedDict

from utility.printable import Printable

from FicoScore import FicoScore

EXCELLENTCREDIT = 750
GOODCREDIT = 700
FAIRCREDIT = 660 

class CreditReport(Printable):
    """A individuals credit report.
    
    Attributes:
        :Borrower: The person requesting a loan
        :requested_amount: The requested loan amount
        :amount: The actual amount approved
        :request_length: The duration of loan term requested
        :length: The actual length approved
        :requested_apr: 
        :apr: the actual apr approved
        :late: the amount of times and individual was late on repayments
        :outstanding: whether any loans are still outstanding for the indivual
        :income: the current income of the individual
        :income_changes: amount income has changed since last loan
      
    """
    
    # the actual amounts can't be determined until the credit score is run.  I think I may have organized this incorrectly.  
    # actual amounts shouldn't be initialized at the beginning.....
    
    def __init__(self, borrower,requested_amount,amount,requested_length,length,requested_apr,
                 apr,debtRatio, amountOwed, newCredit,paymentHistory,lenOfCredit, creditType):
        self.borrower = borrower
        self.requested_amount = requested_amount
        self.amount = amount
        self.requested_length = requested_length
        self.length = length
        self.requested_apr = requested_apr
        self.apr = apr
        self.debtRatio = debtRatio
        self.newCredit = newCredit
        self.paymentHistory = paymentHistory
        self.lenOfCredit = lenOfCredit
        self.creditType = creditType 
        
    def to_ordered_dict(self):
        """Converts this transaction into a (hashable) OrderedDict."""
        return OrderedDict([('borrower', self.borrower), ('requested amount', self.requested_amount), ('amount', self.amount), ('requested repayment term',self.requested_length),
                            ('actual term',self.length),('requested apr', self.requested_apr),('actual apr',self.apr),('Debt Ratio',self.debtRatio),('# of new loans',self.newCredit),
                            ('percent of on time payments', self.paymentHistory), ('Length of Credit History', self.lenOfCredit),('# of different types of loans',self.creditType)])    
        
    
    def credit_rating(self):
        
        aO = FicoScore.amount_owed(debtRatio)
        nC = FicoScore.new_credit(newCredit)
        pH = FicoScore.payment_history(paymentHistory)
        loC = FicoScore.len_of_credit(lenOfCredit)
        cT = FicoScore.credit_type(creditType)
        
        creditRating = FicoScore.calculate_score(aO,nC,pH,loC,cT)
        
        good_credit_apr = 1.1
        good_credit_length = .9
        good_credit_amount = .9
        fair_credit_apr = 1.2
        fair_credit_length = .8
        fair_credit_amount = .8        
        
        if creditRating >= EXCELLENTCREDIT:
            self.apr = self.requested_apr
            self.amount =  self.requested_amount
            self.length = self.requested_length           
        if creditRating < EXCELLENTCREDIT and creditRating > GOODCREDIT:
            self.apr = self.requested_apr*good_credit_apr
            self.amount =  self.requested_amount*good_credit_amount
            self.length = self.requested_length*good_credit_length
        if creditRating < GOODCREDIT and creditRating < FAIRCREDIT:
            self.apr = self.requested_apr*fair_credit_apr
            self.amount =  self.requested_amount*fair_credit_amount
            self.length = self.requested_length*fair_credit_length
        if creditRating < FAIRCREDIT:
            pass
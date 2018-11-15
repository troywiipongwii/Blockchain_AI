class CreditReport():
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
    def __init__(self, borrower,requested_amount,amount,requested_length,length,requested_apr,
                 apr,late,outstanding,income,income_changes):
        self.borrower = borrower
        self.requested_amount = requested_amount
        self.amount = amount
        self.requested_length = requested_length
        self.length = length
        self.requested_apr = requested_apr
        self.apr = apr
        self.outstanding = outstanding
        self.income = income
        self.income_changes = income_changes
        
    
    def credit_rating():
        pass
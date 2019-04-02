#These functions belong to the verification script.
# Functions for verifying loan authenticity should be created in a similar fashion.  


# still thinking through the logic of this loan verification process.  not sure if this is necessary like this.  maybe exapnd the definition of 
# transactions  
@staticmethod
def verify_loan_transaction(transaction, get_credit_score, check_score=True):
    """Verify an authentic loan by checking credit score, if credit score
    is above the threshhold the loan is authentic and should be in transactions

    Arguments:
        :transaction: The transaction that should be verified.
    """
    if check_credit_score:
        borrower_score = get_credit_score(transaction.borrower)
        return borrower_score >= transaction.amount and Wallet.verify_transaction(transaction)
    else:
        return Wallet.verify_transaction(transaction)

@classmethod
def verify_transactions(cls, open_transactions, get_balance):
    """Verifies all open transactions."""
    return all([cls.verify_transaction(tx, get_balance, False) for tx in open_transactions])

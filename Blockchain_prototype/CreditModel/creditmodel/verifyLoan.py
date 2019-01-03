#These functions belong to the verification script.
# Functions for verifying loan authenticity should be created in a similar fashion.  



@staticmethod
def verify_transaction(transaction, get_balance, check_funds=True):
    """Verify a transaction by checking whether the sender has sufficient coins.

    Arguments:
        :transaction: The transaction that should be verified.
    """
    if check_funds:
        sender_balance = get_balance(transaction.sender)
        return sender_balance >= transaction.amount and Wallet.verify_transaction(transaction)
    else:
        return Wallet.verify_transaction(transaction)

@classmethod
def verify_transactions(cls, open_transactions, get_balance):
    """Verifies all open transactions."""
    return all([cls.verify_transaction(tx, get_balance, False) for tx in open_transactions])
from collections import OrderedDict

from utility.printable import Printable
from FicoScore import FicoScore

class Transaction(Printable):
    """A transaction which can be added to a block in the blockchain.

    Attributes:
        :sender: The sender of the coins.
        :recipient: The recipient of the coins.
        :signature: The signature of the transaction.
        :amount: The amount of coins sent.
    """
    def __init__(self, sender, recipient, signature, amount, length = 0, apr = 0):
        self.sender = sender
        self.recipient = recipient
        self.amount = amount
        self.length = length
        self.apr = apr
        self.signature = signature

    def to_ordered_dict(self):
        """Converts this transaction into a (hashable) OrderedDict."""
        return OrderedDict([('sender', self.sender), ('recipient', self.recipient), ('amount', self.amount),
                            ('length',self.length),('apr',self.apr)])


    def credit_rating(self, a0, pH, loC):
        
        aO = FicoScore.amount_owed(debtRatio)
        pH = FicoScore.payment_history(paymentHistory)
        loC = FicoScore.len_of_credit(lenOfCredit)
        
        creditRating = FicoScore.calculate_score(aO,pH,loC)
        
        return creditRating
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
    def __init__(self, sender, recipient, signature, amount, duration = 0, apr = 0):
        self.sender = sender
        self.recipient = recipient
        self.amount = amount
        self.duration = duration
        self.apr = apr
        self.signature = signature

    def to_ordered_dict(self):
        """Converts this transaction into a (hashable) OrderedDict."""
        return OrderedDict([('sender', self.sender), ('recipient', self.recipient), ('amount', self.amount),
                            ('duration',self.duration),('apr',self.apr)])

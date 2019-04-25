from functools import reduce
import hashlib as hl
import wallet

import json
import pickle

# Import two functions from our hash_util.py file. Omit the ".py" in the import
from utility.hash_util import hash_block
from utility.verification import Verification
from block import Block
from transaction import Transaction
from wallet import Wallet

# The reward we give to miners (for creating a new block)
MINING_REWARD = 10
EXCELLENTCREDIT = 770
GOODCREDIT = 700
FAIRCREDIT = 650

print(__name__)

class Blockchain:
    """The Blockchain class manages the chain of blocks as well as open transactions and the node on which it's running.
    
    Attributes:
        :chain: The list of blocks
        :open_transactions (private): The list of open transactions
        :hosting_node: The connected node (which runs the blockchain).
    """
    def __init__(self, hosting_node_id):
        """The constructor of the Blockchain class."""
        # Our starting block for the blockchain
        genesis_block = Block(0, '', [], 100, 0)
        # Initializing our (empty) blockchain list
        self.chain = [genesis_block]
        # Unhandled transactions
        self.__open_transactions = []
        self.load_data()
        self.hosting_node = hosting_node_id

    # This turns the chain attribute into a property with a getter (the method below) and a setter (@chain.setter)
    @property
    def chain(self):
        return self.__chain[:]

    # The setter for the chain property
    @chain.setter 
    def chain(self, val):
        self.__chain = val


    def get_open_transactions(self):
        """Returns a copy of the open transactions list."""
        return self.__open_transactions[:]

    def load_data(self):
        """Initialize blockchain + open transactions data from a file."""
        try:
            with open('blockchain.txt', mode='r') as f:
                # file_content = pickle.loads(f.read())
                file_content = f.readlines()
                # blockchain = file_content['chain']
                # open_transactions = file_content['ot']
                blockchain = json.loads(file_content[0][:-1])
                # We need to convert  the loaded data because Transactions should use OrderedDict
                updated_blockchain = []
                for block in blockchain:
                    converted_tx = [Transaction(
                        tx['sender'], tx['recipient'], tx['signature'], tx['amount']) for tx in block['transactions']]
                    updated_block = Block(
                        block['index'], block['previous_hash'], converted_tx, block['proof'], block['timestamp'])
                    updated_blockchain.append(updated_block)
                self.chain = updated_blockchain
                open_transactions = json.loads(file_content[1])
                # We need to convert  the loaded data because Transactions should use OrderedDict
                updated_transactions = []
                for tx in open_transactions:
                    updated_transaction = Transaction(
                        tx['sender'], tx['recipient'], tx['signature'], tx['amount'])
                    updated_transactions.append(updated_transaction)
                self.__open_transactions = updated_transactions
        except (IOError, IndexError):
            pass
        finally:
            print('Cleanup!')

    def save_data(self):
        """Save blockchain + open transactions snapshot to a file."""
        try:
            with open('blockchain.txt', mode='w') as f:
                saveable_chain = [block.__dict__ for block in [Block(block_el.index, block_el.previous_hash, [
                    tx.__dict__ for tx in block_el.transactions], block_el.proof, block_el.timestamp) for block_el in self.__chain]]
                f.write(json.dumps(saveable_chain))
                f.write('\n')
                saveable_tx = [tx.__dict__ for tx in self.__open_transactions]
                f.write(json.dumps(saveable_tx))
                # save_data = {
                #     'chain': blockchain,
                #     'ot': open_transactions
                # }
                # f.write(pickle.dumps(save_data))
        except IOError:
            print('Saving failed!')

    def proof_of_work(self):
        """Generate a proof of work for the open transactions, the hash of the previous block and a random number (which is guessed until it fits)."""
        last_block = self.__chain[-1]
        last_hash = hash_block(last_block)
        proof = 0
        # Try different PoW numbers and return the first valid one
        while not Verification.valid_proof(self.__open_transactions, last_hash, proof):
            proof += 1
        return proof
    
    def first_time_borrow(self):
        user_input = input('First Loan? 0 for yes 1 for no: ')
        return user_input
    
    def check_credit_score(self, first_time):
        participant = self.hosting_node
        loan_sender = 'LOAN'
        
        if first_time == '0':
            credit_score = 660
            print('Your credit score is: ', credit_score)
        elif first_time == '1':
            loan_length = [[float(tx.length) for tx in block.transactions
                            if tx.recipient == participant and
                            tx.sender == loan_sender] for block in self.__chain]
            
            loan_len_value = 12
            
            loan_borrower = [[tx.amount for tx in block.transactions
                              if tx.recipient == participant and
                              tx.sender == loan_sender] for block in self.__chain]
            
            loan_borrower_open = [tx.amount for tx in self.__open_transactions
                              if tx.recipient == participant and tx.sender == loan_sender]
            
            loan_borrower.append(loan_borrower_open)
            
            print(loan_borrower)
            
            amount_received = reduce(lambda tx_sum, tx_amt: tx_sum + sum(tx_amt)
                                     if len(tx_amt) > 0 else tx_sum + 0, loan_borrower, 0)
            
            tx_sender = [[tx.amount for tx in block.transactions
                          if tx.sender == participant and
                          tx.recipient == loan_sender] for block in self.__chain]
            # Fetch a list of all sent coin amounts for the given person (empty lists are returned if the person was NOT the sender)
            # This fetches sent amounts of open transactions (to avoid double spending)
            open_tx_sender = [tx.amount
                              for tx in self.__open_transactions if tx.sender == participant
                              and tx.recipient == loan_sender]
            tx_sender.append(open_tx_sender)
            print(tx_sender)
            
            amount_sent = reduce(lambda tx_sum, tx_amt: tx_sum + sum(tx_amt)
                                 if len(tx_amt) > 0 else tx_sum + 0, tx_sender, 0) 
            num_of_payments = len(tx_sender)
            num_of_loans = len(loan_borrower)
            
            debt_ratio = (amount_received - amount_sent)/amount_received
            payment_history = (loan_len_value - num_of_payments)/loan_len_value
            age_credit = len(tx_sender)
            credit_score = Transaction.credit_rating(debt_ratio,payment_history,age_credit)
            print('Your credit score is: ', credit_score)
        
       
        return credit_score
            
        
    def get_balance(self):
        """Calculate and return the balance for a participant.
        """
        participant = self.hosting_node
        # Fetch a list of all sent coin amounts for the given person (empty lists are returned if the person was NOT the sender)
        # This fetches sent amounts of transactions that were already included in blocks of the blockchain
        tx_sender = [[tx.amount for tx in block.transactions
                      if tx.sender == participant] for block in self.__chain]
        # Fetch a list of all sent coin amounts for the given person (empty lists are returned if the person was NOT the sender)
        # This fetches sent amounts of open transactions (to avoid double spending)
        open_tx_sender = [tx.amount
                          for tx in self.__open_transactions if tx.sender == participant]
        tx_sender.append(open_tx_sender)
        print(tx_sender)
        amount_sent = reduce(lambda tx_sum, tx_amt: tx_sum + sum(tx_amt)
                             if len(tx_amt) > 0 else tx_sum + 0, tx_sender, 0)
        # This fetches received coin amounts of transactions that were already included in blocks of the blockchain
        # We ignore open transactions here because you shouldn't be able to spend coins before the transaction was confirmed + included in a block
        tx_recipient = [[tx.amount for tx in block.transactions
                         if tx.recipient == participant] for block in self.__chain]
        amount_received = reduce(lambda tx_sum, tx_amt: tx_sum + sum(tx_amt)
                                 if len(tx_amt) > 0 else tx_sum + 0, tx_recipient, 0)
        # Return the total balance
        return amount_received - amount_sent

    def get_last_blockchain_value(self):
        """ Returns the last value of the current blockchain. """
        if len(self.__chain) < 1:
            return None
        return self.__chain[-1]

    # This function accepts two arguments.
    # One required one (transaction_amount) and one optional one (last_transaction)
    # The optional one is optional because it has a default value => [1]

    def add_transaction(self, recipient, sender, signature, amount=1.0, length = 0, apr = 0):
        """ Append a new value as well as the last blockchain value to the blockchain.

        Arguments:
            :sender: The sender of the coins.
            :recipient: The recipient of the coins.
            :amount: The amount of coins sent with the transaction (default = 1.0)
        """
        # transaction = {
        #     'sender': sender,
        #     'recipient': recipient,
        #     'amount': amount
        # }
        if self.hosting_node == None:
            return False
        
        transaction = Transaction(sender, recipient, signature, amount)
        if Verification.verify_transaction(transaction, self.get_balance):
            self.__open_transactions.append(transaction)
            self.save_data()
            return True
        return False
    
    def accept_loan(self, credit_score, amount, length, apr):
        '''Here Loan request is a special kind of mining, where the loan approval is 
        its own transaction and block.  No POW is done here.  This is inefficient and should 
        not be done.  The problem is that without doing this as of now, it is not possible
        to add the loan to the block due to lack of sender signature.'''
        
        if self.hosting_node == None:
            return None  
        
        last_block = self.__chain[-1]
        # Hash the last block (=> to be able to compare it to the stored hash value)
        hashed_block = hash_block(last_block)
        proof = self.proof_of_work()        
        
        good_credit_apr = 1.1
        good_credit_length = .9
        good_credit_amount = .9
        fair_credit_apr = 1.2
        fair_credit_length = .8
        fair_credit_amount = .8
    
        if credit_score >= EXCELLENTCREDIT:
            apr = apr
            amount =  amount
            length = length
        if credit_score < EXCELLENTCREDIT and credit_score > GOODCREDIT:
            apr = apr*good_credit_apr
            amount = amount*good_credit_amount
            length = length*good_credit_length
        if credit_score < GOODCREDIT and credit_score < FAIRCREDIT:
            apr = apr*fair_credit_apr
            amount =  amount*fair_credit_amount
            length = length*fair_credit_length
        if credit_score < FAIRCREDIT:
            apr = 0
            amount = 0
            length = 0
        
        
        loan_transaction = Transaction('LOAN', self.hosting_node, '' , amount, length, apr)
        
        copied_transactions = self.__open_transactions[:]
        for tx in copied_transactions:
            if not Wallet.verify_transaction(tx):
                return False
        copied_transactions.append(loan_transaction)
        block = Block(len(self.__chain), hashed_block,
                      copied_transactions, proof)
        self.__chain.append(block)
        self.__open_transactions = []
        self.save_data()
        return True           
        
    

    def mine_block(self):
        """Create a new block and add open transactions to it."""
        # Fetch the currently last block of the blockchain
        if self.hosting_node == None:
            return False
        last_block = self.__chain[-1]
        # Hash the last block (=> to be able to compare it to the stored hash value)
        hashed_block = hash_block(last_block)
        proof = self.proof_of_work()
        # Miners should be rewarded, so let's create a reward transaction
        # reward_transaction = {
        #     'sender': 'MINING',
        #     'recipient': owner,
        #     'amount': MINING_REWARD
        # }
        reward_transaction = Transaction('MINING', self.hosting_node, '', MINING_REWARD)
        # Copy transaction instead of manipulating the original open_transactions list
        # This ensures that if for some reason the mining should fail, we don't have the reward transaction stored in the open transactions
        copied_transactions = self.__open_transactions[:]
        for tx in copied_transactions:
            if not Wallet.verify_transaction(tx):
                return False
        copied_transactions.append(reward_transaction)
        block = Block(len(self.__chain), hashed_block,
                      copied_transactions, proof)
        self.__chain.append(block)
        self.__open_transactions = []
        self.save_data()
        return True

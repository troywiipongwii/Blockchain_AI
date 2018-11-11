import functools
import hashlib
import json
from collections import OrderedDict
# encodes complex data structures to a string
# use as to shorten name of modules

MINING_REWARD = 25

genesis_block = {
    'previous_hash': '', 
    'index': 0, 
    'transactions': '',
    'proof': 100
    }  

blockchain = [genesis_block]
open_transactions = []
owner = 'Troy'  # unique identifier 
participants = {'Troy'}

def valid_proof(transactions, last_hash, proof):
    guess = (str(transactions) + str(last_hash) + str(proof)).encode()
    guess_hash = hashlib.sha256(guess, sort_keys = True).hexdigest()
    print(guess_hash)
    return guess_hash[0:1] == '0'

def proof_of_work():
    last_block = blockchain[-1]
    last_hash = hash_block(last_block)
    proof = 0
    while not valid_proof(open_transactions, last_hash, proof):
        # not needs to be added so it runs until it finds a valid proof
        proof += 1
    return proof

def verify_transaction(transaction):
    sender_balance = get_balance(transaction['sender'])
    return sender_balance >= transaction['amount']

def hash_block(block):
    return hashlib.sha256(json.dumps(block).encode()).hexdigest()
#encode allows you to convert utf8
#hex converts binary back to human readable

def get_balance(participant):
    # use reduce function to sum
    tx_sender = [[tx['amount'] for tx in block['transactions'] if tx['sender'] == participant] for block in blockchain]
    # list comprehension
    open_tx_sender = [tx['amount'] for tx in open_transactions if tx['sender'] == participant]
    tx_sender.append(open_tx_sender) # restricts what we can send to past and present
    amount_sent = 0
    for tx in tx_sender:
        if len(tx) > 0: #will get an error because it was initialized to zero
            amount_sent += tx[0]
            
    tx_recipient = [[tx['amount'] for tx in block['transactions'] if tx['recipient'] == participant] for block in blockchain]
    amount_received = 0
    for tx in tx_recipient:
        if len(tx) > 0: 
            amount_received += tx[0]    
    return amount_received - amount_sent

def get_last_blockchain_value():
    """ returns the last value of the current blockchain."""
    if len(blockchain) <1:
        return None
    return blockchain [-1]

# the order of parameters is important when u have defaults
def add_transaction(recipient, sender = owner, amount=1.0):
    # transaction = OrderedDict([('sender',sender),('recipient',recipient),])
    transaction = {'sender': sender, 
                   'recipient': recipient, 
                   'amount': amount}
    if verify_transaction(transaction):
        open_transactions.append(transaction)
        participants.add(sender)
        participants.add(recipient)
        return True
    return False
    
def mine_block():
    last_block = blockchain[-1]
    hashed_block = hash_block(last_block)
    proof = proof_of_work()
    reward_transaction = {
        'sender': 'MINING',
        'recipient': owner,
        'amount': MINING_REWARD
    }
    # by reference vs by value with complex data structures
    # range only creates a shallow copy, doesn't effect nested data scructures
    copied_transactions = open_transactions[:]
    open_transactions.append(reward_transaction)
    block = {'previous_hash': hashed_block, 
             'index': len(blockchain), 
             'transactions': open_transactions,
             'proof': proof
             }
    blockchain.append(block)
    #open_transactions = []  will cause an error because it is local
    return True

def get_transaction_value():
    """ Returns the input of the user ( a new transaction amount as a float."""
    
    tx_recipient = str(input('Enter the recipient of the transaction:'))
    tx_amount = float(input('Your transaction amount please: '))
    return (tx_recipient, tx_amount)

def get_user_choice():
    user_input = str(input('Please select and option: '))
    return user_input

def print_blockchain_elements():
    for block in blockchain:
        print('Outputting Block')
        print(block)
    else:
        print('-'* 20)
        
def verify_chain():
    for (index,block) in enumerate(blockchain):
        if index == 0:
            continue
        if block['previous_hash'] != hash_block(blockchain[index -1]):
            return False
        if not valid_proof(block['transactions'][:-1], block['previous_hash'],block['proof']):
            return False
        #exlude the reward transactions
    return True
        

waiting_for_input = True
while waiting_for_input:
    print('Please Choose')
    print('1: Add a new transaction\n 2: Output the blockchain\n h: manipulate the chain\n q: Quit\n 3: mine a new block' '7: Output participants\n')
    user_choice = get_user_choice()
    if user_choice =='1':
        tx_data = get_transaction_value()
        # unpack tuples
        recipient, amount = tx_data
        if add_transaction(recipient, amount = amount):
            print('Added transaction!')
        else:
            print('Transaction Failed!')
        print(open_transactions)
    elif user_choice =='2':
        print_blockchain_elements()
    elif user_choice =='3':
        if mine_block():
            open_transactions = []
    elif user_choice =='4':
        if len(blockchain) >= 1:
            blockchain[0] = 2
    elif user_choice =='5':
        waiting_for_input == False
    elif user_choice =='7':
        print(partipants)
    else:
        print('Input was invalid, please pick a value from the list!')
    
else:
    print('User left')
    
if not verify_chain():
    print_blockchain_elements()
    print('Invalid blockchain!')

        
        

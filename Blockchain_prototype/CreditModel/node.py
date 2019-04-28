from flask import Flask, jsonify, request, send_from_directory
from flask_cors import CORS

from wallet import Wallet
from blockchain import Blockchain
from ficoscore import FicoScore

app = Flask(__name__)
wallet = Wallet()
blockchain = Blockchain(wallet.public_key)
CORS(app)

@app.route('/', methods=['GET'])
def get_ui():
    return send_from_directory('ui', 'node.html')


@app.route('/wallet', methods=['POST'])
def create_keys():
    wallet.create_keys()
    if wallet.save_keys(): 
        global blockchain
        blockchain = Blockchain(wallet.public_key)
        credit_score = 660
        response = {
            'public_key': wallet.public_key,
            'private_key': wallet.private_key,
            'funds': blockchain.get_balance(),
            'credit': check_credit_score()
        }
        return jsonify(response), 201
    else:
        response = {
            'message': 'Saving the keys failed.'
        }
        return jsonify(response), 500


@app.route('/wallet', methods=['GET'])
def load_keys():
    if wallet.load_keys():
        global blockchain
        blockchain = Blockchain(wallet.public_key)
        credit_score = 660
        response = {
            'public_key': wallet.public_key,
            'private_key': wallet.private_key,
            'funds': blockchain.get_balance(),
            'credit': blockchain.check_credit_score()
        }
        return jsonify(response), 201
    else:
        response = {
            'message': 'Loading the keys failed.'
        }
        return jsonify(response), 500


@app.route('/credit-score', methods=['GET'])
def check_credit_score():
    credit = blockchain.check_credit_score()
    if credit != None:
        response = {
            'message': 'Fetched credit_score successfully.',
            'credit': credit
            }
        return jsonify(response), 200
    else:
        response = {
            'message': 'Loading credit score failed.',
            'wallet_set_up': wallet.public_key != None
        }
        return jsonify(response), 500


            
@app.route('/transaction', methods=['POST'])
def add_transaction():
    if wallet.public_key == None:
        response = {
            'message': 'No wallet set up.'
        }
        return jsonify(response), 400
    values = request.get_json()
    if not values:
        response = {
            'message': 'No data found.'
        }
        return jsonify(response), 400
    required_fields = ['recipient', 'amount']
    if not all(field in values for field in required_fields):
        response = {
            'message': 'Required data is missing.'
        }
        return jsonify(response), 400
    recipient = values['recipient']
    amount = values['amount']
    signature = wallet.sign_transaction(wallet.public_key, recipient, amount)
    success = blockchain.add_transaction(recipient, wallet.public_key, signature, amount)
    if success:
        response = {
            'message': 'Successfully added transaction.',
            'transaction': {
                'sender': wallet.public_key,
                'recipient': recipient,
                'amount': amount,
                'signature': signature
            },
            'funds': blockchain.get_balance()
            
        }
        return jsonify(response), 201
    else:
        response = {
            'message': 'Creating a transaction failed.'
        }
        return jsonify(response), 500

@app.route('/loan', methods=['POST'])
def request_loan():
    if wallet.public_key == None:
        response = {
            'message': 'No wallet set up.'
        }
        return jsonify(response), 400
    values = request.get_json()
    if not values:
        response = {
            'message': 'No data found.'
        }
        return jsonify(response), 400
    required_fields = ['amount','duration','apr']
    if not all(field in values for field in required_fields):
        response = {
            'message': 'Required data is missing.'
        }
        return jsonify(response), 400
    recipient = wallet.public_key
    amount = values['amount']
    duration = values['duration']
    apr = values['apr']
    credit_score = blockchain.check_credit_score()
    loan_data = FicoScore.loan_determination(credit_score, amount, duration, apr)
    tx_amount, tx_duration, tx_apr = loan_data    
    success = blockchain.accept_loan(credit_score, tx_amount, tx_duration, tx_apr)
    if success:
        response = {
            'message': 'Loan successfully processed.',
            'transaction': {
                'sender': 'Loan',
                'recipient': wallet.public_key,
                'amount': amount,
                'duration': duration,
                'apr' : apr
            },
            'credit': blockchain.check_credit_score()
        }
        return jsonify(response), 201
    else:
        response = {
            'message': 'Loan request failed.'
        }
        return jsonify(response), 500

@app.route('/mine', methods=['POST'])
def mine():
    block = blockchain.mine_block()
    if block != None:
        dict_block = block.__dict__.copy()
        dict_block['transactions'] = [
            tx.__dict__ for tx in dict_block['transactions']]
        credit_score = 660
        response = {
            'message': 'Block added successfully.',
            'block': dict_block,
            'funds': blockchain.get_balance(),
            'credit': blockchain.check_credit_score()
        }
        return jsonify(response), 201
    else:
        response = {
            'message': 'Adding a block failed.',
            'wallet_set_up': wallet.public_key != None
        }
        return jsonify(response), 500


@app.route('/transactions', methods=['GET'])
def get_open_transaction():
    transactions = blockchain.get_open_transactions()
    dict_transactions = [tx.__dict__ for tx in transactions]
    return jsonify(dict_transactions), 200


@app.route('/chain', methods=['GET'])
def get_chain():
    chain_snapshot = blockchain.chain
    dict_chain = [block.__dict__.copy() for block in chain_snapshot]
    for dict_block in dict_chain:
        dict_block['transactions'] = [
            tx.__dict__ for tx in dict_block['transactions']]
    return jsonify(dict_chain), 200


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)

# This function is a part of the blockchain script should go under add transaction.


def request_loan(self, borrower,requested_amount,amount,requested_length,length,requested_apr,
                 apr,debtRatio, amountOwed, newCredit,paymentHistory,lenOfCredit, creditType, signature):
    """ Append a new value as well as the last blockchain value to the blockchain.

    Arguments:

    """
    # transaction = {
    #     'sender': sender,
    #     'recipient': recipient,
    #     'amount': amount
    # }
    # if self.public_key == None:
    #     return False
    loanRequest = LoanRequest(self, borrower,requested_amount,amount,requested_length,length,requested_apr,
                 apr,debtRatio, amountOwed, newCredit,paymentHistory,lenOfCredit, creditType, signature)
    
    
    #adjust the following to accomodate loan requests.
    '''
    if Verification.verify_transaction(transaction, self.get_balance):
        self.__open_transactions.append(transaction)
        self.save_data()
        if not is_receiving:
            for node in self.__peer_nodes:
                url = 'http://{}/broadcast-transaction'.format(node)
                try:
                    response = requests.post(url, json={
                                             'sender': sender, 'recipient': recipient, 'amount': amount, 'signature': signature})
                    if response.status_code == 400 or response.status_code == 500:
                        print('Transaction declined, needs resolving')
                        return False
                except requests.exceptions.ConnectionError:
                    continue
        return True
    return False
    '''
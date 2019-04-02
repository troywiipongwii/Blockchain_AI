Code associated with the credit scoring model lives here.  


# Things to do:

1. On Verification.py  there should be two types of transaction verification, one for verifying a valid loan, one for verifying a traditional transaction. A transaction type value should trigger whether the verification process will request a balance or a credit score to verify the transaction
2. On Blockchain.py  under add transaction, there should be two types of transactions that are triggered by by the value of the type of transaction.  If transactiontype = loanrequest = 1,  the transaction datastructure will be pulled from the CreditReport class if transactiontype = transaction = 0 the transaction data structure will come from the transaction class
3.  the get_score function will call on the LoanRequest class and calculate the based on FicoScore.py   The get_score function has to pull data from previous transactions that relate to the borrower.  The beginning of this function is in get_score.py  which will be implemented in blockchain.py  
  - in get_score,  the debt_ratio is calculated as the value of the amount borrowed by the borrower and the amount sent back to the network divided by the total amount borrowed.  this is an easy calculation as we just reverse the way in which we calculate balance in get balance.  on time payments is a calculation of the count of payments sent within a particular window.
  - may reduce the credit score to fewer functions to get it up and running before adding complexity.  

export function ViewPayments({ paymentData }) {
    return (
        <div>
            <h1>Terima Kasih</h1>
            <Payment payment={paymentData.payment} paymentInfo={paymentData.paymentInfo}/>
            <Transaction transaction={paymentData.transaction}/>
        </div>
    )
}

export function Payment({ payment, paymentInfo }) {
    return (
        <div>
            <h1>Payment</h1>
            {
                JSON.stringify(payment)
            }

            <h1>Payment Info</h1>
            {
                JSON.stringify(paymentInfo)
            }
        </div>
    )   
}

export function Transaction({ transaction }) {
    return (
        <div>
            <h1>Transaction</h1>
            {
                JSON.stringify(transaction)
            }
        </div>
    )   
}


import { Fragment, useEffect, useState } from 'react';
import { Tabs, Table, Accordion } from '@mantine/core';
import PaymentStepper from './stepper';
import { Card } from 'react-bootstrap';
import classes from './payments.module.css';

export default function Payments({ user, forwarding, paymentData, userPayment }) {

    const [activeTab, setActiveTab] = useState(0);
    const [donePayment, setDonePayment] = useState({});
    const [rows, setRows] = useState(null);

    useEffect(() => {
        if (forwarding) {
            setActiveTab(forwarding);
        }
    });

    if(user !== null && rows === null) {
        setRows(userPayment.map((payment, index) => (
            <Accordion.Item key={index} value={index.toString()} className=''>
                <Accordion.Control>
                    <div className="row">
                        <div className="col-2">{payment.id}</div>
                        <div className="col-2">{payment.reference_number}</div>
                        <div className="col-2">{payment.reference_number}</div>
                        <div className="col-3">{payment.created_at}</div>
                        <div className="d-flex col-3 justify-content-end">
                            {payment.amount !== undefined && payment.amount !== null && !isNaN(payment.amount)
                                ? 'RM ' + Number(payment.amount).toFixed(2)
                                : '0.00'}
                        </div>
                    </div>
                </Accordion.Control>
                <Accordion.Panel>
                    <tr>
                        <th>Payment</th>
                        <th>{payment.payment_type_id}</th>
                    </tr>
                    {payment.transactions[0] === undefined ? '' : (
                        <>
                            <tr>
                                <th>Transactions</th>
                            </tr>
                            <tr>
                                <th>
                                    {payment.transactions[0].reason || ''}
                                </th>
                                <th>
                                    {payment.transactions[0].payment_type.name || ''}
                                </th>
                                <th>
                                    {payment.transactions[0].payment_status.name || ''}
                                </th>
                                <th>
                                    {/* {payment.transactions[0].user_payment.card_number || ''} */}
                                </th>
                            </tr>   
                        </>
                    )}
    
                </Accordion.Panel>
            </Accordion.Item>
        )))
    }

    return (
        <Tabs color="teal" defaultValue="first">
            <Tabs.List>
                <Tabs.Tab value="first">Payments</Tabs.Tab>
                <Tabs.Tab value="second" color="blue">
                    Payments Listing
                </Tabs.Tab>
            </Tabs.List>

            <Tabs.Panel value="first" pt="xs">
                <h1 className="mb-4">{user ? 'Semak Akaun' : 'Register Akaun'}</h1>
                <PaymentStepper
                    activeTab={activeTab}
                    setActiveTab={setActiveTab}
                    user={user}
                    paymentData={paymentData}
                    setDonePayment={setDonePayment}
                    donePayment={donePayment}
                />
            </Tabs.Panel>

            <Tabs.Panel value="second" pt="xs">
                <h1 className="mb-4">Senarai Bayaran</h1>

                <Card className={classes.card}>
                    <div className={classes.card_header}></div>
                    <table className={classes.card_body}>
                        <thead>
                            <tr>
                                <th className='p-2'>Senarai Bayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <Accordion defaultValue={'0'}>
                                {
                                    rows
                                }
                            </Accordion>
                        </tbody>
                    </table>
                    <div className={classes.card_footer}></div>
                </Card>
            </Tabs.Panel>
        </Tabs>
    );
}
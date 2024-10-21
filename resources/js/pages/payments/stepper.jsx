import React, { useState } from 'react';
import { Stepper, Group } from '@mantine/core';
import { RegistrationForm } from './register-update-forms';
import { PaymentForms } from './payments-forms';
import { ViewPayments } from './payments-view';

export default function PaymentStepper({ activeTab, setActiveTab, user, paymentData }) {

    const [donePayment, setDonePayment] = useState({});

    return (
        <Stepper active={activeTab} onStepClick={value => activeTab != 1 ? setActiveTab(value) : null}>
            <Stepper.Step label={user ? 'Semak Akaun' : 'Register'} description={user ? 'Semak Akaun Anda' : 'Cipta Akaun Baru'}>
                <Group position="center">
                    <RegistrationForm activeTab={activeTab} setActiveTab={setActiveTab} user={user} />
                </Group>
            </Stepper.Step>
            <Stepper.Step label="Bayar" description="Buat Pembayaran">
                <div className="row">
                    <Group position="center">
                        <PaymentForms activeTab={activeTab} setActiveTab={setActiveTab} user={user} paymentData={paymentData} setDonePayment={setDonePayment} donePayment={donePayment}/>
                    </Group>
                </div>
            </Stepper.Step>
            <Stepper.Step label="Semak" description="Semak Pembayaran">
                <div className="row">
                    <Group position="center">
                        <ViewPayments paymentData={donePayment}/>
                    </Group>
                </div>
            </Stepper.Step>
        </Stepper>
    )
}
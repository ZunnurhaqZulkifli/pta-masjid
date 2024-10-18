import React from 'react';
import { Stepper, Group } from '@mantine/core';
import { RegistrationForm } from './register-update-forms';
import { PaymentForms } from './payments-forms';

export default function PaymentStepper({ activeTab, setActiveTab, user, paymentData }) {
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
                        <PaymentForms activeTab={activeTab} setActiveTab={setActiveTab} user={user} paymentData={paymentData} />
                    </Group>
                </div>
            </Stepper.Step>
            <Stepper.Step label="Semak" description="Semak Pembayaran">
                Step 3 content: Get full access
            </Stepper.Step>
            <Stepper.Completed>
                Completed, click back button to get to previous step
            </Stepper.Completed>
        </Stepper>
    )
}
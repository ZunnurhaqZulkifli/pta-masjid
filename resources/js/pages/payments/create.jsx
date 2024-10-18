import { useEffect, useState } from 'react';
import { Tabs } from '@mantine/core';
import PaymentStepper from './stepper';

export default function Payments({ user, forwarding, paymentData }) {

    const [activeTab, setActiveTab] = useState(0);

    useEffect(() => {
        if(forwarding) {
            setActiveTab(forwarding);
        }
    });

    return (
        <>
            <Tabs color="teal" defaultValue="first">
                <Tabs.List>
                    <Tabs.Tab value="first">Payments</Tabs.Tab>
                    <Tabs.Tab value="second" color="blue">
                        Payments Listing
                    </Tabs.Tab>
                </Tabs.List>

                <Tabs.Panel value="first" pt="xs">
                    <h1 className='mb-4'>{ user ? 'Semak Akaun' : 'Register Akaun'}</h1>
                    <PaymentStepper activeTab={activeTab} setActiveTab={setActiveTab} user={user} paymentData={paymentData}/>
                </Tabs.Panel>

                <Tabs.Panel value="second" pt="xs">
                    {/* TODO : Buat Payments Listing */}
                </Tabs.Panel>
            </Tabs>
        </>
    );
}
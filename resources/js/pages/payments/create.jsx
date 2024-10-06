import { useState, useEffect } from 'react';
import { Stepper, Button, Group } from '@mantine/core';
import { Tabs } from '@mantine/core';

export default function Payments({ user }) {

    const [active, setActive] = useState(1);
    const [activeTab, setActiveTab] = useState('public');
    const [availableTabs, setAvailableTabs] = useState({});
    
    const nextStep = () => setActive((current) => (current < 3 ? current + 1 : current));
    const prevStep = () => setActive((current) => (current > 0 ? current - 1 : current));

    let tabs = {
        'public': {
            title: 'Public',
            content: <>
                <h1>Public Payments</h1>

                <Stepper active={active} onStepClick={setActive}>
                    <Stepper.Step label="First step" description="Create an account">
                        Step 1 content: Create an account
                    </Stepper.Step>
                    <Stepper.Step label="Second step" description="Verify email">
                        Step 2 content: Verify email
                    </Stepper.Step>
                    <Stepper.Step label="Final step" description="Get full access">
                        Step 3 content: Get full access
                    </Stepper.Step>
                    <Stepper.Completed>
                        Completed, click back button to get to previous step
                    </Stepper.Completed>
                </Stepper>

                <Group justify="center" mt="xl">
                    <Button variant="default" onClick={prevStep}>Back</Button>
                    <Button onClick={nextStep}>Next step</Button>
                </Group>
            </>,
        },

        'internal-payment': {
            title: 'Internal Payment',
            content: <>
                <h1>Internal Payment</h1>
            </>,
        },

        'account': {
            title: 'Account',
            content: <>
                <h1>Content Tab</h1>
            </>,
        },
    }

    function setUserSettings() {
        console.log(user);

        if (user) {
            const updatedTabs = {
                'public': {
                    title: 'Public',
                    content: <>
                        <h1>Public Payments</h1>

                        <Stepper active={active} onStepClick={setActive}>
                            <Stepper.Step label="First step" description="Create an account">
                                Step 1 content: Create an account
                            </Stepper.Step>
                            <Stepper.Step label="Second step" description="Verify email">
                                Step 2 content: Verify email
                            </Stepper.Step>
                            <Stepper.Step label="Final step" description="Get full access">
                                Step 3 content: Get full access
                            </Stepper.Step>
                            <Stepper.Completed>
                                Completed, click back button to get to previous step
                            </Stepper.Completed>
                        </Stepper>

                        <Group justify="center" mt="xl">
                            <Button variant="default" onClick={prevStep}>Back</Button>
                            <Button onClick={nextStep}>Next step</Button>
                        </Group>
                    </>,
                },

                'internal-payment': {
                    title: 'Internal Payment',
                    content: <>
                        <h1>Internal Payment</h1>
                    </>,
                },

                'account': {
                    title: 'Account',
                    content: <>
                        <h1>Content Tab</h1>
                    </>,
                },
            };
            setAvailableTabs(updatedTabs);
        } else {
            const updatedTabs = {
                'test': {
                    title: 'Test',
                    content: <>
                        <h1>Test Tab</h1>
                    </>,
                },
            };
            setAvailableTabs(updatedTabs);
        }
    }

    const handleTabChange = (value) => (e) => {
        e.preventDefault()
        setActiveTab(value)
    }
    
    useEffect(() => {
        setUserSettings(user, tabs);
    }, [user]);

    return (
        <>
            <Tabs defaultValue={activeTab}>
                <Tabs.List>
                    {
                        Object.keys(availableTabs).map((tab) => (
                            <Tabs.Tab key={tab} onClick={handleTabChange(tab)} value={tab}>
                                {availableTabs[tab].title}
                            </Tabs.Tab>
                        ))
                    }
                </Tabs.List>
            </Tabs>

            <div className='p-4'>
                {availableTabs[activeTab]?.content}
            </div>

            <div className="p-1">
                Selamat Datang di Halaman Pembayaran
            </div>
        </>
    );
}
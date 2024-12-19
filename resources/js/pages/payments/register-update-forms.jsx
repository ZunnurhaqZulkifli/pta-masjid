import { useForm } from "laravel-precognition-react-inertia";
import React, { Fragment, useEffect, useState } from 'react';
import { Button, Stepper, Group, TextInput, Text, Grid } from '@mantine/core';
import { route } from "ziggy-js";
import { showNotification } from "@mantine/notifications";

export function RegistrationForm({ activeTab, setActiveTab, user, userPayment }) {

    const [userPaymentInfo, setUserPaymentInfo] = useState(null);
    const [hasPayment, setHasPayment] = useState(false);

    useEffect(() => {
        if (userPayment && userPayment.length > 0) {
            setUserPaymentInfo(userPayment[0].transactions[0]);
            setHasPayment(true);
        } else {
            setUserPaymentInfo(null);
            setHasPayment(false);
        }
    }, [userPayment]);

    function validator(key, value) {
        switch (key) {
            case 'name':
                if (value.length < 5) {
                    return 'Name must be at least 5 characters';
                } else {
                    return null;
                }
            case 'email':
                const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!regex.test(value)) {
                    return 'Invalid email address';
                } else {
                    return null;
                }
            case 'password':
                if (value.length < 5) {
                    return 'Password must be at least 5 characters';
                } else {
                    return null;
                }
            case 'username':
                if (value.length < 5) {
                    return 'Username must be at least 5 characters';
                } else {
                    return null;
                }
            case 'phone_number':
                if (value.length < 5) {
                    return 'Phone number must be at least 5 characters';
                } else {
                    return null;
                }
            case 'identification_number':
                if (value.length < 12) {
                    return 'Identification number must be at least 12 characters';
                } else {
                    return null;
                }
        }
    }

    const form = useForm(
        'post',
        route('users.store'),
        {
            mode: 'uncontrolled',
            initialValues: {
                name: "",
                email: "",
                username: "",
                phone_number: "",
                identification_number: "",
                password: "",
            },
        });

    const loginForm = useForm(
        'post',
        route('login'),
        {
            mode: 'uncontrolled',
            initialValues: {
                email: '',
                password: '',
            }
        }
    )

    const [registerValidation, setRegisterValidation] = useState({
        name: '',
        email: '',
        username: '',
        phone_number: '',
        identification_number: '',
        password: '',
    });

    const [loginValidation, setLoginValidation] = useState({
        email: '',
        password: '',
    });

    const onChangeRegister = (e) => {
        const { name, value } = e.target;
        form.data[name] = value;

        const error = validator(name, value);

        if (error) {
            setRegisterValidation(prevState => ({ ...prevState, [name]: error }));
        } else {
            setRegisterValidation(prevState => ({ ...prevState, [name]: '' }));
        }

    };

    const onChangeLogin = (e) => {
        const { name, value } = e.target;
        loginForm.data[name] = value;

        const error = validator(name, value);

        if (error) {
            setLoginValidation(prevState => ({ ...prevState, [name]: error }));
        } else {
            setLoginValidation(prevState => ({ ...prevState, [name]: '' }));
        }
    }

    const onSubmit = (e) => {

        e.preventDefault();

        form.submit({
            forceFormData: true,
            onSuccess: () => {
                form.reset();
                showNotification({
                    title: 'Success',
                    message: 'The form has been submitted',
                    position: 'top-right',
                    color: 'green',
                    duration: 5000,
                })

                // location.reload();
            },
            onError: (error) => {
                showNotification({
                    title: 'Error submitting the form',
                    message: JSON.stringify(error),
                    position: 'top-right',
                    color: 'red',
                    duration: 5000,
                })
            }
        });
    };

    const onLogin = () => {
        // setActiveTab(1);

        loginForm.submit({
            forceFormData: true,
            onSuccess: () => {
                loginForm.reset();
                showNotification({
                    title: 'Success',
                    message: 'The form has been submitted',
                    position: 'top-right',
                    color: 'green',
                    duration: 5000,
                })

                // location.reload();
            },
            onError: (error) => {
                showNotification({
                    title: 'Error submitting the form',
                    message: JSON.stringify(error),
                    position: 'top-right',
                    color: 'red',
                    duration: 5000,
                })
            }
        });
    }

    const registeredUserForms = (userPaymentInfo = null) => (
        <Fragment>
            <form>
                <div className="row">
                    <TextInput
                        label="Nama"
                        name="name"
                        value={(user) ? user.name : ''}
                        size="sm"
                        className="col-4"
                        readOnly
                    />

                    <TextInput
                        label="Username"
                        name="username"
                        value={(user) ? user.username : ''}
                        size="sm"
                        className="col-4"
                        readOnly
                    />

                    <TextInput
                        label="Phone Number"
                        name="phone_number"
                        value={(user) ? user.phone_number : ''}
                        size="sm"
                        className="col-4"
                        readOnly
                    />

                    <TextInput
                        label="Email"
                        name="email"
                        value={(user) ? user.email : ''}
                        size="sm"
                        className="col-4"
                        readOnly
                    />

                    <TextInput
                        label="Nric"
                        name="identification_number"
                        value={(user) ? user.identification_number : ''}
                        size="sm"
                        className="col-4"
                        readOnly
                    />

                    <hr className="text-muted mt-4" />

                    {
                        (userPaymentInfo) ? (
                            <>
                                <p className=""> Cara Bayaran Anda</p>

                                <TextInput
                                    label="Card Number"
                                    name="card_number"
                                    value={(userPaymentInfo) ? userPaymentInfo.user_payment?.card_number : ''}
                                    size="sm"
                                    className="col-4"
                                />

                                <TextInput
                                    label="Card User"
                                    name="card_user"
                                    value={(userPaymentInfo) ? userPaymentInfo.user_payment?.card_user : ''}
                                    size="sm"
                                    className="col-4"
                                />
                                <hr className="text-muted mt-4" />
                            </>
                        ) : (
                            <>
                            </>
                        )
                    }

                    <Button className="btn btn-md mt-3"
                        disabled={registerValidation.name || registerValidation.email || registerValidation.username || registerValidation.phone_number || registerValidation.identification_number || registerValidation.password}
                        onClick={() =>
                            setActiveTab(1)
                        }>
                        Next
                    </Button>

                    {/* <Button className="btn btn-md mt-3 mr-2"
                        disabled={registerValidation.name || registerValidation.email || registerValidation.username || registerValidation.phone_number || registerValidation.identification_number || registerValidation.password}
                        onClick={
                            onSubmit
                        }>
                        Update
                    </Button> */}
                </div>
            </form>
        </Fragment>
    );

    const guestUserForms = (
        <Fragment>
            <Text size="xl" weight={700}>Pendaftaran Akaun</Text>
            <Text size="md" weight={500}>Sila Lengkapkan Borang Pendaftaran, Jika Anda Mempunyai Akaun Sila Login</Text>
            <form onSubmit={onSubmit} className="mt-4">
                <div className="row">
                    <TextInput
                        onChange={onChangeRegister}
                        label="Nama"
                        name="name"
                        placeholder="Nama"
                        error={registerValidation.name}
                        required
                        size="sm"
                        className="col-4"
                    />

                    <TextInput
                        label="Username"
                        name="username"
                        placeholder="Username"
                        error={registerValidation.username}
                        required
                        size="sm"
                        className="col-4"
                        onChange={onChangeRegister}
                    />

                    <TextInput
                        label="Phone Number"
                        name="phone_number"
                        placeholder="Phone Number"
                        error={registerValidation.phone_number}
                        required
                        size="sm"
                        className="col-4"
                        onChange={onChangeRegister}
                    />

                    <TextInput
                        label="Email"
                        name="email"
                        placeholder="Email"
                        error={registerValidation.email}
                        required
                        size="sm"
                        className="col-4 mt-2"
                        onChange={onChangeRegister}
                    />

                    <TextInput
                        label="Nric"
                        name="identification_number"
                        placeholder="NRIC"
                        error={registerValidation.identification_number}
                        required
                        size="sm"
                        className="col-4 mt-2"
                        onChange={onChangeRegister}
                    />

                    <TextInput
                        label="Password"
                        name="password"
                        type="text"
                        placeholder="Password"
                        error={registerValidation.password}
                        required
                        size="sm"
                        className="col-4 mt-2"
                        onChange={onChangeRegister}
                    />
                </div>

                <Button className="btn btn-md mt-3"
                    disabled={registerValidation.name || registerValidation.email || registerValidation.username || registerValidation.phone_number || registerValidation.identification_number || registerValidation.password}
                    onClick={
                        onSubmit
                    }>
                    Register
                </Button>
            </form>

            <hr />

            <Text size="md" weight={500}>Jika Anda Sudah Mempunyai Akaun</Text>

            <form onSubmit={onLogin}>
                <div className="row">
                    <TextInput
                        label="Email"
                        name="email"
                        type="text"
                        placeholder="Email"
                        error={loginValidation.email}
                        required
                        size="sm"
                        className="col-4 mt-2"
                        onChange={onChangeLogin}
                    />

                    <TextInput
                        label="Password"
                        name="password"
                        type="text"
                        placeholder="Password"
                        // error={loginValidation.password}
                        required
                        size="sm"
                        className="col-4 mt-2"
                        onChange={onChangeLogin}
                    />
                </div>

                <Button
                    className="btn btn-md mt-3"
                    onClick={onLogin}
                    children="Login"
                />
            </form>
        </Fragment>
    );

    useEffect(() => {
        if (user) {
            setForms(registeredUserForms(userPaymentInfo));
        } else {
            setForms(guestUserForms);
        }

        // console.log('User Payment Info', userPaymentInfo.user_payment);

    }, [user, userPaymentInfo, registerValidation, loginValidation]);

    const [forms, setForms] = useState(user ? registeredUserForms : guestUserForms);

    return (
        <Fragment>
            <div className="col-12">
                <div className="row">
                    <div className="p-2">
                        {forms}
                    </div>
                </div>
            </div>
        </Fragment>
    );
}
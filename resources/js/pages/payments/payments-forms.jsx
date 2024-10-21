import { useForm } from "laravel-precognition-react";
import { Button, Select, TextInput } from "@mantine/core";
import { Fragment, useState } from "react";
import { getPaymentMethods, getPaymentTypes } from "./helpers";
import { Card } from "react-bootstrap";
import { getMethodForms } from "./form-data";

export function PaymentForms({ paymentData, user }) {

    const paymentMethhods = getPaymentMethods(paymentData.paymentMethods);
    const paymentTypes = getPaymentTypes(paymentData.paymentTypes);

    const formValues = {
        payment_type: '',
        payment_method: '',
        amount: ''
    }

    const paymentForm = useForm(
        'post',
        route('payments.store'),
        {
            mode: 'uncontrolled',
            initialValues: {
                amount: ''
            },
        });

    const onSubmitPayment = () => {
        paymentForm.submit({
            forceFormData: true,
            onSuccess: () => {
                paymentForm.reset();

                showNotification({
                    title: 'Success',
                    message: 'The form has been submitted',
                    position: 'top-right',
                    color: 'green',
                    duration: 5000,
                })
            },
            onError: () => {
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

    const onChangePayment = (e) => {
        const { name, value } = e.target;
        console.log(name)
        console.log(value)
        console.log('hit')
        paymentForm.data[name] = value;
    }

    const presetAmounts = [
        { value: '100', label: 'RM 100' },
        { value: '200', label: 'RM 200' },
        { value: '300', label: 'RM 300' },
        { value: '400', label: 'RM 400' },
        { value: '500', label: 'RM 500' },
        { value: '1000', label: 'RM 1000' },
    ];

    const [payment_method, setPaymentMethod] = useState(null);

    const [presetAmount, setPresetAmount] = useState(0);

    return (
        <Fragment>
            <div className="row col-12">
                <div className="p-2">
                    <div className="row">
                        <div className="col-6">
                            {
                                (payment_method) ? getMethodForms(payment_method, user, paymentForm) ? getMethodForms(payment_method, user, paymentForm).form : 'OK' : 'Select Payment Method'
                            }
                        </div>

                        <div className="col-6">
                            Info Pembayaran

                            <form onSubmit={onSubmitPayment}>

                                <div className="form-group">
                                    <label>Pilih Jenis Bayaran</label>
                                    <Select
                                        name="payment_type"
                                        data={paymentTypes}
                                        placeholder="Pilih Jenis Pembayaran"
                                        onChange={(value) => {
                                            paymentForm.data.payment_type = value
                                        }}
                                        // onChange={onChangePayment}
                                    />
                                </div>

                                <div className="form-group">
                                    <label>Pilih Cara Bayaran</label>
                                    <Select
                                        name="payment_method"
                                        data={paymentMethhods}
                                        placeholder="Pilih Jenis Pembayaran"
                                        onChange={(value, data) => {
                                            paymentForm.data.payment_method = value
                                            setPaymentMethod(data.label)
                                        }}
                                    />
                                </div>

                                <div className="row mt-2 mb-2">
                                    <label>Select Amount</label>
                                    {
                                        presetAmounts.map((presetAmount, index) => {
                                            return (
                                                <div
                                                    key={presetAmount.value}
                                                    className="col-4"
                                                >
                                                    <Button
                                                        children={presetAmount.label}
                                                        name="amount"
                                                        // onClick={() => onChangePayment}
                                                        onClick={(e) => {
                                                            onChangePayment(e)
                                                            paymentForm.data.amount = presetAmount.value
                                                            setPresetAmount(presetAmount.value)
                                                        }}
                                                        className={`w-100 ${index > 2 ? 'mt-2' : ''}`}
                                                        color="green"
                                                    />
                                                </div>
                                            )
                                        })
                                    }
                                </div>

                                <TextInput
                                    label="Masukkan Jumlah"
                                    name="amount"
                                    type="number"
                                    placeholder={presetAmount}
                                    onChange={onChangePayment}
                                />

                                <Button
                                    children="Bayar"
                                    type="button"
                                    onClick={onSubmitPayment}
                                    // onClick={() => console.log(paymentForm.data)}
                                    className="mt-3"
                                />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </Fragment>
    );
}

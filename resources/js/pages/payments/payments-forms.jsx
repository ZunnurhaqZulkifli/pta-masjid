import { useForm } from "laravel-precognition-react";
import { Button, Select, TextInput } from "@mantine/core";
import { Fragment, useEffect, useState } from "react";
import { getPaymentMethods, getPaymentTypes, getProjects } from "./helpers";
import { getMethodForms, getProjectForms } from "./form-data";
import { showNotification } from "@mantine/notifications";

export function PaymentForms({ paymentData, user, setActiveTab, donePayment, setDonePayment }) {

    const paymentMethhods = getPaymentMethods(paymentData.paymentMethods);
    const paymentTypes = getPaymentTypes(paymentData.paymentTypes);
    const projects = getProjects(paymentData.projects);

    const paymentForm = useForm(
        'post',
        route('payments.store'),
        {
            mode: 'uncontrolled',
        });

    const onSubmitPayment = async (e) => {
        e.preventDefault();

        try {
            var data = await paymentForm.submit({ forceFormData: true });

            if(data) {
                // console.log(data.data.data);
                setDonePayment(data.data.data);
            }

            showNotification({
                title: 'Success',
                message: 'The payment has been created',
                position: 'top-right',
                color: 'green',
                duration: 5000,
            });

            setActiveTab(2);

        } catch (error) {
            const validationErrors = error.response.data.errors;
    
            showNotification({
                title: 'Validation Error',
                message: JSON.stringify(validationErrors),
                position: 'top-right',
                color: 'red',
                duration: 5000,
            });
        }
    }

    const onChangePayment = (e) => {
        const { name, value } = e.target;
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

    const [payment_type, setPaymentType] = useState(null);

    const [payment_method, setPaymentMethod] = useState(null);

    const [presetAmount, setPresetAmount] = useState(0);

    useEffect(() => {
        paymentForm.setData('user_id', user.id);
        paymentForm.setData('name', user.name);
        paymentForm.setData('card_name', user.name);

    }, [paymentForm]);

    return (
        <Fragment>
            <div className="row col-12">
                <div className="p-2">
                    <div className="row">
                        <div className="col-6">
                            {
                                (payment_type === 'Sumbangan') ? getProjectForms(projects, paymentForm) : ''
                            }
                            {
                                (payment_method) ? getMethodForms(payment_method, user, paymentForm) ? getMethodForms(payment_method, user, paymentForm).form : '' : <label className="fs-6">Select Payment Method</label>
                            }
                        </div>

                        <div className="col-6">
                            <label className="fs-6">Info Pembayaran</label>

                            <form onSubmit={onSubmitPayment}>

                                <div className="form-group">
                                    <Select
                                        label="Pilih Jenis Bayaran"
                                        name="payment_type"
                                        data={paymentTypes}
                                        placeholder="Pilih Jenis Pembayaran"
                                        onChange={(value, data) => {
                                            paymentForm.setData('payment_type_id', value);
                                            setPaymentType(data.label)
                                        }}
                                    />
                                </div>

                                <div className="form-group">
                                    <Select
                                        label="Pilih Cara Bayaran"
                                        name="payment_method"
                                        data={paymentMethhods}
                                        placeholder="Pilih Jenis Pembayaran"
                                        onChange={(value, data) => {
                                            paymentForm.setData('payment_method_id', value);
                                            setPaymentMethod(data.label)
                                        }}
                                    />
                                </div>

                                <div className="row mt-2 mb-2">
                                    <label className="fs-6">Select Amount</label>
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
                                                        onClick={() => {
                                                            paymentForm.setData('amount', presetAmount.value)
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
                                    onChange={(value) => 
                                        {
                                            paymentForm.setData('amount', value.target.value)
                                        }
                                    }
                                />

                                <Button
                                    children="Bayar"
                                    type="button"
                                    onClick={onSubmitPayment}
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

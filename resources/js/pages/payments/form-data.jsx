import { Select, TextInput } from "@mantine/core";
import { Fragment } from "react";

const methodForms = (user, paymentForm) => ({
    'Debit Card' : {
        form: (
            <Fragment>
                <label htmlFor="">Card Information</label>
                
                <TextInput 
                    className="mb-3" 
                    type="text" 
                    name="card_number" 
                    placeholder="Card Number" 
                    label="Card Number"
                    onChange={(value) => {
                        paymentForm.setData('card_number', value.target.value)
                    }}
                />

                <TextInput 
                    className="mb-3" 
                    type="text" 
                    name="card_holder" 
                    placeholder="Card Holder" 
                    defaultValue={user.name ?? ''}
                    label="Card Holder"
                    onChange={(value) => {
                        paymentForm.setData('card_user', value.target.value)
                    }}
                />

                <TextInput 
                    className="mb-3" 
                    type="date" 
                    name="expiry_date" 
                    placeholder="Expiry Date" 
                    label="Expiry Date"
                    onChange={(value, data) => {
                        paymentForm.setData('card_expiry', value.target.value)
                    }}
                />

                <TextInput 
                    className="mb-3" 
                    type="text" 
                    name="cvv" 
                    placeholder="CVV" 
                    label="CVV"
                    onChange={(value, data) => {
                        // paymentForm.data.card_ccv = value.target.value
                        paymentForm.setData('card_cvv', value.target.value)
                    }}
                />

            </Fragment>
        ),
    },
    'Online Banking' : {
        form: (
            <Fragment>
                <TextInput 
                    className="mb-3" 
                    type="text" 
                    name="bank_name" 
                    placeholder="Bank Name" 
                    label="Bank Name"
                    onChange={(value, data) => {
                        paymentForm.data.bank_name = value.target.value
                        paymentForm.setData('amount', value)
                    }}
                />
                
                <TextInput 
                    className="mb-3" 
                    type="text" 
                    name="account_number" 
                    placeholder="Account Number" 
                    label="Account Number"
                    onChange={(value, data) => {
                        paymentForm.data.account_number = value.target.value
                        paymentForm.setData('amount', value)
                    }}
                />

            </Fragment>
        ),
    },
    // 'Online Mobile Banking' : {
    //     form: (
    //         <Fragment>
    //             <TextInput type="text" name="bank_name" placeholder="Bank Name" />
    //             <TextInput type="text" name="account_number" placeholder="Account Number" />
    //         </Fragment>
    //     ),
    // },
    'E - Wallet' : {
        form: (
            <Fragment>
                <TextInput 
                    className="mb-3" 
                    type="text" 
                    name="e_wallet_name" 
                    placeholder="E Wallet Name" 
                    label="E Wallet Name"
                    onChange={(value, data) => {
                        paymentForm.data.e_wallet_name = value.target.value
                        paymentForm.setData('amount', value)
                    }}
                />
            </Fragment>
        ),
    },
    // 'Cash' : {
    //     form: (
    //         <Fragment>
    //             <TextInput type="text" name="cash_amount" placeholder="Cash Amount" />
    //         </Fragment>
    //     ),
    // },
    // 'Over The Counter' : {
    //     form: (
    //         <Fragment>
    //             <TextInput type="text" name="bank_name" placeholder="Bank Name" />
    //             <TextInput type="text" name="account_number" placeholder="Account Number" />
    //         </Fragment>
    //     ),
    // },
});

export function getMethodForms(type, user, paymentForm) {
    return methodForms(user, paymentForm)[type];
}

export function getProjectForms(projects, paymentForm) {
    return (
        <Fragment>
            <label htmlFor="">Project Info</label>
            <Select
                name="project"
                data={projects}
                placeholder="Sila Pilih Projek"
                className="mb-3"
                onChange={(value, data) => {
                    paymentForm.setData('project_id', value);
                }}
            />
        </Fragment>
    );
}
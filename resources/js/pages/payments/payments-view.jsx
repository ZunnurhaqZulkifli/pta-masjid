import { Card, Button, Table } from "@mantine/core"
import './custom-card.css';
import { Fragment } from "react";

export function ViewPayments({ paymentData }) {
    return (
        <Fragment>
            <Transaction transaction={paymentData.transaction} payment={paymentData}/>
            <br className="" />
        </Fragment>
    )
}

export function Transaction({ transaction }) {
    return (
        <Card shadow="sm" padding="lg" className="custom-card receipt-card">
            <div className="row-layout">
                <div className="text-content">
                    <h5>
                        <strong>
                            Assalamualaikum, Selamat Sejahtera !
                        </strong>
                        <div className="fs-8">
                            Terima kasih kerana menggunakan perkhidmatan PTA Masjid, Berikut adalah resit pembayaran anda.
                        </div>
                    </h5>
                </div>
                <div className="image-content">
                    <img src="https://via.placeholder.com/100" alt="Placeholder" />
                </div>
            </div>

            <Table className="custom-table mt-2">
                <tbody>
                    <tr>
                        <td><strong>Transaction Id:</strong></td>
                        <td>{transaction.id}</td>
                    </tr>
                    <tr>
                        <td><strong>Name:</strong></td>
                        <td>{transaction.name}</td>
                    </tr>
                    <tr>
                        <td><strong>Amount:</strong></td>
                        <td>(RM) {transaction.amount}</td>
                    </tr>
                    <tr>
                        <td><strong>Reference Number:</strong></td>
                        <td>{transaction.reference_number}</td>
                    </tr>
                    <tr>
                        <td><strong>User ID:</strong></td>
                        <td>{transaction.user_id}</td>
                    </tr>
                    <tr>
                        <td><strong>Reason:</strong></td>
                        <td>{transaction.reason}</td>
                    </tr>
                    <tr>
                        <td><strong>Payment Status:</strong></td>
                        <td>Success</td>
                    </tr>
                    <tr>
                        <td><strong>Created At:</strong></td>
                        <td>{transaction.created_at}</td>
                    </tr>
                </tbody>
            </Table>

            <div className="row-layout">
                <div className="text-content">
                    <div className="fs-7 mt-2 mb-0">Resit Rasmi | Layari www.pta-masjid.com </div>
                </div>
                <div className="image-content">
                    <div className="fs-7 mt-2 mb-0">~ z.z ~</div>
                </div>
            </div>

            <Button className="button-reciept" onClick={() => window.print()}>Print Receipt</Button>
        </Card>
    );
}
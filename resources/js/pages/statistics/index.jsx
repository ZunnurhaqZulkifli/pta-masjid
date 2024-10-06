import { StatisticsCard } from "./statistics-card";

export default function Statistics({
    totalPayments,
    payments
}) {
    return (
        <>
            <h1>Statistik</h1>
            <h1>{totalPayments.toFixed(2)}</h1>
            <StatisticsCard totalPayemnts={totalPayments} payments={payments}/>
        </>
    );
}
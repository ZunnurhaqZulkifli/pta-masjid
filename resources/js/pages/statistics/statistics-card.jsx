import { Text } from '@mantine/core';
import classes from '../dashboards/dashboard_stats.module.css';
import ProductCard from './product-cards';

export function StatisticsCard({ payments, totalPayments }) {
    return (
        <>
            <div className={classes.root}>
                {
                    payments.map((stat, index) => (
                        <div key={index} className={classes.stat}>
                            <>
                                <Text className={classes.count}>{stat.payment_type.name}</Text>
                                <Text className={classes.title}>
                                    RM {new Intl.NumberFormat('en-US', { style: 'decimal', minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(stat.amount)}
                                </Text>
                                <Text className={classes.description}>{stat.payment_type.name}</Text>
                            </>
                        </div>
                    ))
                }
            </div>

            <ProductCard payments={payments}/>
        </>
    );
}
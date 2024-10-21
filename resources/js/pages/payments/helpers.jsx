

export function getPaymentMethods(paymentMethods) {
    return paymentMethods.map((paymentMethod) => {
        return {
            value: String(paymentMethod.id),
            label: String(paymentMethod.name),
        };
    });
}

export function getPaymentTypes(paymentTypes) {
    return paymentTypes.map((paymentType) => {
        return {
            value: String(paymentType.id),
            label: String(paymentType.name),
        };
    });
}

export function getProjects(projects) {
    return projects.map((project) => {
        return {
            value: String(project.id),
            label: String(project.name),
        };
    });
}
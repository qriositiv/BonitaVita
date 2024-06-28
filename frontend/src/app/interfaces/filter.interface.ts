export interface Section {
    sectionName: string;
    sectionFields: Field[];
}

export interface Field {
    fieldName: string;
    isFieldSelected: boolean;
    fieldAmount: number;
}

export interface Price {
    minPrice: number;
    maxPrice: number;
    currentPrice: number;
}

export interface Sort {
    sortName: string;
    methodNames: string[];
    selectedMethod: number;
}
export interface Filter {
    category: Section;
    price: Price
    tags: Section;
    sortBy: Sort;
    opennedSections: boolean[];
}

interface Section {
    sectionName: string;
    sectionFields: Field[];
}

interface Field {
    fieldName: string;
    isFieldSelected: boolean;
    fieldAmount: number;
}

interface Price {
    priceTo: number
}

interface Sort {
    methodName: string;
}
export interface SoapPreview {
    id: string;
    image: string;
    name: string;
    cost: number;
    sale?: number | null;
    tag?: string | null;
}

export interface Soap {
    id: string;
    images: string[];
    name: string;
    cost: number;
    weight: number;
    aroma: string;
    ingredients: string[];
    category: string[];
    description: string;
    sale?: number | null;
    tag?: string | null;
}
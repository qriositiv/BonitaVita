import { Injectable } from '@angular/core';
import { Price, Section, Sort } from '../interfaces/filter.interface';

@Injectable({
    providedIn: 'root',
})
export class FilterService {
    getCategories(): Section {
        return {
                sectionName: 'Categories',
                sectionFields: [
                    { fieldName: 'New', isFieldSelected: false, fieldAmount: 1 },
                    { fieldName: 'Popular', isFieldSelected: false, fieldAmount: 2 },
                    { fieldName: 'Sale', isFieldSelected: false, fieldAmount: 0 }
                ]
            }
    }

    getTags(): Section {
        return {
                sectionName: 'Tags',
                sectionFields: [
                    { fieldName: 'Eco', isFieldSelected: false, fieldAmount: 3 },
                    { fieldName: 'For children', isFieldSelected: false, fieldAmount: 6 }
                ]
            }
    }

    getPrice(): Price {
        return {
            minPrice: 0,
            maxPrice: 30,
            currentPrice: 30
        };
    }

    getSort(): Sort {
        return {
                sortName: 'Sort by',
                methodNames: [
                    'Price: Low to high',
                    'Price: High to low',
                ],
                selectedMethod: 0
            }
    }
}

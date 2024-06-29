import { Injectable } from '@angular/core';
import { CategoryField, Price, Sort, TagField } from '../interfaces/filter.interface';

@Injectable({
    providedIn: 'root',
})
export class FilterService {
    getCategories(): CategoryField[] {
        return [
            { fieldName: 'New', isFieldSelected: false, fieldAmount: 1 },
            { fieldName: 'Popular', isFieldSelected: false, fieldAmount: 2 },
            { fieldName: 'Sale', isFieldSelected: false, fieldAmount: 0 }
        ];
    }

    getTags(): TagField[] {
        return [
            { fieldName: 'Eco', fieldIcon: 'fa-leaf', isFieldSelected: false, fieldAmount: 3 },
            { fieldName: 'For children', fieldIcon: 'fa-child', isFieldSelected: false, fieldAmount: 6 },
            { fieldName: 'No chemicals', fieldIcon: 'fa-flask', isFieldSelected: false, fieldAmount: 1 },
            { fieldName: 'Not allergic', fieldIcon: 'fa-medkit', isFieldSelected: false, fieldAmount: 0 }
        ];
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
        };
    }
}
